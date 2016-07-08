<!doctype html>
<html>
    <head>
        <meta charset="gbk"/>
        <title>登录- ZOL商城</title>
        <meta name="keywords" content="登录- ZOL商城"/>
        <meta name="description" content="登录- ZOL商城"/>
        <link href="/css/home/login/login.css" rel="stylesheet" type="text/css" />
        
        <script src="/js/home/login/jquery-1.8.1.js"  type="text/javascript"></script>
        <script src="/js/home/login/jquery-md5.js"  type="text/javascript"></script>        
    </head>

    <body class="login-index">
        <div class="wrapper">
            <div class="header clearfix">
            <!-- register-bar add by hanjw 2014-6-24-->
            <div class="register-bar"><a href="/index.php?c=Default&a=Register">立即注册</a>还没有ZOL商城账号？</div>
            <!-- //register-bar add by hanjw 2014-6-24-->
                    <div class="logo"> 
                <!-- modify by hanjw 2014-6-24 -->
                <a title="ZOL商城" href="http://www.zol.com"><img width="182" height="60" title="ZOL商城" alt="ZOL商城" src="/images/picture/shop_182x60.png"><p>中关村在线旗下网上商城</p></a>
                <!-- modify by hanjw 2014-6-24 --> </div>
            </div>
            
            <form id="J_loginForm" method="post" action="/Home/login/logTodo">
			<input type="hidden" name="_token" value="{{$data['_token'] or csrf_token()}}"/>
            <div class="login-wrap clearfix">
                <div class="ad-div">
                    <div>                        
                        <a href="#" target="_blank"><img width="520" height="350" src="/images/picture/ad2.jpg" alt=""></a>                        
                    </div>
                </div>
                <div class="login-layer">
                    <div class="login-head">                        
                                               
                        <h3>登录ZOL商城</h3>                        
                    </div>
                    <div class="login-content" id="J_login_common">
                        <div class="login-wrong-tips" id="J_login-wrong-tips" style="display:none;">-</div>
                        <div class="form-item name">
                            <input type="text" name="name" value="{{$data['name'] or ''}}" autocomplete="off" placeholder="手机号/邮箱/用户名" 
							 class="text" id="J_loginUser" maxlength="100">
                            <i class="remove" style="display:none;"></i>
                            <ul style="display:none;" class="account-list" id="J_accountList">                                
                            </ul>
                        </div>
						
						
                        <div class="form-item">                            
                            <input type="password" name="password" value="{{$data['password'] or ''}}" autocomplete="off" placeholder="密码" class="text" id="J_loginPsw" maxlength="20">
                            <i class="remove" style="display:none;"></i> <span class="case-tips" id="J_loginCapsLock">大小写锁定已打开<i class="ico"></i></span>
							</div>
							
						
							
							
                        <div class="form-other"> 
                            <label class="autologon"><!--<input type="checkbox" name="" value="">记住登录状态--></label>
                            <a target="_blank" href="#">忘记密码？</a></div>
                        <input type="hidden" value="1" name="J_login_type" id="J_login_type">
                        <input type="submit" value="登 录" class="login-layer-btn" >
                        <span style="display:none;" class="submit-loading" id="J_loginingBtn">正在登录...</span> 
                    </div>

                    <div class="login-content mobileLogin-content" id="J_login_mobile" style="display:none;">                        
                        <div class="login-wrong-tips" id="J_login-mobile-wrong-tips" style="display:none;">-</div>
                        <!-- add by hanjw 2014-6-24 -->
                        <div class="form-item ">                            
                            <input type="text" autocomplete="off" placeholder="手机号" class="text" id="J_login_mobile_number" name="J_login_mobile_number">
                        </div>
                        <div class="form-item captcha-item">
                            <input type="text" value="" autocomplete="off" placeholder="图片验证码" class="text" id="J_login_mobile_picCode" name="picCode" maxlength="5">
                                <input name="J_login_mobile_token" id="J_login_mobile_token" type="hidden" value="e1869d0596e0afdce408939308198d91">
                                <img width="100" height="40" src="picture/captcha.php" alt="图片验证码" id="J_login_mobile_img">
                        </div>                        
                                           
                        <!-- //add by hanjw 2014-6-24 -->                        
                        <input type="submit" value="登 录" class="login-layer-btn" id="J_loginBtn_mobile">
                        <span style="display:none;" class="submit-loading" id="J_loginingBtn_mobie">正在登录...</span> 
                    </div>             
                    
                    <div class="login-foot clearfix"><span>合作账号登录：</span>
                        <a target="_blank" class="sina" href="">用微博账号登录</a>
                        <a target="_blank" class="qq"  href="">用QQ账号登录</a>
                        <a target="_blank" class="alipay" href="">用支付宝账号登录</a>
                        <a target="_blank" class="baidu" href="">用百度账号</a>
                    </div>
                </div>
            </div>
		
            </form>    
            
            
        </div>   
        
        <div class="footer">
    <div class="wrapper clearfix">
        <div class="about"><a href="#" target="_blank">关于ZOL商城</a>|<a href="#" target="_blank">联系我们</a>|<a href="#" target="_blank">帮助中心</a></div>
        <div class="copyright">&copy;<script type="text/javascript">var yearStr;
            now = new Date();
            yearStr = now.getFullYear();
            document.write(yearStr);</script>. 中关村在线 版权所有</div>
    </div>
