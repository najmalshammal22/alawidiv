<?php
session_start();
@($user = $_POST['adminName']);
@($pw = $_POST['pw']);
include_once "connect.php";
$LoginUser = mysqli_real_escape_string($connect,$user);
$LoginPw = mysqli_real_escape_string($connect,$pw);
$query = $connect->query("select * from login");
$arrAdmin = $query->fetch_all()[0];

if ($arrAdmin[1] == $LoginUser){
    if ($arrAdmin[2] == md5($LoginPw)){
        // setcookie("user",$LoginPw,time()+3600,'/');
        $_SESSION['loginadmin'] = $LoginUser;
        echo "<script>alert('登录成功');location.href = '../admin/index.php';</script>";
    }else{}
    // unset($_SESSION['loginadmin']);
    die("<script>alert('登录失败，密码错误');history.back();</script>");
}else{
    // unset($_SESSION['loginadmin']);
    die("<script>alert('登录失败，用户名错误');history.back();</script>");
}
$connect->close();
