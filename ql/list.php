<?php
//开启会话
session_start();
?>
<?php
include_once 'admin/connect.php';
$time = gmdate("Y-m-d", time() + 8 * 3600);


$lovelist = "select * from lovelist order by id desc";
$reslist = mysqli_query($connect, $lovelist);
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include_once 'head.php';
    ?>
    <meta charset="utf-8"/>
    <title><?php echo $text['title'] ?> — 恋爱事件</title>
    <link rel="stylesheet" href="Style/css/little.css">
    <link rel="stylesheet" href="Style/css/list.css">
    <link rel="stylesheet" href="Style/Font/font_list/iconfont.css">
    <script src="Style/Font/font_leav/iconfont.js"></script>
    <script src="Style/Font/font_list/iconfont.js"></script>
</head>
<body>

<div class="central">
    <div class="title">
        <h1>总有些惊奇的际遇 比方说当我遇见你</h1>
    </div>
    <div class="row central central-6">

        <div class="card col-lg-12 col-md-12 col-sm-12 col-sm-x-12">
            <div class="text" id="viewer">
                <div class="lovelist">
                    <?php
                    while ($list = mysqli_fetch_array($reslist)) {
                        ?>
                        <div class="open">
                            <?php if ($list['icon']) { ?><i class="iconfont icon-chenggong2 com"></i> <?php } ?>
                            <?php if (!$list['icon']) { ?><i class="iconfont icon-chenggong2 air"></i> <?php } ?>
                            <span><?php echo $list['eventname']; ?></span>
                            <?php if($list['imgurl']){ ?><svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-tupian"></use></svg><?php }?>
                            
                            <?php if ($list['imgurl']) { ?><img data-original="<?php echo $list['imgurl']; ?>"class="hied spotlight" src="<?php echo $list['imgurl']; ?>" alt=""> <?php } ?>
                            <?php if (!$list['imgurl']) { ?><?php } ?>
                        </div>
                        <?php
                    }
                    ?>
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

<script>
    let oul = document.getElementsByClassName("open");
    for (let j = 0; j < oul.length; j++) {
        oul[j].addEventListener("click", function () {
            let son = Array.from(this.childNodes).filter(item => item.nodeName.toLowerCase() == 'img')
            // 第一种方式
            son.forEach(item => {
                if (item.style.display === 'none') {
                    item.style.display = 'block';
                }
                // 这种方式改变style的值是直接上标签的css
                else if (item.style.display === '') {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        })
    }
    // $('#viewer').viewer({
    //     url: 'data-original',
    //     title: false
    // });

</script>

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
<style>
.icon {
    width: 1.5em;
    height: 1.5em;
    vertical-align: -0.3em;
    fill: currentColor;
    overflow: hidden;
}
</style>
</body>
</html>
