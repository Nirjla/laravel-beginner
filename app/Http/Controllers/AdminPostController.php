<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;


class AdminPostController extends Controller
{
    //
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::all()
        ]);
    }
    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
        ]);
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }
    protected function validatePost(?Post $post=null){
    $post??= new Post();
        return request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')->ignore($post)],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => $post->exists?['image']:['required','image'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

    }
    public function store()
    {
        // ddd(request()->file('thumbnail'));
      $attributes =  $this->validatePost();
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        Post::create($attributes);
        return back()->with('success', "Post created successfully");
    }
    public function update(Post $post)
    {
      $attributes=$this->validatePost($post);
        if ($attributes['thumbnail']?? false) {
            $atrributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        }
        $post->update($attributes);
        return redirect('/admin/posts')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted successfully');
    }
}
