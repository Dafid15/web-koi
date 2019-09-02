<?php
/**
 * Created by PhpStorm.
 * User: IKIDAFID
 * Date: 11-Jul-19
 * Time: 5:12
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index()
    {
        if(!empty(Session::get('activeUser'))){
            return redirect('/');
        }

        $params=[
            'title'=>'Login',
        ];

        return view('login.login',$params);

    }
    public function login(Request $request)
    {
        $username=$request->username;
        $password=$request->password;

        if($username=='admin@admin.com' && $password=='admin')
        {
            Session::put('activeUser',$username);
            return redirect('/');
        }else{

        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

}