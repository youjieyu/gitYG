<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session,
    DB,
    Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\CaptchaBuilder;

class LoginController extends Controller {

    public function index(Request $requset) {
        $data = $requset->old();
        return view("admin.login.index", compact("data"));
        //return view("admin.login.index");
    }

    /**
     * Display a listing of the resource.
     * 登录验证
     * @return \Illuminate\Http\Response
     */
    public function logTodo(Request $request) {
        //接受数据
        $data = $request->all();

        //验证码是否正确
        if (session("code") != $data["code"]) {
            $request->flash();
            return back()->with(["info3" => "验证错误"]);
        }

//        //有效性验证
//		$this->validate($request, [
//			"name" => "required",
//			"password" => "required|between:6,15",
//		], [
//			"name.required" => "账号未填写",
//			"password.required" => "密码不能为空",
//			"password.between" => "密码长度应为6-15位"
//		]);
        //真实性验证
        $userRec = DB::table("user")->where("name", $data["name"])->first();

        if (empty($userRec)) {
            $request->flash();
            return back()->with(["info1" => "账号不存在"]);
             }else if(!Hash::check($data["password"],$userRec->password)){
        //} else if ($data["password"] != $userRec->password) {
            $request->flash();
            return back()->with(["info2" => "密码错误"]);
        } else {//返回结果
            //将用户状态写入session
            session(["userData" => $userRec]);
            return redirect("/Admin");
        }
    }

    //验证码方法
    public function captcha() {
        //生成验证码图片的Builder对象,配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 45, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        Session::flash("code", $phrase);
        //生成图片
        header("Cache-Control:no-cache,must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    //退出登录
    public function logout() {
        //销毁session
        Session::forget("userData");
        return redirect("/Admin");
    }

}
