<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Youtube;

class YoutubeController extends Controller
{
    public function index(){
    	$youtubes = Youtube::all();
    	return view('admin.video.index', compact('youtubes'));
    }
    public function getAdd(){
    	return view('admin.video.add');
    }
    public function postAdd(Request $request){
    	$request->validate([
    		'link' => 'required|unique:youtube',
    	]);
    	$youtube = $request->link;
    	$youtube = new Youtube([
    		'link' => $youtube,
    	]);
    	$youtube->save();
    	return redirect(route('admin.video.add'))->with('msg', 'Thêm thành công');
    }
    public function getEdit($id){
    	$youtube = Youtube::find($id);
    	return view('admin.video.edit', compact('youtube'));
    }
    public function postEdit(Request $request,$id){
    	$request->validate([
    		'link' => 'required|unique:youtube,link,'.$id,
    	]);
    	$youtube = Youtube::find($id);
    	$youtube->link = $request->link;
    	$youtube->update();
    	return redirect(route('admin.video.index'))->with('msg', 'Sửa thành công');
    }
    public function delete($id){
    	$youtube = Youtube::find($id);
    	$youtube->delete();
    	return redirect(route('admin.video.index'))->with('msg', 'Xoá thành công');
    }
}
