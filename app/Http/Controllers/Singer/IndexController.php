<?php

namespace App\Http\Controllers\Singer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Picture;
use App\Mp3;
use App\Contact;

class IndexController extends Controller
{
    public function index(){
        $musics = Mp3::all();
    	$pictures = Picture::all();
    	return view('singer.index', compact('pictures', 'musics'));
    }
    public function contact(Request $request){
    	$request->validate([
    		'name' => 'required',
    		'phone' => 'required',
    		'description' => 'required',
    	]);
    	$contact = new Contact([
    		'name' => $request->name,
    		'phone' => $request->phone,
    		'description' => $request->description,
    	]);
    	$contact->save();
    	return redirect(route('singer.index'))->with('msg', 'Liên hệ thành công');
    }
}
