<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Cloudinary\Cloudinary;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->latest('published_at')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Admin/Posts/Index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Posts/Edit', [
            'post' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Debug: Log all request data
            Log::info('Post store request data', [
                'has_thumbnail' => $request->hasFile('thumbnail'),
                'thumbnail_file' => $request->file('thumbnail'),
                'all_files' => $request->allFiles(),
                'all_data' => $request->all()
            ]);

            $data = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('posts', 'slug')],
                'excerpt' => ['nullable', 'string', 'max:500'],
                'body' => ['required', 'string'],
                'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'published_at' => ['nullable', 'date'],
            ]);

            $data['user_id'] = Auth::id();

            // Handle thumbnail upload (Cloudinary)
            if ($request->hasFile('thumbnail')) {
                $cloudinary = env('CLOUDINARY_URL')
                    ? new Cloudinary(env('CLOUDINARY_URL'))
                    : new Cloudinary([
                        'cloud' => [
                            'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                            'api_key' => env('CLOUDINARY_API_KEY'),
                            'api_secret' => env('CLOUDINARY_API_SECRET'),
                        ],
                    ]);

                $upload = $cloudinary->uploadApi()->upload(
                    $request->file('thumbnail')->getRealPath(),
                    [
                        'folder' => 'minhnguyen/posts',
                        'overwrite' => true,
                        'resource_type' => 'image',
                    ]
                );

                $data['cover_image'] = $upload['secure_url'] ?? $upload['url'] ?? null;
                $data['cover_image_public_id'] = $upload['public_id'] ?? null;
                Log::info('Thumbnail uploaded to Cloudinary', [
                    'public_id' => $data['cover_image_public_id'],
                    'url' => $data['cover_image']
                ]);
            }

            $post = Post::create($data);

            return redirect()->route('admin.posts.edit', $post)->with('success', 'Post created');
        } catch (\Throwable $e) {
            Log::error('Post store failed', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->withInput()->with('error', 'Không thể tạo bài viết: '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Inertia::render('Admin/Posts/Show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return Inertia::render('Admin/Posts/Edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        try {
            $data = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'slug' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('posts', 'slug')->ignore($post->id)],
                'excerpt' => ['nullable', 'string', 'max:500'],
                'body' => ['required', 'string'],
                'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'published_at' => ['nullable', 'date'],
            ]);

            // Handle thumbnail upload (Cloudinary)
            if ($request->hasFile('thumbnail')) {
                // Delete old thumbnail from Cloudinary if exists
                if (!empty($post->cover_image_public_id)) {
                    try {
                        $cloudinary = env('CLOUDINARY_URL')
                            ? new Cloudinary(env('CLOUDINARY_URL'))
                            : new Cloudinary([
                                'cloud' => [
                                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                                    'api_key' => env('CLOUDINARY_API_KEY'),
                                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                                ],
                            ]);
                        $cloudinary->uploadApi()->destroy($post->cover_image_public_id, ['resource_type' => 'image']);
                    } catch (\Throwable $e) {
                        Log::warning('Failed to delete old Cloudinary image', ['error' => $e->getMessage()]);
                    }
                }

                $cloudinary = env('CLOUDINARY_URL')
                    ? new Cloudinary(env('CLOUDINARY_URL'))
                    : new Cloudinary([
                        'cloud' => [
                            'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                            'api_key' => env('CLOUDINARY_API_KEY'),
                            'api_secret' => env('CLOUDINARY_API_SECRET'),
                        ],
                    ]);
                $upload = $cloudinary->uploadApi()->upload(
                    $request->file('thumbnail')->getRealPath(),
                    [
                        'folder' => 'minhnguyen/posts',
                        'overwrite' => true,
                        'resource_type' => 'image',
                    ]
                );

                $data['cover_image'] = $upload['secure_url'] ?? $upload['url'] ?? null;
                $data['cover_image_public_id'] = $upload['public_id'] ?? null;
            }

            $post->update($data);

            return back()->with('success', 'Post updated');
        } catch (\Throwable $e) {
            Log::error('Post update failed', [
                'post_id' => $post->id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->withInput()->with('error', 'Không thể cập nhật: '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete image from Cloudinary if present
        if (!empty($post->cover_image_public_id)) {
            try {
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                        'api_key' => env('CLOUDINARY_API_KEY'),
                        'api_secret' => env('CLOUDINARY_API_SECRET'),
                    ],
                ]);
                $cloudinary->uploadApi()->destroy($post->cover_image_public_id, ['resource_type' => 'image']);
            } catch (\Throwable $e) {
                Log::warning('Failed to delete Cloudinary image on post destroy', ['error' => $e->getMessage()]);
            }
        }

        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted');
    }
}
