<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use Input;
use Validator;
use Redirect;
use Crypt;

class UserController extends Controller
{
    /**
     * Get user list
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(4);
        return view('user.users', compact('user'));
    }

    /**
     * return a new page which used to create users
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * excute 'Insert' operation
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. get infomation
        $input = $request->except('_token');
        $input['password'] = Crypt::encrypt($input['password']);
        // dd($input);
        //2. form validation
            
        //3.add operation
        $submit = User::create(['username'=>$input['username'], 'email'=>$input['email'], 'name'=>$input['name'],'password'=>$input['password'], 'salary'=>$input['salary'], 'permission'=>$input['permission']]);
        // dd($submit);

        // if the operation is success,
        if ($submit) {
            return redirect('admin/user');
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);

        return view('admin/user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
