<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\controller;

use Illuminate\Http\Request;

class Examcontroller extends Controller
{
   public function view(){
    return view('web.exam.index');
   }
   
}
