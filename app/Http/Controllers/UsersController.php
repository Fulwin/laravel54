<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\Level;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use Auth;

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
        $users = User::ignoreAdmin()->filterAbnormalUsers()->ignoreSelf()->orderBy('created_at', 'desc')->paginate(10);
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
        $users = User::where('status', '>', 0)->orderBy(DB::raw('convert(`name` using gbk)'))->get();
        $departments = Department::orderBy(DB::raw('convert(`name` using gbk)'))->get();
        $posts = Post::orderBy(DB::raw('convert(`name` using gbk)'))->get();
        $levels = Level::orderBy('sort', 'asc')->get();

        return view('users.create', compact('users', 'departments', 'posts', 'levels'));
    }

    // 创建逻辑
    public function store(UserRequest $request, User $user)
    {
        $user->fill(request()->all());
        $user->password = bcrypt('secret');
        $user->save();

        $this->sendEmailConfirmationTo($user);

        return redirect('users')->with('success', '验证邮件已发送到填写的注册邮箱上，等待用户激活');
    }

    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $to = $user->email;
        $subject = "您的OA系统账号已生成，请确认激活";

        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
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
