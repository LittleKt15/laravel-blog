<?php

namespace App\Http\Controllers;

use App\Models\LikesDislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeDislikeController extends Controller
{
    public function like($postId)
    {
        //dd('like' . $postId);
        $isExist = LikesDislike::where('post_id', '=', $postId)->where('user_id', '=', Auth::user()->id)->first();

        if ($isExist) {
            if($isExist->type === 'like'){
                return back();
            } else {
                LikesDislike::where('id', $isExist->id)->update([
                    'type' => 'like',
                ]);
                return back();
            }
        } else {
            LikesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'Like',
            ]);
            return back();
        }
    }

    public function dislike($postId)
    {
        //dd('dislike' . $postId);
        $isExist = LikesDislike::where('post_id', '=', $postId)->where('user_id', '=', Auth::user()->id)->first();

        if ($isExist) {
            if($isExist->type === 'dislike'){
                return back();
            } else {
                LikesDislike::where('id', $isExist->id)->update([
                    'type' => 'dislike',
                ]);
                return back();
            }
        } else {
            LikesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'dislike',
            ]);
            return back();
        }
    }
}
