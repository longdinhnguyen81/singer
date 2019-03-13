<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mp3;

class Mp3Controller extends Controller
{
    public function index(){
    	$musics = Mp3::all();
    	return view('admin.mp3.index', compact('musics'));
    }
    public function getAdd(){
    	return view('admin.mp3.add');
    }
    public function postAdd(Request $request){
    	$request->validate([
    		'title' => 'required',
    		'artist' => 'required',
    		'length' => 'required',
    		'src' => 'required'
    	]);
    	$music = new Mp3([
    		'title' => $request->title,
    		'artist' => $request->artist,
    		'length' => $request->length
    	]);
        if($request->file('src') != null){
            $path1 = $request->file('src');
            $file_music  = date('Y-m-d-H-i-s')."-".$path1->getClientOriginalName();
			$path = public_path('mp3');
            $path1->move($path,$file_music);
            $music->src = $file_music;
        }
        $music->save();
    	return redirect(route('admin.mp3.index'))->with('msg', 'Thêm thành công');
    }
    public function getEdit($id){
    	$music = Mp3::find($id);
    	return view('admin.mp3.edit', compact('music'));
    }
    public function postEdit(Request $request,$id){
    	$request->validate([
    		'title' => 'required',
    		'artist' => 'required',
    		'length' => 'required',
    	]);
    	$music = Mp3::find($id);
        if($request->file('src') != null){
            $path1 = $request->file('src');
            $file_music  = date('Y-m-d-H-i-s')."-".$path1->getClientOriginalName();
			$path = public_path('mp3');
            $path1->move($path,$file_music);
            $music->src = $file_music;
            $app_path = str_replace("\\", '/', public_path());
            $file_path = $app_path.'/mp3/'.$music->src;
		    unlink($file_path);
        }
    	$music->title = $request->title;
    	$music->artist = $request->artist;
    	$music->length = $request->length;
    	$music->update();
    	return redirect(route('admin.mp3.index'))->with('msg', 'Sửa thành công');
    }
    public function delete($id){
    	$music = Mp3::find($id);
        $app_path = str_replace("\\", '/', public_path());
        $file_path = $app_path.'/mp3/'.$music->src;
	    unlink($file_path);
    	$music->delete();
    	return redirect(route('admin.mp3.index'))->with('msg', 'Xoá thành công');
    }
}
