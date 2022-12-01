<?php
//开启会话
session_start();
?>
<?php
include_once 'admin/connect.php';
$time = gmdate("Y-m-d", time() + 8 * 3600);


$id = $_GET['id'];
if (is_numeric($id) == $id ) {
    $article = "SELECT * FROM article WHERE id='$id' limit 1";
    $resarticle = mysqli_query($connect, $article);
    $info = mysqli_fetch_array($resarticle);
}else {
    echo("<script>alert('参数错误或页面不存在~');history.back();</script>");
}

?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include_once 'head.php';
    ?>
    <meta charset="utf-8"/>
    <title><?php echo $text['title'] ?> — <?php echo $text['card1'] ?></title>
    <link rel="stylesheet" href="Style/css/little.css">
    <script src="Style/Font/font_leav/iconfont.js"></script>
</head>
<body>

<div class="central">
    <div class="title">
        <!--        <h1>有人愿意听你碎碎念念也很浪漫</h1>-->
    </div>
    <div class="row central central-800">
        <div class="card col-lg-12 col-md-12 col-sm-12 col-sm-x-12">
            <div class="text">
                <div class="top-title f2"><?php echo $info['articletitle'] ?>
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-zhankai"></use>
                    </svg>
                </div>
                <div class="info">
                    <span>
                        <svg class="icon" aria-hidden="true">
                          <use xlink:href="#icon-shoucang"></use>
                        </svg>
                        <?php echo $info['articlename'] ?> <i>记录于</i> <?php echo $info['articletime'] ?></span>
                </div>
                <div class="line-top"></div>
                <div id="md-view" class="file">
                    <?php echo($info['articletext']) ?>

                </div>

                <div class="line">
                    <p>End of content Thank you for watching.</p>
                </div>


            </div>
        </div>
    </div>


</div>
</div>


<!-- footer版权 -->
<div class="footer-warp">
    <div class="footer">
        <p><?php echo $text['icp'] ?></p>
        <p><?php echo $text['Copyright'] ?></p>
    </div>
</div>


<script src="Style/pagelir/spotlight.bundle.js"></script>
<script>
    $(function () {
        $("img[src$=jpg],img[src$=gif],img[src$=JPG],img[src$=png],img[src$=jpeg]").addClass("spotlight").each(function () {
            this.onclick = function () {
                return hs.expand(this)
            }
        });
    })
</script>

</body>
</html>
