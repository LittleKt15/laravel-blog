<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/post-images', $imageName); //$image->storeAs means it will store the image at storage/app

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);
        return redirect('admin/posts')->with('add', 'Post Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comments = Comment::where('post_id', $id)->get();
        return view('admin.post.comment', compact('comments'));
    }

    public function showHideComment($id, Request $request)
    {
        $comment = Comment::findOrFail($id);

        $status = $comment->status === 'show' ? 'hide' : 'show';

        $comment->update([
            'status' => $status,
        ]);

        return back()->with('upt', 'Comment Status Changed Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);

        $post = Post::find($id);
        if ($request->hasFile('image')) {
            $postImage = $post->image;
            File::delete('storage/post-images/' . $postImage);

            $image = $request->image;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/post-images', $imageName);

            $data['image'] = $imageName;
        }
        $post->update($data);

        return redirect('admin/posts')->with('add', 'Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $postImage = $post->image;
        File::delete('storage/post-images/' . $postImage);

        $post->delete();

        return back()->with('del', 'Post Deleted!');
    }
}
