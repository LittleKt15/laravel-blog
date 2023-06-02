<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StudentCount;
use Illuminate\Http\Request;

class StudentCountController extends Controller
{
    public function index(){
        $studentcount = StudentCount::all();
        $student = StudentCount::find(1);
        return view('admin.student-count.index', compact('studentcount', 'student'));
    }

    public function store(Request $request){
        $request->validate([
            'count' => 'required',
        ]);

        StudentCount::create([
            'count' => $request->count,
        ]);
        return back()->with('add', 'StudentCount Added!');
    }

    public function update($id, Request $request){
        $request->validate([
            'count' => 'required',
        ]);

        $studentcount = StudentCount::find($id);
        //$count = $studentcount->count;

        $studentcount->update([
            'count' => $studentcount->count + $request->count,
        ]);
        return back()->with('add', 'Student Added!');
    }
}
