<?php
//开启会话
session_start();
?>
<?php
include_once 'admin/connect.php';
$time = gmdate("Y-m-d", time() + 8 * 3600);

$article = "select * from article order by id desc";
$resarticle = mysqli_query($connect, $article);
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
        <h1>有人愿意听你碎碎念念也很浪漫</h1>
    </div>
    <div class="row central central-800">
        <?php
        while ($info = mysqli_fetch_array($resarticle)) {
            ?>
            <div class="card col-lg-12 col-md-12 col-sm-12 col-sm-x-12 <?php  if($text['Animation'] == "1"){ ?>animated bounceInDown<?php } ?>">
                <div class="text">
                    <a href="page.php?id=<?php echo $info['id'] ?>">
                        <div class="top-title"><?php echo $info['articletitle'] ?>
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-zhankai"></use>
                            </svg>
                        </div>
                    </a>
                    <div class="info">
                    <span>
                        <svg class="icon" aria-hidden="true">
                          <use xlink:href="#icon-shoucang"></use>
                        </svg>
                        <?php echo $info['articlename'] ?> <i>记录于</i> <?php echo $info['articletime'] ?></span>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
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

</body>
</html>
