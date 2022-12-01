<?php
session_start();
?>

<?php
$name = trim($_POST['eventname']);
$icon = $_POST['icon'];
$id = $_POST['id'];
$img = $_POST['imgurl'];
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';
if (!empty($img)) {
    $img = $_POST['imgurl'];
} else {
    $img = 0;
}
if (!$icon) {
    $icon = 0;
} else {
    $icon = $_POST['icon'];
}
if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $sql = "update lovelist set eventname = '$name',icon ='$icon',imgurl ='$img' where id ='$id' ";
    $reslove = mysqli_query($connect, $sql);
    if ($reslove) {
        echo "<script>alert('修改成功--$name');location.href = '/admin/lovelist.php';</script>";
    } else {
        echo "<script>alert('修改失败');history.back();</script>";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
