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
                    <option value="name" >按账号查询</option>
                    <option value="nickname" >按昵称查询</option>
                </select>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input name="keyword" type="text" class="textbox textbox_225" placeholder="请输入关键词..." />
                <input type="submit" value="查询" class="group_btn"/>
            </section>
        </form>
        <table class="table">
            <tr>
                <th>分组ID</th>
                <th>分组名称</th>
                <th style="width:370px">分组权限</th>
                <th>分组操作</th>

            </tr>

            @foreach($groups as $group)
            <tr>
                <td>{{$group->id}}</td>
                <td>{{$group->title}}</td>
                <td style="width:370px">
                    @foreach($rules as $rule)
                    @if(in_array($rule->id,explode(",",$group->rules)))
                    <input type="checkbox" name="rule" value="{{$rule->id}}" checked>{{$rule->title}}|&nbsp;&nbsp;
                    @else
                    <input type="checkbox" name="rule" value="{{$rule->id}}" >{{$rule->title}}|&nbsp;&nbsp;
                    @endif
                    @endforeach
                </td>
                <td class="center">

                    <a href="" title="编辑" class="link_icon">&#101;</a>
                    <a id='delete' title="删除" class="link_icon" onclick="vido()">&#100;</a>
                </td>
            </tr>
            @endforeach

        </table>
        <p >


        </p>
    </div>
    <script>
                var vido = function(id){
                var result = confirm("确认删除吗？");
                        if (result == true){

                var request = new XMLHttpRequest();
                        request.onloadend = function () {
                        var result = eval("(" + request.responseText + ")");
                                alert(result.info);
                                location.reload();
                        }
                request.open("get", "/Admin/user/delete/" + id);
                        request.send(null);
                }
                }
    </script>

    <script src="/js/admin/user_index.js"></script>

</section>
@include("admin.layout.foot")

