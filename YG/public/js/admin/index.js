/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
	$("#avartar").uploadify({
		//绑定flash脚本
		swf : "/plugins/uploadify/uploadify.swf",
		//设置按钮样式
		buttonText : "点击上传",
		buttonImage: "/plugins/uploadify/ImgBtn.png",
		width:100,
		height:25,
                //上传要求控制
                fileTypeExts:"*.jpg;*.jpeg;*.png;*.gif",
                fileSizeLimit:1*1024*1024,
                formData:{
                   _token:document.fm._token.value,
                   id:document.fm.id.value,
                },
                //提交处理
                method:"post",                
                uploader:"/Admin/user/avartar",
                onUploadSuccess:function(file,txt,response){
                   eval("var result="+txt);
                   if(!result.status){
                       alert(result.info);
                   }else{
                       $("#im").attr("src",result.info);
                   }
                },
	
	});
})

