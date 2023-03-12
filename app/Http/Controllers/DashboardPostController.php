<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ];
        return view('dashboard.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'required|image|file|max:1024',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        if($request->file('image')){
            $data['image'] = $request->file('image')->store('post-images');
        }

        $data['user_id'] = auth()->user()->id;
        $data['excerpt'] = Str::limit(strip_tags($request->body), 150);

        Post::create($data);


        return redirect('/dashboard/posts')->with('success', 'Postingan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', ['posts' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $data = [
            'post' => $post,
            'categories' => Category::all()
        ];
        return view('dashboard.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $data = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
        ];

        if($request->slug != $post->slug ){
            $data['slug'] = 'required|unique:posts';
        } else {

        }

        $validateData = $request->validate($data);

        Post::where('id', $post->id)->update($validateData);


        return redirect('/dashboard/posts')->with('success', 'Postingan baru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Data Berhasil Dihapus');
    }

    //Menangani Cek Slug
    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
