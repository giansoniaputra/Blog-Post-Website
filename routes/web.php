<?php

use \App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

// use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
    ]);
});
Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'name' => 'Gian Sonia',
        'email' => 'giansonia444@gmail.com',
        'gambaran' => 'gian.jpg'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
//Halaman Single Post
Route::get('posts/{post:slug}', [PostController::class, 'show']);
// Route::get('categories/{category:slug}', [PostController::class, 'index']);
Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => "Post By Category $category->name",
        'posts' => $category->posts->load('category', 'author'),
    ]);
});
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Categories',
        'categories' => Category::all(),
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'title' => "Post By Category $author->name",
        'posts' => $author->post->load('category', 'author'),
    ]);
});

// Route Login

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');
Route::get('/dashboard/posts/cekSlug',[DashboardPostController::class, 'cekSlug'])->middleware('auth');
Route::resource('dashboard/posts', DashboardPostController::class)->middleware('auth');