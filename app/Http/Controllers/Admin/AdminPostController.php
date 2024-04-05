<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        // ddd(request()->file('thumbnail'));
      $attributes =  $this->validatePost();
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        $status = $request->input('action') === 'post' ? 1: 0;
        Post::create($attributes + ['status'=>$status]);
        $message = $status === 1 ?"Post created successfully":"Post have been drafted";
        return back()->with('success',$message);
    }
    protected function validatePost(?Post $post=null){
        $post??= new Post();
        // ddd(request()->all());
                return request()->validate([
                'title' => ['required', Rule::unique('posts', 'title')->ignore($post)],
                'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
                'thumbnail' => $post->exists?['image']:['required','image'],
                'excerpt' => 'required',
                'body' => 'required',
                'category_id' => ['required', Rule::exists('categories', 'id')]
            ]);

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
