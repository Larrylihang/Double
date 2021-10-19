<?php
/*
 * @Author: your name
 * @Date: 2021-05-22 09:58:19
 * @LastEditTime: 2021-10-18 16:43:41
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: /practiceProject/app/Http/Controllers/Admin/LoginController.php
 */

namespace App\Http\Controllers\Admin;

use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use Validator;
use Redirect;
use Captcha;
use Crypt;
use Session;
use DB;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    //form validation
    public function receive(Request $request)
    {
        $rules = [
            'code' => 'required|captcha',
            'username' => 'required|min:2|max:15',
            'password' => 'required|min:6|max:20',
        ];
        $msg = [
            'username.required' => 'Username is required!',
            'username.min' => 'Username must more than 2 words!',
            'password.required' => 'Password is required!',
            'code.required' => 'Please Enter Verifycode!',
            'code.captcha' => 'Verifycode is incorrect!',
        ];
        $sum = DB::table('users')->sum('salary');
        $input = Input::all();  //receive infromation users post
        $validator = Validator::make(Input::all(), $rules, $msg);
        $user = User::where('username', $input['username'])->first();
        Session::put(['username'=>$input['username']]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        if ($user->username != $input['username'] || Crypt::decrypt($user->password) != $input['password']) {
            return redirect('admin/login')->with('errors', 'Username or password is incorrect!');
        } else {
            // return request()->session()->all();
            // return Session::get('user');
            // return \request()->session('username');
            return view('home.index');
        }
    }
    //exit
    public function exit()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }

    //encrypt and decrypt
    // public function crypt(){
    //     $str = '123456';
    //     $str_p = 'eyJpdiI6IjlvNVpNb1BKdnVhejhQZXNKaExPWFE9PSIsInZhbHVlIjoiRGY5TVVEXC90U1dzMmZabllnaTNQbGc9PSIsIm1hYyI6IjdmM2MyN2ZhNDcwMjEzMGZmODI3M2M2OWEyOTY5NTU4ZjkzNzYxYzZlMTRkNzhhMWNlYWM1ZjEyYWNlMWE0YjkifQ==';
    //     echo Crypt::encrypt($str);
    //     echo '</br>';
    //     echo Crypt::decrypt($str_p);

    // }

    //register controller
    public function register()
    {
        return 'hello world!';
    }
}
