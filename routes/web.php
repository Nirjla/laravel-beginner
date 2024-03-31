<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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


Route::post('/newsletter',NewsletterController::class);
   
// dd($response);
// dd(request()->all());

    
    // $response = $mailchimp->lists->addListMember('e0ae3738a8',[
    //     "email_address"=>"mirjalashakya@gmail.com",
    //     "status"=>"subscribed"
    // ]);
    // dd($response);




Route::get(
    '/',
    [PostController::class, 'index']
    // dd(request(['search']));

)->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');
Route::get('/logout',[SessionController::class,'destroy'])->middleware('auth');
Route::get('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/sessions',[SessionController::class,'store'])->middleware('guest');
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store']);
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
