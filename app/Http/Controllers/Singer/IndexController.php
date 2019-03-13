<?php

namespace App\Http\Controllers\Singer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Youtube;
use App\Picture;

class IndexController extends Controller
{
    public function index(){
    	$videos = Youtube::limit(6)->get();
    	$pictures = Picture::all();
    	return view('singer.index', compact('videos', 'pictures'));
    }
    public function postContact(){

    }
}
