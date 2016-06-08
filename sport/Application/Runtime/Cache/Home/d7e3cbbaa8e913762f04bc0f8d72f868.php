<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" conatent="width=device-width, initial-scale=1" />
    <title>排行</title>
    <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
    <script src="http://cdn.gbtags.com/datatables/1.10.5/js/jquery.js"></script>
   
    <style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }
    
    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }
    
    .form-signin .checkbox {
        font-weight: normal;
    }
    
    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }
    
    .form-signin .form-control:focus {
        z-index: 2;
    }
    
    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none !important;
        margin: 0;
    }
    
    input[type="number"] {
        -moz-appearance: textfield;
    }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/sport/index.php/Home">主页</a>
                        </li>
                        <li>
                            <a href="/sport/index.php/Home/Rank/rank">排行</a>
                        </li>
                        <li>
                            <a href="/sport/index.php/Home/Activity/activity">活动</a>
                        </li>
                    </ul>
                    <div class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" placeholder="Search" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    <ul class="nav navbar-nav navbar-right" ">
                        <li href="# " class="active ">
                            <a href="/sport/index.php/Home/Login/login ">登陆</a>
                        </li>
                        <li href="# ">
                            <a href="/sport/index.php/Home/Register/register ">注册</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container ">
        <form action="/sport/index.php/Home/Activity/join " class="form-signin " onsubmit="return validate() " method="post">
            <h2 class="form-signin-heading text-center ">
                报名
            </h2>
                <?php if(is_array($arr )): $i = 0; $__LIST__ = $arr ;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo ): $mod = ($i % 2 );++$i;?><div class="form-control ">
                        <label>
                            <input type="checkbox" name="project[]" value=<?php echo ($vo["name"]); ?> /><?php echo ($vo["name"]); ?>
                        </label>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

            <button class="btn btn-lg btn-primary btn-block " type="submit ">提交</button>
        </form>
    </div>
</html>
<script>
    $(function (argument) {
         $.ajax({
            url: '/sport/index.php/Home/Index/checkSession',
            type: 'post',
            success: function(data) {
                if (data != 'please login') {
                    $('.navbar-right li a').eq(0).text(data).attr('href', 'https://www.baidu.com');
                    $('.navbar-right li a').eq(1).text('注销').attr('href', '/sport/index.php/Home/Activity/logout');
                }
            }
        }); 
    })();
</script>