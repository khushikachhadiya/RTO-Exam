<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Examcontroller extends Controller
{
   public function view(){
    return view('web.pages.exam.index');
   }
   
}
