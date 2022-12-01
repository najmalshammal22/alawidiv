<?php include("ipjc.php"); ?>
<?php
//开启会话
session_start();
?>
<?php
include_once 'admin/connect.php';

$sql = "select * from text ";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result)) {
    $text = mysqli_fetch_array($result);
} else {
    header("Location:admin/login.php");
    die("暂无权限");
}

?>

<script src="ip.php"></script>


<!--
 * @Author: Ki.
 * @Date: 2022-11-15 07:35:43
 * @LastEditors: Ki.
 * @LastEditTime: 2022-11-15 07:51:06
 * @Description: 花有重开日 人无再少年
 * Copyright (c) 2022 by Ki All Rights Reserved. 
-->

<!-- Like Girl v4.0.0 -->
<!-- Copyright (c) 2022 Ki. -->
<!-- Date：2022-09-10 -->
<!-- Document：https://blog.kikiw.cn/index.php/archives/46/ -->
<!-- Warning：禁止以任何方式出售本项目 如有发现一切后果自行负责 -->
<!-- 开发不易 版权信息请保留 -->

<script>
    console.log("%c Like Girl v4.0.0 | Powered by Ki", "color:#fff;background:linear-gradient(270deg,#986fee,#8695e6,#68b7dd,#18d7d3);padding:8px 15px;border-radius:15px");
    console.log("%c Q | 3439780232", "color:#fff;background:#000;padding:8px 15px;border-radius:15px");
</script>
<link rel="shortcut icon" href="/favicon.ico"/>
<!-- 定义视窗 -->
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<!-- 引入思源宋体 -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../Style/css/index.css">
<link rel="stylesheet" href="../Style/css/animate.min.css">
<link href="/Style/css/loading.css" rel="stylesheet">


<div id="Loadanimation" style="z-index:999999;">
    <div id="Loadanimation-center">
        <div id="Loadanimation-center-absolute">
            <div class="xccx_object" id="xccx_four"></div>
            <div class="xccx_object" id="xccx_three"></div>
            <div class="xccx_object" id="xccx_two"></div>
            <div class="xccx_object" id="xccx_one"></div>
        </div>
    </div>
</div>
<script src="../Style/jquery/jquery.min.js"></script>
<script>
    $(function () {
        $("#Loadanimation").fadeOut(1000);
    });
</script>

<!-- 头部导航条 -->
<div class="header-wrap">
    <div class="header">
        <div class="logo">
            <h1><a class="alogo" href="index.php"><?php echo $text['logo'] ?></a></h1>
        </div>
        <div class="word">
            <span class="wenan"><?php echo $text['writing'] ?></span>
        </div>
    </div>
</div>
<!-- 头像内容 -->
<div class="bg-wrap">
    <div class="bg-img">
        <div class="central central-800">
            <div class="middle <?php  if($text['Animation'] == "1"){ ?>animated bounce<?php } ?>">
                <div class="img-male">
                    <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $text['boyimg'] ?>&s=640" alt="">
                    <span><?php echo $text['boy'] ?></span>
                </div>
                <div class="love-icon">
                    <img src="Style/img/like.svg" alt="">
                </div>
                <div class="img-female">
                    <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $text['girlimg'] ?>&s=640" alt="">
                    <span><?php echo $text['girl'] ?></span>
                </div>
            </div>
        </div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave"
                      d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7"/>
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)"/>
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)"/>
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff"/>
            </g>
        </svg>
    </div>
</div>

<script>
    window.onscroll = function () {
        var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        if (scrollTop > 500) {
            $('.wenan').css({
                'color': '#707070'
            });
            $('.alogo').css({
                'color': '#707070'
            });
        }

        if (scrollTop < 500) {
            $('.wenan').css({
                'color': '#fff'
            });
            $('.alogo').css({
                'color': '#fff'
            });
        }
    }


</script>

<style>
    .central.bg .row .card .leavform .textinfo .time {
        text-align: right;
        display: inherit;
        font-family: 'Noto Serif SC', serif;
        font-weight: 400;
        color: #423a3a;
    }
    .bg-img {
        background: url(<?php echo $text['bgimg']?>) no-repeat center !important;
        background-size: cover !important;
    }

    .wenan {
        color: #fff;
        transition: all 0.2s linear;
    }

    .alogo {
        color: #fff;
        transition: all 0.2s linear;
    }
    code{
        padding: 0.4rem 0.5rem;
        border-radius: 0.4rem;
        font-size: 1rem;
        color: #fa5c7c;
        background-color: rgba(250,92,124,.18);
        font-family: 'Noto Serif SC', serif;
        font-weight: 700;
    }
    quote{
        width: 98%!important;
    }
    /* webkit, opera, IE9 （谷歌浏览器）*/
    ::selection {
        background: #6f6f6fc7;
        color: #ffffff;
    }
    /* mozilla firefox（火狐浏览器） */
    ::-moz-selection {
        background: #6f6f6fc7;
        color: #ffffff;
    }
    .delay-03s {
        -webkit-animation-delay: .3s;
        animation-delay: .3s;
    }
</style>