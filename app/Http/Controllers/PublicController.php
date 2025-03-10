<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){
        return view('welcome');
    }

    public function errorpage(){
        return view('posts.error');
    }
}
