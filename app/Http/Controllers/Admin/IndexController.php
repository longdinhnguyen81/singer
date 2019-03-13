<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Counter;
use App\Contact;
use App\Mp3;

class IndexController extends Controller
{
    public function index(){
    	$contact = Contact::all();
    	$music = Mp3::all();
		$counts = Counter::limit(7)->get();
    	return view('admin.index.index', compact('counts', 'music', 'contact'));
    }
    public function counter(){
        $count = Counter::limit(7)->get();
        return response()->json(['data' => $count]);
    }
}
