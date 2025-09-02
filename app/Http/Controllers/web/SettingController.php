<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
   public function view(){
    return view('web.setting.index');
   }
}
