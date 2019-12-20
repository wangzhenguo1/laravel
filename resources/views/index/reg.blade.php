@extends('layouts.shop')

@section('title','登录')

@section('content')

<header>
      <a href="{{url('/')}}" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('/store')}}" method="get" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="{{url('/login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="email"  id="email" placeholder="输入邮箱号" /></div>
       <div class="lrList2"><input type="text" name="email_verified_at" placeholder="输入邮箱验证码" />
           <button  id="email_verified_at">获取验证码</button></div>
       <div class="lrList"><input type="text" name="password" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text" name="pwd" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
@endsection
<script src="/static/admin/js/jquery.js"></script>
<script>
    var num=60;
    // 邮箱注册
    $(document).on("click","#email",function(){
        // 获取邮箱中的值
        var user_email=$("#email").val();

        //	  验证 非空 格式
        var reg=/^\w+@\w+\.com$/;
        if(email==''){
            alert("邮箱必填");
            return false;
        }else if(!reg.test(email)){
            alert("邮箱格式有误");
            return false;
        }

        // 邮箱倒计时
        $("#email_verified_at").text(num+'s'); //给'获取'两个字改为60s
        _time=setInterval(goTime,1000);


        // 通过ajax技术将邮箱发给控制器
        $.post(
            "/store",
            {user_email:email},
            function(res){
                alert(res.font)
            },
            'json'
        );
    })
</script>
