<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Models\Post;

Route::get('/', function () {
    $featuredBlogs = Post::query()
        ->whereNotNull('published_at')
        ->latest('published_at')
        ->limit(3)
        ->get(['id', 'title', 'slug', 'excerpt', 'cover_image', 'published_at'])
        ->map(fn ($post) => [
            'id' => $post->id,
            'title' => $post->title,
            'slug' => $post->slug,
            'excerpt' => $post->excerpt,
            'image' => $post->cover_image ?: '/storage/default-thumbnail.jpg',
            'link' => route('blog.show', $post->slug),
            'published_at' => optional($post->published_at)->toDateTimeString(),
        ]);
    
    return Inertia::render('Public/Home', [
        'featuredBlogs' => $featuredBlogs
    ]);
});
Route::get('/about', fn () => Inertia::render('Public/About'))->name('about');
Route::get('/contact', fn () => Inertia::render('Public/Contact'))->name('contact');

Route::get('/dashboard', function () {
    $posts = Post::query();
    $stats = [
        'posts' => (clone $posts)->count(),
        'published' => (clone $posts)->whereNotNull('published_at')->count(),
        'drafts' => (clone $posts)->whereNull('published_at')->count(),
    ];
    return Inertia::render('Dashboard', compact('stats'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('posts', AdminPostController::class);
    });
});

// Public blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

require __DIR__.'/auth.php';
