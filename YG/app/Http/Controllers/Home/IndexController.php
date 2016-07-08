<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
   public function index(){
       return view("home.index");
   }
   
   public function lists(){
       return view("home.list.index");
   }
}