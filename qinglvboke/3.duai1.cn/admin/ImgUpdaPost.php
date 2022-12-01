<?php
session_start();
?>

<?php
$id = trim($_POST['id']);
$imgText = trim($_POST['imgText']);
$imgDatd = trim($_POST['imgDatd']);
$imgUrl = trim($_POST['imgUrl']);
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $sql = "update loveImg set imgText = '$imgText', imgDatd = '$imgDatd',imgUrl ='$imgUrl' where id = '$id'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "<script>alert('修改成功');location.href = '/admin/loveImgSet.php';</script>";
    } else {
        echo "<script>alert('修改失败');history.back();</script>";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}

