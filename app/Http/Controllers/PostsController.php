<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

//    public function store(Request $request)
//    {
//        $post = new Post([
//            'title' => $request->get('title'),
//            'subtitle' => $request->get('subtitle'),
//            'body' => $request->get('body'),
//            'username' => $request->get('username'),
//            'img_url' => $request->get('img_url')
//        ]);
//
//        $post->save();
//
//        return redirect('/posts')->with('success', 'Post has been created successfully!');
//    }

    public function store(Request $request)
    {
//        $request->validate([
//            'title' => 'required',
//            'username' => 'required',
//            'subtitle' => 'required',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'body' => 'required'
//        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $post = new Post([
            'title' => $request->get('title'),
            'subtitle' => $request->get('subtitle'),
            'img_url' => '/images/' . $imageName,
            'body' => $request->get('body'),
        ]);

        $post->save();

        return redirect('/posts')->with('success', 'Post has been created successfully!');
    }



    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
    public function delete($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect('/posts')->with('success', 'Post has been deleted successfully!');
    }

}
