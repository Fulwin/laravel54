<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['confirmEmail']
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

        $this->sendEmailConfirmationTo($user);

        session()->flash('success', "验证邮件已发送到填写的注册邮箱上，等待用户激活。");

        return redirect('users');
    }

    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = 'oa@atoptechnology.com';
        $name = 'ATOP-华拓光通信OA系统';
        $to = $user->email;
        $subject = '您的OA系统账号已生成，请确认激活';

        Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
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

    // 用户激活
    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '您已成功激活账号');
        return redirect()->route('users.show', [$user]);
    }
}
