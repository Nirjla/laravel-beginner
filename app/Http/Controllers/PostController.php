<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //stick with 7 resful action: index,show, create,store, edit, update, destroy
    public function index()
    {
        // dd(request(['search']));
        return view(
            'posts.index',
            [
                'posts' => Post::latest('created_at')->filter(request(['search', 'category','author']))->paginate(5)->withQueryString(),

            ]
        );
    }
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            // 'comments'=>Comment::all()
        ]);
    }
}
// return view(
//     'posts',
//     [
//         // 'posts' => Post::all()
//         'categories' => Category::all(),
//         'posts' => Post::latest('created_at')->get(),
//         'current_category' => $category

//     ]
// );