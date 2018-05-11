<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function index()
	{
	    return view('admin/user/index')->with('users', \App\User::all());
	}

    public function destroy($id)
    {
        \App\User::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
