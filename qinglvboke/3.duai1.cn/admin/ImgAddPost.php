<?php
session_start();
?>

<?php
$imgText = trim($_POST['imgText']);
$imgDatd = trim($_POST['imgDatd']);
$imgUrl = trim($_POST['imgUrl']);
$file = $_SERVER['PHP_SELF'];


include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $charu = "insert into loveImg (imgDatd,imgText,imgUrl) values ('$imgDatd','$imgText','$imgUrl')";
    $result = mysqli_query($connect, $charu);
    if ($result) {
        echo "<script>alert('相册新增成功$imgText');location.href = '/admin/loveImgSet.php';</script>";
    } else {
        echo "'<script>alert('相册新增失败$imgText');history.back();</script>";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
