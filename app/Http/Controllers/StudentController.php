<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createStudent');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'name.required' => 'Name is required',
            'password.required' => 'Password is required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = Student::create($validatedData);

        return back()->with('success', 'Student created successfully.');
    }
}
