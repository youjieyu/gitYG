@include("admin.layout.head")
<script scr="/js/admin/jquery-1.8.3.min.js"></script>
<section class="rt_wrap content mCustomScrollbar">
 <div class="rt_content">
      <div class="page_title">
       <h2 class="fl">添加用户</h2>
       
      </div>
     <form action="/Admin/insert" method="post" name="add">
         <input type="hidden" name="_token" value="{{csrf_token()}}">
     <section>
      <ul class="ulColumn2">
       <li>
        <span class="item_name" style="width:120px;">用户账号：</span>
        <input type="text" name="name" class="textbox textbox_295" placeholder="用户账号..."/>
        <span class="errorTips" style="display:none" id="name_error"></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">用户密码：</span>
        <input type="password" name="password" class="textbox textbox_295" placeholder="用户密码..."/>
        <span class="errorTips" style="display:none" id="password_error"></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">确认密码：</span>
        <input type="password" name="regpassword" class="textbox textbox_295" placeholder="用户密码..."/>
        <span class="errorTips" style="display:none" id="regpassword_error"></span>  
       </li>
       <li>
        <span class="item_name" style="width:120px;">用户昵称：</span>
       <input type="text" name="nickname" class="textbox textbox_295" placeholder="用户昵称..."/>
        <span class="errorTips" style="display:none" id="nickname_error"></span>
       </li>
       <li>
        <span class="item_name" style="width:120px;">手机：</span>
        <input type="text" name="phone" class="textbox textbox_295" placeholder="用户手机..."/>
        <span class="errorTips" style="display:none" id="phone_error"></span>
       </li>
        <li>
        <span class="item_name" style="width:120px;" >性别：</span>
        <input type="radio" name="sex" value="男" checked>男&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="sex" value="女">女
       </li>
        <li>
        <span class="item_name" style="width:120px;"></span>
        <input type="submit" class="link_btn"/>
       </li>
      </ul>
     </section>
     </form>
 </div>
</section>
<script src="/js/admin/user_add.js"></script>
@include("admin.layout.foot")