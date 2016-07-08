<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session,DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * 显示分组列表
     */
    public function index(Request $request){
        //查询所有分组信息
        $groups=DB::table("group")->get();
        $rules =DB::table("rule")->get();
        //加载模板显示
//        return view("admin.group.index");
        return view("admin.group.index",["groups"=>$groups,"rules"=>$rules]);
    }
}

