<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment($postId, Request $request){
        //dd($postId);
        $request->validate([
            'text' => 'required',
        ]);

        Comment::create([
            'post_id' => $postId,
            'user_id' => Auth::user()->id,
            'text' => $request->text,
        ]);

        return back();
    }
}
