<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\WWW\laite\public/../application/index\view\login\index.html";i:1512355131;}*/ ?>
<!doctype html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo \think\Lang::get('login_title'); ?></title>
  
  <link rel="stylesheet" type="text/css" href="__STATIC__/index/login/css/default.css">
  <link rel="stylesheet" type="text/css" href="__STATIC__/index/login/css/styles.css">
  <style type="text/css">
    .lag{
    position: relative;
    color: #afb1be;
      width: 190px;
      margin-top: 3px;
      background: #32364a;
      left: 0;
      padding: 10px 65px;
      border-top: 2px solid #393d52;
      border-bottom: 2px solid #393d52;
      border-right: none;
      border-left: none;
      outline: none;
      font-family: 'Gudea', sans-serif;
      box-shadow: none;
    }
    .s-inp{
      padding: 0px 35px 0 10px;
      border:0;
      height: 25px;
      color: #afb1be;
      background: #32364a;

    }
  </style>
</head>
<body>

  <div class="bgimg">
    <img src="__STATIC__/index/login/img/bgimg.png" />
  </div>
  <div class='login'>
    <div class='login_title'>
      <img src="__STATIC__/index/login/img/title.png" />
    </div>
    <div class='login_fields'>
      <form action="">
      <div class='login_fields__user'>
        <div class='icon'>
          <img src='__STATIC__/index/login/img/user_icon_copy.png'>
        </div>

        <input placeholder='<?php echo \think\Lang::get('yonghuming'); ?>' type='text' name="user">
          <div class='validation'>
            <img src='__STATIC__/index/login/img/tick.png'>
          </div>
        </input>
      </div>
      <div class='login_fields__password'>
        <div class='icon'>
          <img src='__STATIC__/index/login/img/lock_icon_copy.png'>
        </div>
        <input placeholder='<?php echo \think\Lang::get('mima'); ?>' type='password' name="user_pass">
        <div class='validation'>
          <img src='__STATIC__/index/login/img/tick.png'>
        </div>
      </div>
      <div class='lag'>
       <div class='icon'>
          <img src='__STATIC__/index/login/img/lag.png' style="width:18px;height:18px">
        </div>
         <select name="select_name"  onChange="ShowToText(); " class="s-inp" >
          <option>please choose the language</option>   
            <option value="zh-cn">中文简体</option>
            <option value="zh-tw">中文繁體</option>  
            <option value="en-us">English</option>  
        </select>
      </div>
      <div class='login_fields__submit'>
        <input type='submit' value='<?php echo \think\Lang::get('denglu'); ?>' onclick="return login()">
        <div class='forgot'>
          <a href='/index/login/forget'><?php echo \think\Lang::get('wangjimima'); ?>?</a>
        </div>
      </div>

    </div>
    </form>
    <div class='disclaimer'>
      <p>
         <b><?php echo \think\Lang::get('banbenhao'); ?></b> 1.1.0<strong>&copy; 2014-2017 <a href="#"><?php echo \think\Lang::get('laitejulebu'); ?></a>.</strong>
      </p>
    </div>
  </div>
  
  <script type="text/javascript" src='__STATIC__/index/login/js/stopExecutionOnTimeout.js?t=1'></script>
  <script type="text/javascript" src="__STATIC__/index/login/js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="__STATIC__/index/login/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="__STATIC__/mine/layer/layer.js"></script>
  <script>
  function login(){
    var user = $('input[name="user"]').val();
    var user_pass = $('input[name="user_pass"]').val();
    $.ajax({
      type:"post",
      url:"<?php echo url('index'); ?>",
      data:{user:user,user_pass:user_pass},
      success:function(data){
         console.log(data.msg);
         // $('.success h2').html(data.msg)
         layer.msg(data.msg);
         if(data.code){
            setTimeout(function(){
              location.href=data.url;  
            },1000)
         }
         return false;
      }
    })
    return false;
  } 
  $('input[type="text"],input[type="password"]').focus(function () {
      $(this).prev().animate({ 'opacity': '1' }, 200);
  });
  $('input[type="text"],input[type="password"]').blur(function () {
      $(this).prev().animate({ 'opacity': '.5' }, 200);
  });
  $('input[type="text"],input[type="password"]').keyup(function () {
      if (!$(this).val() == '') {
          $(this).next().animate({
              'opacity': '1',
              'right': '30'
          }, 200);
      } else {
          $(this).next().animate({
              'opacity': '0',
              'right': '20'
          }, 200);
      }
  });
  var open = 0;
  $('.tab').click(function () {
      $(this).fadeOut(200, function () {
          $(this).parent().animate({ 'left': '0' });
      });
  });
  function ShowToText(){
    var options=$(".s-inp option:selected")
    options.css({'border':'0'})
    //获得文本值
    console.log(options.text());
    //获得value值
    console.log(options.val());
    var aa = options.val();
    if(aa){
      location.href = '?lang='+aa;
    }
  }
  </script>
</body>
</html>