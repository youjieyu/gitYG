@include("admin.layout.head")
<script src="/plugins/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/plugins/uploadify/uploadify.css">
 <!--<script src="/js/admin/jquery-1.8.3.min.js" type="text/javascript"></script>-->
<section class="rt_wrap content mCustomScrollbar">
     <div class="page_title">
       <h2 class="fl">个人用户中心</h2>
     
      </div>

            <div class="main_right fl">
                
                <img id="im" src="{{Session::get("userData")->avartar}}" width="200"  class="fl" />
                <!--<img id="im" src="__PUBLIC__/{$row['avartar']}" width="120"  class="fl" />-->
                <ul class="fl ulstyle">
                 
                    <li>账号:{{Session::get("userData")->name}}</li>
                     <li>昵称:{{Session::get("userData")->nickname}}</li>
                    <li>性别:{{Session::get("userData")->sex}}</li>
                    <li>创建时间:{{Session::get("userData")->addtime}}</li>
                    
                </ul>
            </div>
                <div class="clear"></div>
                 <form name="fm" >
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <input type="hidden" name="id" value="{{Session::get("userData")->id}}">
			<p style="margin:10px 40px"><input type="file" name="avartar" id="avartar" /></p>
		</form>
                <div id="queue"></div>
           <script src="/js/admin/index.js"></script>
</section>
@include("admin.layout.foot")


