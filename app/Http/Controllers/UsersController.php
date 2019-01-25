<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'account' => 'required|max:20|min:2|unique:users',
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users'
        ]);

        $user = User::create([
            'account' => $request->account,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('secret'),
            'gender' => $request->gender,
        ]);

        session()->flash('success', "用户 {$request->name} 创建成功~");

        return redirect()->route('users.show', [$user]);
    }
}
