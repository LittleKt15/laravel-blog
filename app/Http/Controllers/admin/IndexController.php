<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "status" => $request->status,
        ]);
        return redirect('admin/users/')->with('update' ,'You have successfully updated!');
    }

    public function destory($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('delete', 'You have successfully deleted!');
    }
}
