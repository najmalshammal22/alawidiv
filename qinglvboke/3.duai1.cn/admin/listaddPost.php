<?php
session_start();
?>

<?php
$name = trim($_POST['eventname']);
$file = $_SERVER['PHP_SELF'];
if ($_POST['img'] === 0) {
    $img = 0;
} else {
    $img = $_POST['img'];
}
if ($_POST['icon'] == 1) {
    $icon = 1;
} else {
    $icon = 0;
}

include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $charu = "insert into lovelist (eventname,icon,imgurl) values ('$name','$icon','$img')";
    $result = mysqli_query($connect, $charu);
    if ($result) {
        echo "<script>alert('事件新增成功$name');location.href = '/admin/lovelist.php';</script>";
    } else {
        echo "'<script>alert('事件新增失败$name');history.back();</script>";
//    echo "$qq,$name,$text,$time";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
