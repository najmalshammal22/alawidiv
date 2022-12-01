<?php
session_start();
?>

<?php
$user = trim($_POST['userQQ']);
$name = trim($_POST['userName']);
$Webanimation = trim($_POST['Webanimation']);
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {

    $sql = "update text set userQQ = '$user',userName = '$name',animation = '$Webanimation' ";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "<script>alert('更新成功');location.href = 'user.php';</script>";
    } else {
        echo "<script>alert('更新失败');history.back();</script>";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}

