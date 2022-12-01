<?php
session_start();
?>
<?php

include_once 'connect.php';

$nub = "select count(id) as shu from leaving";
$res = mysqli_query($connect, $nub);
$leav = mysqli_fetch_array($res);
$shu = $leav['shu'];

$liuyan = "select * from leaving order by id desc";
$resliuyan = mysqli_query($connect, $liuyan);
?>

<?php
include_once 'Nav.php';
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="text-lg-right">
                            <a class="fabu" href="/admin/leavP.php">
                                <button type="button" class="btn btn-success mb-2 mr-2"><i
                                            class=" mdi mdi-brightness-5"></i> 留言相关设置
                                </button>
                            </a>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="text-lg-right">
                            <h4 class="header-title mb-3 size_18">留言管理
                                <button type="button" class="btn btn-secondary btn-sm btn-rounded margin_left">
                                    共<b><?php echo $leav['shu'] ?></b>条
                                </button>
                            </h4>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th style="width: 20px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                </div>
                            </th>
                            <th>留言内容</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>QQ</th>
                            <th>IP</th>
                            <th style="width: 125px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($info = mysqli_fetch_array($resliuyan)) {
                            ?>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><?php echo $info['text'] ?></td>
                                <td>
                                    <small class="text-muted"><?php echo date('Y-m-d H:i:s', $info['time']) ?> <div class="color"><?php echo time_tran($info['time']) ?></div></small>
                                </td>
                                <td>
                                    <h5><span class="badge badge-success-lighten"><i
                                                    class="mdi mdi-account-circle mr-1 rihjt-0"></i> <?php echo $info['name'] ?></span>
                                    </h5>
                                </td>
                                <td>
                                    <?php echo $info['QQ'] ?>
                                </td>
                                <td>
                                    <h5>
                                        <span class="badge badge-danger-lighten"><?php if ($info['ip']) { ?><?php echo $info['ip'] ?><?php } else { ?>127.0.0.1<?php } ?></span>
                                    </h5>
                                    <i><?php if (get_ip_city($info['ip'])) { ?> <?php echo get_ip_city($info['ip'])  ?> <?php } else { ?>未知<?php } ?></i>
                                </td>
                                <td>
                                    <a href="javascript:del(<?php echo $info['id']; ?>,'<?php echo $info['text']; ?>');">
                                        <button style="white-space: nowrap;" type="button"
                                                class="btn btn-danger btn-rounded">
                                            <i class=" mdi mdi-delete-empty mr-1"></i>删除
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<script>
    function del(id, text) {
        if (confirm('您确认要删除 ' + text + ' 内容吗')) {
            location.href = 'delleav.php?id=' + id + '&text' + text;
        }
    }
</script>

<?php

function get_ip_city($ip)
{
    $ch = curl_init();
    $url = 'https://whois.pconline.com.cn/ipJson.jsp?ip=' . $ip;
    //用curl发送接收数据
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //请求为https
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $location = curl_exec($ch);
    curl_close($ch);
    //转码
    $location = mb_convert_encoding($location, 'utf-8', 'GB2312');
    //var_dump($location);
    //截取{}中的字符串
    $location = substr($location, strlen('({') + strpos($location, '({'), (strlen($location) - strpos($location, '})')) * (-1));
    //将截取的字符串$location中的‘，’替换成‘&’   将字符串中的‘：‘替换成‘=’
    $location = str_replace('"', "", str_replace(":", "=", str_replace(",", "&", $location)));
    //php内置函数，将处理成类似于url参数的格式的字符串  转换成数组
    parse_str($location, $ip_location);
    return $ip_location['pro'];
}

?>
<?php
function time_tran($time) {
	$text = '';
	if(!$time) {
		return $text;
	}
	$current = time();
	$t = $current - $time;
	$retArr = array('刚刚','秒前','分钟前','小时前','天前','月前','年前');
	switch($t) {
		case $t < 0://时间大于当前时间，返回格式化时间
		$text = date('Y-m-d',$time);
		break;
		case $t == 0://刚刚
		$text = $retArr[0];
		break;
		case $t < 60:// 几秒前
		$text = $t.$retArr[1];
		break;
		case $t < 3600://几分钟前
		$text = floor($t / 60).$retArr[2];
		break;
		case $t < 86400://几小时前
		$text = floor($t / 3600).$retArr[3];
		break;
		case $t < 2592000: //几天前
		$text = floor($t / 86400).$retArr[4];
		break;
		case $t < 31536000: //几个月前
		$text = floor($t / 2592000).$retArr[5];
		break;
		default : //几年前
		$text = floor($t / 31536000).$retArr[6];
	}
	return $text;
}
?>
<?php
include_once 'Footer.php';
?>

</body>
</html>