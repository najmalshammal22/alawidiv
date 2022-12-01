<?php
//开启会话
session_start();
?>
<?php
include_once 'admin/connect.php';


$nub = "select count(id) as shu from leaving";
$res = mysqli_query($connect, $nub);
$leav = mysqli_fetch_array($res);
$shu = $leav['shu'];

$leavSet = "select * from leavSet order by id desc";
$Set = mysqli_query($connect, $leavSet);
$Setinfo = mysqli_fetch_array($Set);

$jiequ = $Setinfo['jiequ'];
$liuyan = "select * from leaving order by id desc limit $jiequ";
$resliuyan = mysqli_query($connect, $liuyan);
$ip = $_SERVER['REMOTE_ADDR'];

?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include_once 'head.php';
    ?>

    <meta charset="utf-8"/>
    <title><?php echo $text['title'] ?> — <?php echo $text['card2'] ?></title>
    <link rel="stylesheet" href="Style/css/leaving.css">
    <script src="Style/Font/font_leav/iconfont.js"></script>
</head>
<body>


<div class="central central-800 bg">
    <h3>已收到 <b><?php echo $leav['shu'] ?></b> 条祝福留言<i class="jiequ">（显示最新 <?php echo $jiequ ?>条）</i></h3>

    <div class="row">
        <div class="card col-lg-12 col-md-12 col-sm-12 col-sm-x-12">
            <?php
            while ($info = mysqli_fetch_array($resliuyan)) {
                ?>
                <div class="leavform <?php  if($text['Animation'] == "1"){ ?>animated jackInTheBox delay-03s<?php } ?>">
                    <img src="https://q1.qlogo.cn/g?b=qq&nk=<?php echo $info['QQ'] ?>&s=640" alt="">
                    <div class="textinfo">
                        <span class="name"><?php echo $info['name'] ?></span>
                        <b></b>
                        <span class="name ipclass"><?php if (get_ip_city($info['ip'])) { ?> <?php echo get_ip_city($info['ip'])  ?> <?php } else { ?>未知<?php } ?>
                        </span>
                        <i class="time"><?php echo time_tran($info['time']) ?></i>
                        <div class="text"><?php echo $info['text'] ?></div>
                    </div>
                </div>
                <?php
            }
            ?>
            <form action="admin/leavingPost.php" method="post" onsubmit="return check()">
                <div class="inputbox">
                    <svg class="icon sm22" aria-hidden="true">
                        <use xlink:href="#icon-QQ1"></use>
                    </svg>
                    <input id="QQ" type="text" name="qq" placeholder="QQ号码" class="rig">
                    <svg class="icon sm22" aria-hidden="true">
                        <use xlink:href="#icon-xunzhang"></use>
                    </svg>
                    <input id="nickname" type="text" name="name" placeholder="昵称（自动获取）" class="let">
                </div>
                <svg class="icon sm22 bu2" aria-hidden="true">
                    <use xlink:href="#icon-shoucang"></use>
                </svg>
                <textarea name="text" id="wenben" rows="8" placeholder="请输入您的留言内容（恶意留言会封禁IP...）"></textarea>
                <div class="input-sub">
                    <input name="ip" value="<?php echo $ip ?>" type="hidden">
                    <button type="submit" class="tijiao">提交留言 </button>
                </div>
            </form>
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
    $('#QQ').blur(function () {
        var QQ = $("#QQ").val();
        $.ajax({
            url: "https://api.usuuu.com/qq/" + QQ,
            type: "GET",
            dataType: "json",
            success: function (result) {
                // console.log(result["data"].name,result["data"].avatar);
                $("#nickname").val(result["data"].name);
                // $("[name='avatar']").val(result["data"].avatar);
            }
        });
    });

</script>

<script>
    function check() {
        //获取name数组中的第0个索引 并且去掉空格
        let qq = document.getElementsByName('qq')[0].value.trim();
        let name = document.getElementsByName('name')[0].value.trim();
        // 判断adminName长度是否为0 如果为0则提示弹窗
        if (qq.length == 0) {
            alert("请填写QQ号码");
            return false;
        } else if (name.length == 0) {
            alert("请填写恁的昵称");
            return false;
        }
        // 判断QQ号码
        let qqlength = /^[0-9]{6,10}$/;
        if (!qqlength.test(qq)) {
            alert("您的QQ号码格式错误 \n 请输入由6-10位的数字组成的QQ号码");
            return false;
        }
        if ((qq == 123456) || (qq == 100000) || (qq == 1234567)) {
            alert("我想也许这并不是您的QQ号码...");
            return false;
        }
        let text = document.getElementsByName('text')[0].value.trim();
        if (text.length == 0) {
            alert("请填写您要留言的内容");
            return false;
        } else if (text.length <= 2) {
            alert("请填写两个字符以上的内容");
            return false;
        }

        let nonub = /^[0-9]+$/;
        let filter = new RegExp("[<?php echo $Setinfo['lanjie']?>]");
        let weifan = new RegExp("[<?php echo $Setinfo['lanjiezf']?>]");
        if (filter.test(text)) {
            alert("您输入的内容含有非法字符")
            return false;
        } else if (nonub.test(text)) {
            alert("内容为纯数字 已被拦截")
            return false;
        } else if (weifan.test(text)) {
            alert("您输入的内容是违禁词 请注意您的发言\n不文明的留言会被管理员拉进小黑屋喔")
            return false;
        }
        let nickname = document.getElementById("nickname").value.trim();
        let nameweijin = new RegExp("[<?php echo $Setinfo['lanjie']?>]");
        if (nameweijin.test(nickname)) {
            alert("您的昵称包含特殊字符 防止xss注入 本次提交已拦截")
            return false;
        }

    }

</script>
<?php

function get_ip_city($ip)
{
    $ch = curl_init();
    $url = 'https://whois.pconline.com.cn/ipJson.jsp?ip=' . $ip;
    //用curl发送接收数据
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //请求为https
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $location = curl_exec($ch);
    curl_close($ch);
    //转码
    $location = mb_convert_encoding($location, 'utf-8', 'GB2312');
    //var_dump($location);
    //截取{}中的字符串
    $location = substr($location, strlen('({') + strpos($location, '({'), (strlen($location) - strpos($location, '})')) * (-1));
    //将截取的字符串$location中的‘，’替换成‘&’   将字符串中的‘：‘替换成‘=’
    $location = str_replace('"', "", str_replace(":", "=", str_replace(",", "&", $location)));
    //php内置函数，将处理成类似于url参数的格式的字符串  转换成数组
    parse_str($location, $ip_location);
    return $ip_location['pro'];
}

function time_tran($time) {
	$text = '';
	if(!$time) {
		return $text;
	}
	$current = time();
	$t = $current - $time;
	$retArr = array('刚刚','秒前','分钟前','小时前','天前','月前','年前');
	switch($t) {
		case $t < 0://时间大于当前时间，返回格式化时间
		$text = date('Y-m-d',$time);
		break;
		case $t == 0://刚刚
		$text = $retArr[0];
		break;
		case $t < 60:// 几秒前
		$text = $t.$retArr[1];
		break;
		case $t < 3600://几分钟前
		$text = floor($t / 60).$retArr[2];
		break;
		case $t < 86400://几小时前
		$text = floor($t / 3600).$retArr[3];
		break;
		case $t < 2592000: //几天前
		$text = floor($t / 86400).$retArr[4];
		break;
		case $t < 31536000: //几个月前
		$text = floor($t / 2592000).$retArr[5];
		break;
		default : //几年前
		$text = floor($t / 31536000).$retArr[6];
	}
	return $text;
}
?>

</body>
</html>
