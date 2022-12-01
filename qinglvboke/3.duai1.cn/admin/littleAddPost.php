<?php
session_start();
?>
<?php
$title = trim($_POST['articletitle']);
$text = trim($_POST['articletext']);
$name = trim($_POST['articlename']);
$time = gmdate("Y-m-d", time() + 8 * 3600);
$file = $_SERVER['PHP_SELF'];
include_once 'connect.php';

if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] <> '') {
    $charu = "insert into article (articletitle,articletext,articletime,articlename) values ('$title','$text','$time','$name')";
    $result = mysqli_query($connect, $charu);
    if ($result) {
        echo "<script>alert('文章发布成功');location.href = '/admin/littleSet.php';</script>";
    } else {
        echo "'<script>alert('文章发布失败');history.back();</script>";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}
