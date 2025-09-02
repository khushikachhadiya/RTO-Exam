<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class QuestionbankController extends Controller
{
   public function view(){
    return view('web.questionbank.index');
   }
}
