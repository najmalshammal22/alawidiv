<?php
session_start();
?>

<?php
$jiequ = trim($_POST['jiequ']);
$lanjiezf = trim($_POST['lanjiezf']);
$file = $_SERVER['PHP_SELF'];

include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $sql = "update leavSet set jiequ = '$jiequ',lanjiezf ='$lanjiezf'  ";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "<script>alert('修改成功');location.href = '/admin/leavP.php';</script>";
    } else {
        echo "<script>alert('修改失败');history.back();</script>";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
