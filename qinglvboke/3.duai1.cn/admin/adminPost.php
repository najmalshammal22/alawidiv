<?php
session_start();
?>

<?php
$boy = trim($_POST['boy']);
$girl = trim($_POST['girl']);
$adminName = trim($_POST['adminName']);
$pw = trim($_POST['pw']);
$title = trim($_POST['title']);
$logo = trim($_POST['logo']);
$writing = trim($_POST['writing']);
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $sql = "update text set title = '$title', logo = '$logo' , writing = '$writing' where id = '1'";

    if ($pw) {
        $loginsql = "update login set user = '$adminName' ,pw ='" . md5($pw) . "' where id = '1'";
        session_destroy();
    } else {
        $loginsql = "update login set user = '$adminName'  where id = '1'";
    }

    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "<script>alert('更新成功');location.href = 'Set.php';</script>";
    } else {
        echo "<script>alert('更新失败');history.back();</script>";
    }

    $loginresult = mysqli_query($connect, $loginsql);
    if ($loginresult) {
        echo "<script>alert('更新登录信息成功');location.href = 'Set.php';</script>";
    } else {
        echo "<script>alert('更新登录信息失败');history.back();</script>";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
