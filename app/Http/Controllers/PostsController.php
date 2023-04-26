<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = null;

        // Check if the user is authenticated or not
        if(auth()->check()){
            // If authenticated, show posts of current user
            if (Auth::user()->name == "admin")
                $posts = Post::orderBy('created_at', 'desc')->paginate(10);
            else
                $posts = Post::where('username',Auth::user()->name)->paginate(5);

        } else {
            // If not authenticated, show posts of Mohamed Ali
            $posts = Post::where('username', 'Mohamed Ali')->latest()->paginate(5);
        }


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
        $request->validate([
            'title' => 'required',
            'username' => 'required',
            'subtitle' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'body' => 'required'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $post = new Post([
            'title' => $request->get('title'),
            'username' => $request->get('username'),
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
    public function EditPost($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'username' => 'required',
            'subtitle' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->img_url = '/images/' . $imageName;
        }

        $post->title = $request->get('title');
        $post->username = $request->get('username');
        $post->subtitle = $request->get('subtitle');
        $post->body = $request->get('body');
        $post->save();

        return redirect('/posts/' . $id)->with('success', 'Post has been updated successfully');
    }

}
