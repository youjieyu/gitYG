@include("admin.layout.head")
<link type="text/css" href="/bootstrap/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/admin/style.css">
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">用户列表</h2>
       
      </div>
     <form action="/Admin/user" method="post">
      <section class="mtb">
       <select class="select" name="key">
        <option value="name" @if($key=='name') selected @endif />按账号查询</option>
        <option value="nickname" @if($key=='nickname') selected @endif>按昵称查询</option>
       </select>
       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <input name="keyword" type="text" class="textbox textbox_225" placeholder="请输入关键词..." value="{{$keyword}}"/>
       <input type="submit" value="查询" class="group_btn"/>
      </section>
     </form>
      <table class="table">
       <tr>
        <th>用户ID</th>
        <th>用户账户</th>
        <th>用户头像</th>
        <th>用户昵称</th>
        <th>手机</th>
        <th>创建时间</th>
        <th>所属分组</th>
        <th>操作</th>
       </tr>
       
       @foreach($users as $user)
       <tr>
        <td class="center" id="uid">{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td class="center"><img src="{{$user->avartar}}" width="50px" height="50px"></td>
        <td class="center">{{$user->nickname}}</td>
        <td class="center">{{$user->phone}}</td>
        <td class="center">{{$user->addtime}}</td>
        <td>
            <select name="groupid" uid="{{$user->id}}">
                @foreach($groups as $group)
                  @if($user->group_id == $group->id)
                    <option value="{{$group->id}}" selected>{{$group->title}}</option>
                  @else
                    <option value="{{$group->id}}" >{{$group->title}}</option>
                  @endif
                @endforeach
            <select/>
        </td>
        <td class="center">
         
         <a href="{{ url('/Admin/user/'.$user->id.'/edit') }}" title="编辑" class="link_icon">&#101;</a>
         <a  title="删除" class="link_icon" href="{{url('/Admin/user/delete/'.$user->id)}}">&#100;</a>
        </td>
       </tr>
      @endforeach
       
      </table>
    <p >
        
         {!!$users->appends(["keyword"=>$keyword])->render()!!}
     </p>
 </div>
 <script>
     var vido=function(id){
         var result = confirm("确认删除吗？");
        
         if(result==true){
        
           var request = new XMLHttpRequest();
          request.onloadend = function () {
              var result = eval("(" + request.responseText + ")");
              alert(result.info);
              location.reload();
           }  
          request.open("get","/Admin/user/delete/"+id);
          request.send(null);
      }
  }
 </script>
  
 <script src="/js/admin/user_index.js"></script>

</section>
@include("admin.layout.foot")