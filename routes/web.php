<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\StudentCountController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeDislikeController;
use App\Http\Controllers\UserController;
use App\Models\StudentCount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function() {
    // Admin
    Route::get('/dashboard', [AdminController::class, 'index']);

    //Function for admin
    Route::get('/users', [IndexController::class, 'index']);
    Route::get('/users/{id}/edit', [IndexController::class, 'edit']);
    Route::post('/users/{id}/update', [IndexController::class, 'update']);
    Route::post('/users/{id}/delete', [IndexController::class, 'destory']);

    //Skill
    Route::resource('/skills', SkillController::class);

    //Project
    Route::resource('/projects', ProjectController::class);

    //Category
    Route::resource('/categories', CategoryController::class);

    //Post
    Route::resource('/posts', PostController::class);

    //Student_Counts
    Route::get('/student_counts', [StudentCountController::class, 'index'])->name('student_counts.index');
    Route::post('/student_counts/store', [StudentCountController::class, 'store']);
    Route::post('/student_counts/{id}/update', [StudentCountController::class, 'update']);

    //Comment Show or Hide
    Route::post('comment/{commentId}/show_hide', [PostController::class, 'showHideComment']);
});

// User
Route::get('/', [UserController::class, 'index']);
Route::get('/posts', [UserController::class, 'posts']);
Route::get('/post/{id}/details', [UserController::class, 'postdetails']);
Route::get('/search_posts', [UserController::class, 'search']);
Route::get('/search_posts_by_category/{catId}', [UserController::class, 'searchByCategory']);

//Like Dislike
Route::post('post/like/{postId}', [LikeDislikeController::class, 'like']);
Route::post('post/dislike/{postId}', [LikeDislikeController::class, 'dislike']);

//Comment
Route::post('post/comment/{postId}', [CommentController::class, 'comment']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
