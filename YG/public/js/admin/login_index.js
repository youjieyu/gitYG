document.login.onsubmit = function() {

    //获取用户输入的值
    var name = this.name.value;
    var password = this.password.value;
    var code = this.code.value;


    //判断是否符合条件
    var arr = new Array();
    if (name.match(/^s*$/)) {
        arr['nameerr'] = "账号未填写";
    } else {
        arr['nameerr'] = "";
    }

    if (password.length > 15 || password.length < 6) {
        arr['passworderr'] = "密码长度在6到15位之间";
    } else {
        arr['passworderr'] = "";
    }

    if (code.length !== 5) {
        arr['codeerr'] = "验证错误";
    } else {
        arr['codeerr'] = "";
    }

    var flag = true;
    for (var key in arr) {
        if (arr[key] != '')
            flag = false;
        document.getElementById(key).innerHTML = arr[key];
    }


    return flag;


}


