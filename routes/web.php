<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('home.blogs');
Route::get('/blogs/{slug}', [HomeController::class, 'showBlog'])->name('home.showBlog');
Route::get('/author', [HomeController::class, 'author'])->name('home.author');
Route::get('/author/{name}', [HomeController::class, 'showAuthor'])->name('home.showAuthor');

Route::get('/admin', function () {
    return view('welcome');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
//     // Route::get('/admin/dashboard/', [AdminController::class, 'adminDashboard'])->name('admin.Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.index');

    Route::resource('/blog', BlogController::class);
    Route::get('/blog/inactive/{id}', [BlogController::class, 'blogInactive'])->name('blog.inactive');
    Route::get('/blog/active/{id}', [BlogController::class, 'blogActive'])->name('blog.active');

    Route::resource('/blog-category', BlogCategoryController::class);
    Route::get('/blog-category/inactive/{id}', [BlogCategoryController::class, 'blogCategoryInactive'])->name('blog-category.inactive');
    Route::get('/blog-category/active/{id}', [BlogCategoryController::class, 'blogCategoryActive'])->name('blog-category.active');

    Route::resource('/roles', RoleController::class);
    Route::resource('/profile', UserController::class);
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('change-password');
    Route::patch('/update-password', [UserController::class, 'updatePassword'])->name('update-password');

    Route::get('/setting', [SettingController::class,'index'])->name('setting.index');
    Route::patch('/setting/update', [SettingController::class, 'storeOrUpdate'])->name('setting.storeOrUpdate');

    Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('newsletter.subscribe');
    Route::get('/subscribers', [NewsletterController::class, 'index'])->name('subscribers.index');
    Route::delete('/subscribers', [NewsletterController::class, 'delete'])->name('subscribers.destroy');
    Route::post('/subscribers/send-email', [NewsletterController::class, 'sendEmail'])->name('subscribers.sendEmail');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
