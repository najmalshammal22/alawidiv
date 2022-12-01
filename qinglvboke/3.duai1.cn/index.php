<!DOCTYPE html>
<html>
<head>
    <?php
    include_once 'head.php';
    ?>
    <meta charset="utf-8"/>
    <title><?php echo $text['title'] ?></title>
    <!-- 定义视窗 -->
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <!-- 引入思源宋体 -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Style/css/index.css">
</head>
<body>

<!-- 时间区域 -->
<div class="time">
    <span id="span_dt_dt"></span>
    <b id="tian"></b>天
    <b id="shi"></b>时
    <b id="fen"></b>分
    <b id="miao"></b>秒
</div>
<!-- 卡片区域 -->
<div class="card-wrap">
    <div class="row central <?php  if($text['Animation'] == "1"){ ?> animated slideInUp delay-03s<?php } ?>">
        <div class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h" onclick="little();">
            <img src="Style/img/diandian.png" alt="">
            <div class="text">
                <span><?php echo $text['card1'] ?></span>
                <p><?php echo $text['deci1'] ?></p>
            </div>
        </div>
        <div class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h" onclick="leaving()">
            <img src="Style/img/liuyan.png" alt="">
            <div class="text">
                <span><?php echo $text['card2'] ?></span>
                <p><?php echo $text['deci2'] ?></p>
            </div>
        </div>
        <div class="card col-lg-4 col-sm-12 col-sm-x-12 flex-h" onclick="about()">
            <img src="Style/img/about.png" alt="">
            <div class="text">
                <span><?php echo $text['card3'] ?></span>
                <p><?php echo $text['deci3'] ?></p>
            </div>
        </div>
        <div class="card-b col-lg-6 col-12 col-sm-12 flex-h" onclick="loveimg()">
            <img src="Style/img/loveimg.png" alt="">
            <div class="text">
                <span>Love Photo</span>
                <p>恋爱相册 记录最美瞬间</p>
            </div>
        </div>
        <div class="card-b col-lg-6 col-12 col-sm-12 flex-h" onclick="list()">
            <img src="Style/img/xinf.png" alt="">
            <div class="text">
                <span>Love List</span>
                <p>恋爱列表 你我之间的约定</p>
            </div>
        </div>
    </div>
</div>


<!-- footer版权 -->
<div class="footer-warp">
    <div class="footer">
        <p><?php echo $text['icp'] ?></p>
        <p><?php echo $text['Copyright'] ?></p>
    </div>
</div>

<script>
    function about() {
        location.href = 'about.php';
    }

    function leaving() {
        location.href = 'leaving.php';
    }

    function little() {
        location.href = 'little.php';
    }

    function list() {
        location.href = 'list.php';
    }

    function loveimg() {
        location.href = 'loveImg.php';
    }
</script>


<script>
    function show_date_time() {
        window.setTimeout("show_date_time()", 1000);
        BirthDay = new Date("<?php echo $text['startTime']?>");
        today = new Date();
        timeold = (today.getTime() - BirthDay.getTime());
        sectimeold = timeold / 1000;
        secondsold = Math.floor(sectimeold);
        msPerDay = 24 * 60 * 60 * 1000;
        e_daysold = timeold / msPerDay;
        daysold = Math.floor(e_daysold);
        e_hrsold = (e_daysold - daysold) * 24;
        hrsold = Math.floor(e_hrsold);
        e_minsold = (e_hrsold - hrsold) * 60;
        minsold = Math.floor((e_hrsold - hrsold) * 60);
        seconds = Math.floor((e_minsold - minsold) * 60);
        span_dt_dt.innerHTML = "这是我们一起走过的";
        tian.innerHTML = daysold;
        shi.innerHTML = hrsold;
        fen.innerHTML = minsold;
        miao.innerHTML = seconds;
    }

    show_date_time();
</script>
</body>
</html>
