<?php

use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
|
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// dd($response);
// dd(request()->all());


// $response = $mailchimp->lists->addListMember('e0ae3738a8',[
//     "email_address"=>"mirjalashakya@gmail.com",
//     "status"=>"subscribed"
// ]);
// dd($response);




// Route::get(
//     '/',
//     [PostController::class, 'index']
//     // dd(request(['search']));

// );
Route::get('/','PostController@index');//
Route::get('/posts/{post:slug}', 'PostController@show');
Route::post('/newsletter', 'NewsletterController');
Route::middleware('guest')->group(function(){
    Route::get('/register', 'RegisterController@create');
    Route::post('/register', 'RegisterController@store');
    Route::get('/login', 'SessionController@create');
    Route::post('/sessions', 'SessionController@store');

});
Route::middleware('auth')->group(function(){
    Route::get('/logout', 'SessionController@destroy');
});
Route::post('/posts/{post:slug}/comments', 'CommentController@store');
Route::middleware('can:admin')->group(function(){
    Route::resource('admin/posts','Admin\AdminPostController')->except('show');
});
    // Route::get('/admin/posts/create', [AdminPostController::class, 'create']);
    // Route::post('/admin/posts', [AdminPostController::class, 'store']);
    // Route::get('/admin/posts',[AdminPostController::class,'index']);
    // Route::get('admin/posts/{post}/edit',[AdminPostController::class,'edit']);
    // Route::patch('/admin/posts/{post}/update',[AdminPostController::class,'update']);
    // Route::delete('/admin/posts/{post}',[AdminPostController::class,'destroy']);


// Route::
// Route::get('/login',[SessionController::class,'destroy'])->middleware('guest');
// Route::get('/posts/{post:slug}', function (Post $post) {
//     // $post = Post::findorFail($id);
//     return view('post', [
//         'post' => $post
//     ]);
// });
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view(
//         'posts',
//         [
//             'categories' => Category::all(),
//             'posts' => $category->posts,
//             'current_category' => $category
//         ]
//     );
// })->name('category');
// Route::get('/authors/{user:username}', function (User $user) {
//     return view(
//         'posts.index',
//         [
//             'posts' => $user->posts
//         ]
//     );
// });
