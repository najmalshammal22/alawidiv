<?php
//请按顺序填写您的数据库信息
//localhost 为数据库地址 一般用默认的即可
//3.duai1.cn 第一个为数据库用户名
//3.duai1.cn 第二个为数据库密码
//love 数据库名（宝塔默认生成的数据库用户名）
$connect = mysqli_connect('localhost','3.duai1.cn','3.duai1.cn','3.duai1.cn');

if (!$connect) {
    die("<script>location.href = '../admin/connectDie.php';</script>");
}
mysqli_query($connect, "ste names 'utf8'");