</div>
<script language="JavaScript" src="js/pv.js" type="text/javascript"></script>
<script type="text/javascript">
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F7daf617aaf843f0f55a422b00d7de1e7' type='text/javascript'%3E%3C/script%3E"));
</script> 
        <script>
            $(function() {
                
                var callBackUrl = "#";                                
                var baseUrl    = "#";                 
                var zolBaseUrl = "#";
                
		var userAgent  = window.navigator.userAgent.toLowerCase();
                if (navigator.userAgent.indexOf("MSIE") && ("6.0" == $.browser.version)){                
                    zolBaseUrl = "#";                    
                }      
                
                function captchaPhone(){
                    var curtime = new Date().getTime();       
                    var numCnt  = 5;
                    var url     = zolBaseUrl + "/captcha.php?token="+curtime+'&numCnt='+numCnt + '&width=98&height=38';
                    $("#J_login_mobile_img").attr("src", url);
                    $("#J_login_mobile_token").val(curtime);    
                    return false;
                }     
                
                $("#J_login_mobile_img").click(function(){
                    captchaPhone();
                });
                
                // 登录切换
                $(".otherLogin-bar").bind('click', function(){
                    var rel = $(this).attr("rel");
                    if ('J_phone' == rel){
                        $(this).removeClass("mobileLogin-bar").attr("rel", "J_common").html("普通方式登录");
                        $("#J_login_common").hide();
                        $("#J_login_mobile").show();     
                        $("#J_login_type").val(2);
                    }else{
                        $(this).addClass("mobileLogin-bar").attr("rel", "J_phone").html("手机动态码登录");
                        $("#J_login_common").show();
                        $("#J_login_mobile").hide();                           
                        $("#J_login_type").val(1);
                    }
                });
                
                // 选中加红色边框
                $(":input[name != J_login_send_button]").focus(function(){        
                    $(this).parent().addClass("focus");
                }).blur(function(){
                    $(this).parent().removeClass("focus");        
                })     

              
                
                // 普通登录按钮切换
                var userLoginBtn = function(loginType) {
                    if ('none' == loginType) {
                        $("#J_loginingBtn").show();
                        $("#J_loginBtn").hide();
                    } else {
                        $("#J_loginingBtn").hide();
                        $("#J_loginBtn").show();
                    }
                }
                
                 // 手机号登录按钮切换
                var userMobileLoginBtn = function (loginType){
                    if ('none' == loginType) {
                        $("#J_loginingBtn_mobie").show();
                        $("#J_loginBtn_mobile").hide();
                    } else {
                        $("#J_loginingBtn_mobie").hide();
                        $("#J_loginBtn_mobile").show();
                    }                    
                }

              

                // 普通登录
                var userCommonLogin = function(){
                    var name = $("#J_loginUser").val();
                    var password = $("#J_loginPsw").val();  
                   				
                    if ('' == name) {
                        $("#J_login-wrong-tips").html("请填写手机号/邮箱/用户名").show();
                        return false;
                    }

                    if ('' == password) {
                        $("#J_login-wrong-tips").html("请填写正确的密码").show();
                        return false;
                    }    
                    //password = $.md5(password+'zol');
                    userLoginBtn('none');
                    var url = baseUrl + "/index.php?a=AjaxLogin&callback=?&t=" + Math.random();
                    $.getJSON(
                            url,
                            {name: name, password: password},
                            function(data) {           
                                if (data.flag) {
                                    
                                    // 回调 登录zol                                    
                                    var url = zolBaseUrl + "/user/api/v2014/login.php?act=signin&callback=?&t=" + Math.random();                                    
                                    $.getJSON(
                                            url,
                                            {name: data.Name, checkCode: data.checkCode, sid: data.userId, check: data.check},
                                            function(dataJson) {                                                
                                                if (dataJson.code) {
                                                    setTimeout(function() {
                                                        $("#J_login-wrong-tips").html(dataJson.msg).show();
                                                        userLoginBtn();
                                                    }, 1000);
                                                } else {                                                    
                                                    window.location = callBackUrl;
                                                }
                                            }
                                    );
                                } else {
                                    setTimeout(function() {
                                        $("#J_login-wrong-tips").html(data.msg).show();
                                        userLoginBtn();
                                    }, 1000);
                                }
                            }
                    );                    
                }
                $("#J_loginBtn").bind("click", function(e) {
                    userCommonLogin();
                    return false;
                });
         
                // 手机号登录
                var userPhoneNumberLogin = function (){
                    var mobile    = $("#J_login_mobile_number").val();
                    var mobieCode = $("#J_login_mobile_code").val();  
                    if ('' == mobile) {                        
                        $("#J_login-mobile-wrong-tips").html("请填写手机号").show();
                        return false;
                    }                    
                    if (!checkMobile(mobile)){                  
                        $("#J_login-mobile-wrong-tips").html("请填写正确的手机号").show();
                        return false; 
                    }   
                    if ('' == mobieCode) {                        
                        $("#J_login-mobile-wrong-tips").html("请填写手机验证码").show();
                        return false;
                    }
                    
                    var picCode = $('#J_login_mobile_picCode').val();
                    var picToken   = $('#J_login_mobile_token').val();
          
                    
                    userMobileLoginBtn('none');
                    var url = baseUrl + "/index.php?a=AjaxLoginPhone&callback=?&t="+Math.random(); 
                    $.getJSON(
                            url,
                            {mobile:mobile, mobieCode:mobieCode, picCode:picCode, picToken:picToken},
                            function(data){
                                if (data.flag){
                                    
                                    // 发送到论坛验证手机号
                                    var url = zolBaseUrl + "/user/api/v2014/phoneLogin.php?callback=?&tt="+Math.random();                                     
                                    $.getJSON(
                                        url,
                                        {token:data.token, phone:data.mobile, t:data.time},
                                        function(data){
                                            if (data.code){
                                                var errorMsg = '网路繁忙，请稍后再试';
                                                switch(data.code){
                                                    case 400 :
                                                            errorMsg = '验证期已过，请刷新再试一次';
                                                        break;
                                                    case 401 :
                                                            errorMsg = '登录受限，请刷新再登录';
                                                        break;
                                                    case 402:
                                                            errorMsg = '登录帐号被冻结，请10分钟再试';
                                                        break;
                                                    case 403:
                                                            errorMsg = '网路繁忙，请稍后再试';
                                                        break;
                                                    case 404:
                                                            errorMsg = '网路繁忙，请刷新再试';
                                                        break;    
                                                    default:
                                                        errorMsg = '网路繁忙，请稍后再试';
                                                }
                                                $("#J_login-mobile-wrong-tips").html(errorMsg).show();  
                                                userMobileLoginBtn();
                                            }else{
                                                
                                                // 同步本地
                                                var url = baseUrl + "/index.php?a=AjaxLoginPhoneSucess&callback=?&tt=" + Math.random();
                                                $.getJSON(
                                                        url,
                                                        {userId:data.zol_sid, Name:data.zol_userid, checkCode:data.zol_check, cipher:data.zol_cipher},
                                                        function(data){
                                                            window.location = callBackUrl;
                                                        }
                                                );                                                
                                            }
                                        }
                                    ); 
                            
                                }else{
                                    $("#J_login-mobile-wrong-tips").html(data.msg).show();
                                    captchaPhone();
                                    userMobileLoginBtn();
                                }
                            }
                    );                    
                }
                $("#J_loginBtn_mobile").bind('click', function(){
                    userPhoneNumberLogin();
                    return false;
                });
                                
                // 回车提交登录
                $('#J_loginForm').keypress(function(e) {
                    if (e.keyCode == 13) {
                        var loginType = $("#J_login_type").val();
                            loginType = parseInt(loginType);
                        if (1 == loginType){
                            userCommonLogin();
                        }   
                        if (2 == loginType){
                            userPhoneNumberLogin();
                        }
                        
                    }
                });   
                
            });

        </script>       
    </body>
</html>