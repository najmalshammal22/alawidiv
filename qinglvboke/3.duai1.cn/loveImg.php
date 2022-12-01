<?php
//开启会话
session_start();
?>
<?php
include_once 'admin/connect.php';
$loveImg = "select * from loveImg order by id desc";
$resImg = mysqli_query($connect, $loveImg);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Style/css/loveImg.css">
    <?php
    include_once 'head.php';
    ?>
    <meta charset="utf-8"/>
    <title><?php echo $text['title'] ?> — 恋爱相册</title>
    <link rel="stylesheet" href="Style/css/about.css">
    <script src="Style/pagelir/spotlight.bundle.js"></script>
    
</head>
<body>


<h4 class="text-ce central">记录下你的最美瞬间</h4>
<div class="row central">
    <?php
        while ($list = mysqli_fetch_array($resImg)) {
    ?>
    <idv class="img_card col-lg-4 col-sm-12 col-sm-x-12 <?php  if($text['Animation'] == "1"){ ?>animated slideInUp delay-03s<?php } ?>">
        <div class="love_img">
            <img class="<?php  if($text['Animation'] == "1"){ ?>animated jackInTheBox delay-03s<?php } ?>" src="../Style/img/Loading2.gif" data-src="<?php echo $list['imgUrl'] ?>" alt="<?php echo $list['imgText'] ?>" data-description="<?php echo $list['imgDatd'] ?>" >
            <div class="words">
                <i>Date：<?php echo $list['imgDatd'] ?></i>
                <span><?php echo $list['imgText'] ?></span>
            </div>
        </div>
    </idv>
    <?php
        }
    ?>
</div>

<!-- footer版权 -->
<div class="footer-warp">
    <div class="footer">
        <p><?php echo $text['icp'] ?></p>
        <p><?php echo $text['Copyright'] ?></p>
    </div>
</div>

<style>

</style>
<script>
    $(function () {
        $("img[src$=jpg],img[src$=gif],img[src$=JPG],img[src$=png],img[src$=jpeg]").addClass("spotlight").each(function () {
            this.onclick = function () {
                return hs.expand(this)
            }
        });
        
    })
    
let num=document.getElementsByTagName('img').length;
let img=document.getElementsByTagName('img')
let n=0
lozyLoad()
window.onscroll = lozyLoad
function lozyLoad(){
  let seeHeight=document.documentElement.clientHeight
  let scrollHeight=document.documentElement.scrollTop||document.body.scrollTop
  for(let i=n;i<num;i++){
    if(img[i].offsetTop<seeHeight+scrollHeight){
      if(img[i].getAttribute('src')=='../Style/img/Loading2.gif'){
        img[i].src=img[i].getAttribute('data-src')
      }
      n=i+1
    }
  }
          if (scrollHeight > 500) {
            $('.wenan').css({
                'color': '#333'
            });
            $('.alogo').css({
                'color': '#333'
            });
        }

        if (scrollHeight < 500) {
            $('.wenan').css({
                'color': '#fff'
            });
            $('.alogo').css({
                'color': '#fff'
            });
        }

}

</script>
</body>
</html>
