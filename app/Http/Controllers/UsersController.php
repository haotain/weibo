<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index', 'confirmEmail'] // 除了这几个别的都要登录才能访问
        ]);

        $this->middleware('guest', [
            'only' => ['create'] // 只让未登录用户访问
        ]);
    }

    /**
     * 用户列表页
     */
    public function index()
    {
        $users = User::paginate(6);
        return view('users.index', compact('users'));
    }

    /**
     * 显示用户页
     */
    public function show(User $user)
    {
        // request()->session()->reflash(); // 所有闪存都保留
        // request()->session()->keep(['info']); // 保留指定的
        return view('users.show', compact('user'));
    }

    /**
     * 显示注册页
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * 注册用户
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $this->sendEmailConfirmationTo($user);
        session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');
        // session()->flash('info', 'info~');

        return redirect()->route('users.show', [$user]);
    }

    /**
     * 显示用户跟新页
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    /**
     * 更新用户信息
     */
    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'required|confirmed|min:6'
        ]);

        $user->update([
            'name' => $request->name,
            'password' => bcrypt($request->password)
        ]);
        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }

    /**
     * 邮件激活
     */
    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrfail();
        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');
        return redirect()->route('users.show', [$user]);
    }

    /**
     * 发送邮件
     */
    public function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = 'koutianwsy@163.com';
        $name = 'wsy';
        $to = $user->email;
        $subject = '感谢注册weibo 应用！请确认你的邮箱。';

        Mail::send($view, $data, function($message) use($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
    }
}
