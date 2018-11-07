<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramGetDataController extends Controller
{
    public function index(Request $request){
    	$res=getDetails('https://instagram.com/'.$request->username);
    	return $res;
    }
}
