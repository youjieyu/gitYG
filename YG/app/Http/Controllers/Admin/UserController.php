<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,
    Session,Hash;

class UserController extends CommonController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //查询用户信息
        // $users = DB::table("user")->orderBy("id", "DESC")->paginate(8);
     // if(!empty($request($keyword))){
        $key= empty($request->get("key"))? "name":$request->get("key");
        
      $users = DB::table("user")->orderBy("id", "DESC")
               ->where($key,"LIKE","%".$request->get("keyword")."%")
               ->paginate(5);
        $keyword=$request->get("keyword");
       return view("admin.user.index", ["users" => $users,"keyword"=>$keyword,"key"=>$key]);
     // }else{
       //    $users = DB::table("user")->orderBy("id", "DESC")->paginate(5);
      
      //  return view("admin.user.index", ["users" => $users]);
     // }
    }

    /**
     * 驱动添加页面视图
     * 
     * */
    public function add() {
        return view("admin.user.add");
    }

    /**
     * 账号验证操作
     * 
     * */
    public function findname() {
        $name = $_GET['name'];
         $res= DB::table("user")->where("name", $name)->first();
        if ($res) {
            $arr = array("status" => 0, "info" => "账号已存在");
            echo json_encode($arr);
        } else {
            $arr = array("status" => 1, "info" => "");
            echo json_encode($arr);
        }
    }

    
     /**
     * 添加操作操作
     * 
     * */
    public function insert(Request $request){
        $data=$request->except("_token","regpassword");
        
        $data['password']=Hash::make($data['password']);
        $data['addtime']=date("Y-m-d");
        $lastInsertId=DB::table("user")->insertGetId($data);
//        if($lastInsertId){
//            echo json_encode(array("status"=>1,"info"=>"添加成功，ID是{$lastInsertId}"));
//        }else{
//            echo json_encode(array("status"=>0,"info"=>"添加失败"));
//        }
        if(false!==$lastInsertId){
            return redirect("Admin/user");
        }else{
           return back()->with(["info" => "添加用户失败"]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *修改页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //查询该用户记录
        $userRec=DB::table("user")->where("id",$id)->first();
        
        //显示模板
        return view("admin.user.edit",compact("userRec"));
    }

    /**
     * Update the specified resource in storage.
     *修改用户
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
        $data=$request->except("_token","regpassword","_method");
        if(!empty($data['password'])){
             $data['password']=Hash::make($data['password']);
        }else{
             unset($data['password']);
        }
        if(false!=$affectedRows=DB::table("user")->where("id",$id)->update($data)){
            return redirect("/Admin/user");
        }
    }

    /**
     * Remove the specified resource from storage.
     * 删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //删除用户
        if(false!==DB::table("user")->where("id",$id)->delete()){
           echo json_encode(array("info"=>"删除成功"));
        }else{
            echo json_encode(array("info"=>"删除失败"));
        }
        
    }

    //上传头像的方法
    public function avartar(Request $request) {

        if (!$request->hasFile("Filedata")) {
            return response()->json(array("status" => 0, "info" => "文件未提交"));
        }
        //接受文件并转存
        $file = $request->file("Filedata");
        //重组文件名
        $suffix = $file->getClientOriginalExtension(); //获得文件后缀名
        $rename = date("Ymd") . rand(100, 999) . "." . $suffix;

        //转存文件
        $file->move("./uploads/avartar", $rename);
        //将存储的文件信息 写入数据库
        DB::table("user")->where("id", $request->get("id"))->update(["avartar" => "/uploads/avartar/" . $rename]);
        //情况当前的session
        $data = Session::pull("userData");
        //重新设置session里面的avartar的值
        $data->avartar = "/uploads/avartar/" . $rename;
        //放入查找到的用户的值
        Session::put("userData", $data);
        //返回结果
        return response()->json(array("status" => 1, "info" => "/uploads/avartar/" . $rename));
    }

}
