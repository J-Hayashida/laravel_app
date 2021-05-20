<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Laravelフレームワークが提供するログイン画面表示メソッドをオーバーライド
     */
    public function showLoginForm()
    {
        $groups = Group::where('active', 1)->orderBy('seq')->get();
        if (\old('group') == ''){
            $users = collect(new User);
        }else{
            $users = User::where('groups_id', (int)\old('group'))->where('active', 1)->get();
        }
        return view('auth.login')->with(['groups' => $groups, 'users' => $users]);
    }

    /**
     * デフォルトでLaravelは"email"フィールドを認証に利用します。
     * これを変更する為に、本メソッドを追加し、任意のフィールド名を返却します
     */
    public function username()
    {
        return 'name';
    }

    /**
     * グループに所属するユーザを取得する
     */
    public function getGroupUsers(Request $request)
    {
        $group = $request['group'];
        $users = User::where('groups_id', (int)$group)->where('active', 1)->get();
        return $users;
    }
}
