<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index']
        ]);

        $this->middleware('guest', [
            'only' => []
        ]);
    }

    // 列表页
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    // 详情页面
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // 创建页面
    public function create()
    {
        return view('users.create');
    }

    // 创建逻辑
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

    // 更新页面
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // 更新逻辑
    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
        ]);

        $this->authorize('update', $user);

        $user->update([
            'name' => $request->name,
            'gender' => $request->gender
        ]);

        session()->flash('success', '用户资料更新成功！');

        return redirect()->route('users.show', $user->id);
    }

    // 删除用户
    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }
}
