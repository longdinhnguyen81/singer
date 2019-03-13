<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Picture;

class PictureController extends Controller
{
    public function index(){
    	$pictures = Picture::all();
    	return view('admin.picture.index', compact('pictures'));
    }
    public function getAdd(){
    	return view('admin.picture.add');
    }
    public function postAdd(Request $request){
    	$request->validate([
    		'picture' => 'required',
    		'description' => 'required'
    	]);
    	$picture = new Picture();
        if($request->file('picture') != null){
            $path1 = $request->file('picture');
            $files  = date('Y-m-d-H-i-s')."-".$path1->getClientOriginalName();
			$path = public_path('upload');
            $path1->move($path,$files);
            $picture->picture = $files;
        }
        $picture->description = $request->description;
    	$picture->save();
    	return redirect(route('admin.picture.index'))->with('msg', 'Thêm thành công');
    }
    public function getEdit($id){
    	$picture = Picture::find($id);
    	return view('admin.picture.edit', compact('picture'));
    }
    public function postEdit(Request $request,$id){
    	$request->validate([
    		'description' => 'required'
    	]);
    	$picture = Picture::find($id);
        if($request->file('picture') != null){
            $path1 = $request->file('picture');
            $files  = date('Y-m-d-H-i-s')."-".$path1->getClientOriginalName();
			$path = public_path('upload');
            $path1->move($path,$files);
            $app_path = str_replace("\\", '/', public_path());
            $file_path = $app_path.'/upload/'.$picture->picture;
		    unlink($file_path);
            $picture->picture = $files;
        }
        $picture->description = $request->description;
    	$picture->update();
    	return redirect(route('admin.picture.index'))->with('msg', 'Sửa thành công');
    }
    public function delete($id){
    	$picture = Picture::find($id);
        $app_path = str_replace("\\", '/', public_path());
        $file_path = $app_path.'/upload/'.$picture->picture;
	    unlink($file_path);
    	$picture->delete();
    	return redirect(route('admin.picture.index'))->with('msg', 'Xoá thành công');
    }
}
