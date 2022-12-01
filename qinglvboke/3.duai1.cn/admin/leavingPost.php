<?php
session_start();
?>

<?php
$name = trim($_POST['name']);
$qq = trim($_POST['qq']);
$text = trim($_POST['text']);
// $time = gmdate("Y-m-d H:i:s", time() + 8 * 3600);
$time = time();
$ip = trim($_POST['ip']);
$Filter_Name = replaceSpecialChar($name);
$Filter_QQ = replaceSpecialChar($qq);
$Filter_Text = replaceSpecialChar($text);
// $Filter_Time = addslashes($time);
$Filter_Time = replaceSpecialChar($time);
$Filter_IP = replaceSpecialChar($ip);
$file = $_SERVER['PHP_SELF'];
function replaceSpecialChar($Symbol){
    $Filter = "/\ |\/|\~|\!|\@|\-|\=|\#|\\$|\%|\^|\&|\:|\*|\"|\(|\)|\_|\+|\{|\}|\<|\>|\?|\[|\]|\,|\/|\;|\'|\`|\=|\\\|\||/"; 
    return preg_replace($Filter ,"",$Symbol);
}


include_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (is_numeric($qq) && (!empty($Filter_Name)) && (!empty($Filter_Text)) ) {
        $charu = "insert into leaving (name,QQ,text,time,ip) values ('$Filter_Name','$Filter_QQ','$Filter_Text','$Filter_Time','$Filter_IP')";
        $result = mysqli_query($connect, $charu);
    }else {
        echo "'<script>alert('留言失败——参数错误');history.back();</script>";
    }
    
    if ($result) {
        echo "<script>alert('留言提交成功');location.href = '/leaving.php';</script>";
    } else {
        echo "'<script>alert('留言失败');history.back();</script>";
    }
} else {
    echo "<script>alert('非法操作，行为已记录');location.href = 'warning.php?route=$file';</script>";
}

