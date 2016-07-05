
  flag=false;
document.add.name.onblur = function() {
    var name = this.value;
    var name_error = document.getElementById("name_error");
    
    if (name.match(/^\s*$/)) {
       
        name_error.innerHTML = "账号不能为空";
        name_error.style.display = '';
         flag=false;
    } else {
          var request = new XMLHttpRequest();
          request.onloadend = function () {
              var result = eval("(" + request.responseText + ")");
             
               if(!result.status){
                     name_error.innerHTML = result.info;
                     name_error.style.display = '';
                    
                }else{
                    name_error.innerHTML = result.info;
                     name_error.style.display = 'none';
                      flag=true;
                     
                }
          }
          request.open("get","/Admin/findname?name="+name);
          request.send(null);
    }
   
}

document.add.password.onblur = function() {
    var password = this.value;
    var password_error=document.getElementById("password_error");
    if(password==""){
         password_error.innerHTML = "";
          password_error.style.display = 'none';
           flag=true;
    }else{ 
    if(password.length<6 || password.length>15){
          password_error.innerHTML = "密码长度应为6到15位";
          password_error.style.display = '';
           flag=false;
    }else{
          password_error.innerHTML = "";
          password_error.style.display = 'none';
           flag=true;
    }
    }
}

document.add.regpassword.onblur = function() {
    var regpassword = this.value;
    var password=document.add.password.value;
    var regpassword_error=document.getElementById("regpassword_error");
    if(password==""){
        regpassword_error.innerHTML = "";
          regpassword_error.style.display = 'none';
           flag=true;
    }else{
    if(regpassword!=password){
          regpassword_error.innerHTML = "确认密码有误";
          regpassword_error.style.display = '';
           flag=false;
    }else{
          regpassword_error.innerHTML = "";
          regpassword_error.style.display = 'none';
           flag=true;
    }
    }
}

document.add.nickname.onblur = function() {
    var nickname = this.value;
    var nickname_error=document.getElementById("nickname_error");
    if(nickname.match(/^\s*$/)){
          nickname_error.innerHTML = "昵称不能为空";
          nickname_error.style.display = '';
         flag=false;
    }else{
          nickname_error.innerHTML = "";
          nickname_error.style.display = 'none';
          flag=true;
    }
    
}

document.add.phone.onblur = function() {
    var phone = this.value;
    var phone_error=document.getElementById("phone_error");
    if(!(/^1[3|4|5|7|8]\d{9}$/.test(phone))){
          phone_error.innerHTML = "请输入正确的手机号";
          phone_error.style.display = '';
          flag=false;
    }else{
          phone_error.innerHTML = "";
          phone_error.style.display = 'none';
          flag=true;
    }
    
}

document.add.onsubmit=function(){
   if(!flag){
       alert("您的填写有误，请重新填写");
   }
   
//           $.ajax({
//            type: "post",
//            uploader:"/Admin/insert", //请求的地址
//            data:"1", //发送的数据
//            dataType: "json", //返回结果的类型
//            //执行成功时的处理方法
//            success: function(result) {//success表示返回结果
//                if(!result.status){
//                    alert(result.info);
//                }
//            }
//        });
   
   return flag;
}