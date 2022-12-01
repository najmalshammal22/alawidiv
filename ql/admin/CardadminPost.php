<?php
session_start();
?>

<?php
$card1 = trim($_POST['card1']);
$card2 = trim($_POST['card2']);
$card3 = trim($_POST['card3']);
$deci1 = trim($_POST['deci1']);
$deci2 = trim($_POST['deci2']);
$deci3 = trim($_POST['deci3']);
$icp = trim($_POST['icp']);
$Copyright = trim($_POST['Copyright']);
$bgimg = trim($_POST['bgimg']);
$file = $_SERVER['PHP_SELF'];

include_once 'connect.php';


if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $sql = "update text set icp = '$icp', Copyright = '$Copyright', card1 = '$card1',card2 = '$card2',card3 = '$card3',deci1 = '$deci1',deci2 = '$deci2',deci3 = '$deci3',bgimg = '$bgimg' ";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "<script>alert('更新成功');location.href = 'Set.php';</script>";
    } else {
        echo "<script>alert('更新失败');history.back();</script>";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}

