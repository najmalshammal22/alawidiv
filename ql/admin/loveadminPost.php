<?php
session_start();
?>

<?php
$adminName = trim($_POST['adminName']);
$boy = trim($_POST['boy']);
$girl = trim($_POST['girl']);
$boyimg = trim($_POST['boyimg']);
$girlimg = trim($_POST['girlimg']);
$startTime = trim($_POST['startTime']);
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {

    $sql = "update text set startTime = '$startTime', girlimg = '$girlimg' , boyimg = '$boyimg', girl = '$girl' , boy = '$boy' ";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "<script>alert('更新成功');location.href = 'Set.php';</script>";
    } else {
        echo "<script>alert('更新失败');history.back();</script>";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}