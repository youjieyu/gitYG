<?php

namespace App\Http\Middleware;

use Closure;
use Session,DB;
class CommonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
          if(!Session::has("userData") && !preg_match("/^\/Admin\/login/",$_SERVER["REQUEST_URI"])){
           return redirect("/Admin/login");
          
       }else
       //权限验证
       {
           //查看所有的权限列表 判断当前的操作是否需要权限验证
           $result=DB::table("rule")->get();
           $rules=array();
           foreach($result as $tmp)
           {
               $rules[$tmp->name]=$tmp->title;
           }
           //dd($rules);
           //过滤重组路由
            $subject = preg_replace("/\?.+$/", "", $_SERVER["REQUEST_URI"]);
            $subject = preg_replace("/\/\d+/", "", $subject);
          
           //dd($subject);
           if(array_key_exists($subject, $rules))
           {
               //获取当前用户的分组
               $groupid=DB::table("user")
                       ->leftJoin("group_access","user.id","=","group_access.id")
                       ->where("user.id",Session::get("userData")->id)
                       ->pluck("group_access.group_id");
               //由分组查询权限集合
               $lists=DB::table("group")->where("id",$groupid)->pluck("rules");
               //当前操作的权限的ID
               $rule=DB::table("rule")->where("name",$subject)->pluck("id");
               if(!in_array($rule,  explode(",", $lists)))
               {
//                    echo json_encode(array("info"=>"有没有返回"));
                   
                   echo "<script>alert('权限不足，请联系管理员');window.location.href='/Admin/user'</script>";
               }       
           }
       }
       return $next($request);
    }
}
