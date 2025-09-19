<?php

namespace App\Console\Commands;

use App\Models\Post;
use Cloudinary\Cloudinary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class MigratePostImagesToCloudinary extends Command
{
    protected $signature = 'posts:migrate-images {--dry-run : Show what would be migrated without uploading}';

    protected $description = 'Upload existing local post images to Cloudinary and update database.';

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');

        $cloudinary = env('CLOUDINARY_URL')
            ? new Cloudinary(env('CLOUDINARY_URL'))
            : new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);

        $updated = 0;
        $skipped = 0;

        $this->info('Scanning posts with local cover_image...');

        Post::query()
            ->whereNotNull('cover_image')
            ->whereNull('cover_image_public_id')
            ->chunkById(100, function ($posts) use ($cloudinary, $dryRun, &$updated, &$skipped) {
                foreach ($posts as $post) {
                    $url = $post->cover_image;
                    if (!str_starts_with($url, '/storage/')) {
                        $this->line("Skipping post {$post->id}: not a local storage URL");
                        $skipped++;
                        continue;
                    }

                    $relativePath = ltrim(str_replace('/storage/', '', $url), '/');
                    $diskPath = Storage::disk('public')->path($relativePath);

                    if (!file_exists($diskPath)) {
                        $this->warn("File missing for post {$post->id}: {$diskPath}");
                        $skipped++;
                        continue;
                    }

                    $this->line("Migrating post {$post->id}: {$diskPath}");

                    if ($dryRun) {
                        continue;
                    }

                    $upload = $cloudinary->uploadApi()->upload($diskPath, [
                        'folder' => 'minhnguyen/posts',
                        'overwrite' => true,
                        'resource_type' => 'image',
                        'public_id' => pathinfo($relativePath, PATHINFO_FILENAME),
                    ]);

                    $post->update([
                        'cover_image' => $upload['secure_url'] ?? $upload['url'] ?? $post->cover_image,
                        'cover_image_public_id' => $upload['public_id'] ?? null,
                    ]);

                    $updated++;
                }
            });

        $this->info("Done. Updated: {$updated}, Skipped: {$skipped}");

        return Command::SUCCESS;
    }
}


