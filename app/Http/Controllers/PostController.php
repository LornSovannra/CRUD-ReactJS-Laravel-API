<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function Home()
    {
        $posts = Post::all();

        return $posts;
    }

    public function PersonalPost($id)
    {
        $posts = Post::findOrFail($id);

        return $posts;
    }

    public function Upload(Request $request)
    {
        $posts = Post::create($request->all());

        return response($posts, 201);
    }

    public function Update(Request $request, $id)
    {
        $posts = Post::findOrFail($id);

        $posts -> title = $request -> title;
        $posts -> description = $request -> description;

        $posts -> save();

        return $posts;
    }

    public function Delete($id)
    {
        $posts = Post::findOrFail($id);

        $posts -> delete();

        return "Deleted Successfully.";
    }
}