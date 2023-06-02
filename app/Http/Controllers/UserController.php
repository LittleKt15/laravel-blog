<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\LikesDislike;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use App\Models\StudentCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $skills = Skill::paginate(10);
        $projects = Project::all();
        $studentcounts = StudentCount::find(1);
        $posts = Post::latest()->take(6)->get();
        return view('user.index', compact('skills', 'projects', 'studentcounts', 'posts'));
    }

    public function posts()
    {
        $categories = Category::all();
        $posts = Post::paginate(5);
        return view('user.posts', compact('categories', 'posts'));
    }

    public function postdetails($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $post = Post::find($id);
        $likes = LikesDislike::where('post_id', $id)->where('type', 'like')->get();
        $dislikes = LikesDislike::where('post_id', $id)->where('type', 'dislike')->get();

        //$likeStatus = LikesDislike::where('post_id', $id)->where('user_id', Auth::user()->$id)->first();
        $user = Auth::user();
        $likeStatus = null;
        if ($user) {
            $likeStatus = LikesDislike::where('post_id', $id)->where('user_id', $user->id)->first();
        }

        $comments = Comment::where('post_id', $id)->where('status', 'show')->get();

        return view('user.post-details', compact('post', 'likes', 'dislikes', 'likeStatus', 'comments'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $searchData = "%" . $request->search_data . "%";
        $posts = Post::where('title', 'like', $searchData)->orWhere('content', 'like', $searchData)->orWhereHas('category', function ($category) use ($searchData) {
            $category->where('name', 'like', $searchData);
        })->paginate(5);
        return view('user.posts', compact('categories', 'posts'));
    }

    public function searchByCategory(Request $request, $catId){
        $categories = Category::all();
        $posts = Post::where('category_id', $catId)->paginate(5);
        return view('user.posts', compact('categories', 'posts'));
    }
}
