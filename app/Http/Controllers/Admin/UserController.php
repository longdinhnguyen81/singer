<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;

class UserController extends Controller
{
    public function index(){
    	$users = Users::all();
    	return view('admin.user.index', compact('users'));
    }
    public function getAdd(){
    	$users = Users::all();
    	return view('admin.user.add');
    }
    public function postAdd(Request $request){
    	$request->validate([
    		'fullname' => 'required',
    		'username' => 'required|unique:users',
    		'password' => 'required|confirmed',
    	]);
    	$fullname = $request->fullname;
    	$username = $request->username;
    	$role = $request->role;
    	$password = trim(bcrypt($request->password));
    	$users = new Users([
    		'fullname' => $fullname,
    		'username' => $username,
    	]);
        $users->password = $password;
    	$users->save();
    	return redirect(route('admin.user.index'))->with('msg', 'Thêm thành công');
    }
    public function getEdit($id){
    	$user = Users::find($id);
    	return view('admin.user.edit', compact('user'));
    }
    public function postEdit(Request $request,$id){
    	$request->validate([
    		'fullname' => 'required',
    	]);
    	$user = Users::find($id);
    	$user->fullname = $request->fullname;
    	$request->password?$user->password = trim(bcrypt($request->password)):'';
    	$user->update();
    	return redirect(route('admin.user.index'))->with('msg', 'Sửa thành công');
    }
    public function delete($id){
    	$user = Users::find($id);
    	$user->delete();
    	return redirect(route('admin.user.index'))->with('msg', 'Xoá thành công');
    }
}
