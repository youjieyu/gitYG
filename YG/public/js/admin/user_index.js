$(function(){
   //给分组下拉框绑定change事件
   $("select[name=groupid]").change(function(){
       var result=confirm("确定要修改用户对应的分组?");
       if(!result){ 
           location.reload();
           return;
       }
       //发送请求
       $.ajax({
           type:"get",
           url:"/Admin/user/setGroup",
           data:"groupid="+ $(this).val()+"&id="+$(this).attr("uid"),
           dataType:"json",
           success:function(result){
               alert(result.info);
               if(!result.status) location.reload();
           }
       });
   });
})

