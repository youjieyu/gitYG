<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
   public function index(){
      return view("home.details.index");
	  
   }   
   public function lists(){
      return view("home.lists.index");
	  
   }
}