<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function index()
    // {
    //     return view('Posts', [
    //         'title' => 'Posts',
    //         'posts' => Post::all()
    //     ]);
    // }
    public function index()
    {
        // $post = Post::latest();
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category["name"];
        } else if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author["name"];
        }
        return view('Posts', [
            'title' => 'All Posts' . $title,
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }
    public function show(Post $post)
    {
        return view('Post', [
            'title' => 'Posts',
            'posts' => $post
        ]);
    }
}
