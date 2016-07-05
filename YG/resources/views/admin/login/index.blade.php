<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>YG后台登录</title>
        <meta name="author" content="YJY LSX ZH WSL" />
        <link rel="stylesheet" type="text/css" href="/css/admin/style.css" />
        <style>
            body{height:100%;background:#16a085;overflow:hidden;}
            canvas{z-index:-1;position:absolute;}
        </style>
        <script src="/js/admin/jquery.js"></script>
        <script src="/js/admin/verificationNumbers.js"></script>
        <script src="/js/admin/Particleground.js"></script>
        <style>
            #error{
                color: red;
                font:20px/16px 宋体;
            }
            span{
                color:red;
            }
        </style>

        <script>
            $(document).ready(function() {
                //粒子背景特效
                $('body').particleground({
                    dotColor: '#5cbdaa',
                    lineColor: '#5cbdaa'
                });
            });
        </script>
    </head>
    <body>
        <dl class="admin_login">
            <dt>
            <strong>YG后台管理系统</strong>
            <em>Management System</em>
            </dt>

            <form action="/Admin/login/logTodo" method="post" name="login">
                <!--     <dd >
                      <p id="error">{{session("info")}}
                        @if(count($errors)>0)
                          <ul style="font:13px/20px 宋体;color:red;align:center;">
                              @foreach($errors->all() as $error)
                              <li>{{$error}}</li>
                              @endforeach
                           </ul>
                        @endif
                      </p>
                 </dd>-->
                <dd class="user_icon">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="text" name="name" placeholder="用户" class="login_txtbx" value="{{$data['name'] or ''}}"/>
                </dd>
                <span id="nameerr">{{session("info1")}}</span>
                <dd class="pwd_icon">
                    <input type="password" name="password" placeholder="密码" class="login_txtbx" value=""/>

                </dd>
                <span id="passworderr">{{session("info2")}}</span>
                <dd class="val_icon">
                    <div class="checkcode" style="width:240px;background:#5CBDAA">
                        <div><input type="text" id="J_codetext" placeholder="验证码" maxlength="5" class="login_txtbx" value="{{$data['code'] or ''}}" name="code">
                  <!--          <canvas class="J_codeimg" id="myCanvas" onclick="createCode()"></canvas>-->
                            <img src="{{url('/Admin/login/captcha').'/'.rand()}}"  onclick="this.src = this.src.replace(/\d+$/, '') + Math.random();"  style="margin:0 0 0 9px">

                        </div>

                    </div>
                    <span id="codeerr">{{session("info3")}}</span>
                </dd>
                <dd>
                    <input type="submit" value="立即登陆" class="submit_btn"/>
                </dd>
            </form>
            <dd>
                <p>© Lamp143 版权所有</p>
                <p>YJY LSX ZH WSL</p>
            </dd>

            <script src="/js/admin/login_index.js"></script>
        </dl>
    </body>
</html>
