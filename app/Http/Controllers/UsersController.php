<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index'] // 除了这几个别的都要登录才能访问
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

        $statuses = $user->statuses()->orderBy('created_at', 'desc')->paginate(10);

        // request()->session()->reflash(); // 所有闪存都保留
        // request()->session()->keep(['info']); // 保留指定的
        return view('users.show', compact('user', 'statuses'));
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
        Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
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

    public function followings(User $user)
    {
        $users = $user->followings()->paginate(30);
        $title = $user->name . '关注的人';
        return view('users.show_follow', compact('users', 'title'));
    }

    public function followers(User $user)
    {
        $users = $user->followers()->paginate(30);
        $title = $user->name . '的粉丝';
        return view('users.show_follow', compact('users', 'title'));
    }
}
