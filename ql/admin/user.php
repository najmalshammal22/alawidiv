<?php
session_start();
?>

<?php
include_once 'Nav.php';
?>
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">信息配置</h4>

                <form class="needs-validation" action="userPost.php" method="post" novalidate>
                    <div class="form-group">
                        <label for="validationCustom01">是否开启前端加载动画</label>
                        <select class="form-control" id="example-select" name="Webanimation">
                            <option value="1" <?php  if($text['Animation'] == "1"){ ?> selected <?php } ?>>开启</option>
                            <option value="2" <?php  if($text['Animation'] == "2"){ ?> selected <?php } ?> >关闭</option>
                        </select>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">管理员Name</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="请输入管理员Name"
                               name="userName" value="<?php echo $text['userName'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">管理员QQ</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="请输入管理员QQ"
                               name="userQQ" value="<?php echo $text['userQQ'] ?>" required>
                    </div>
                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary" type="submit">提交修改</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->


</div>

<script>

    // $.ajax({
    //     url : "https://www.kikiw.cn/zhanli/getHeroConfig.json",
    //     type: "GET",
    //     dataType: "json",
    //     success : function(result) {
    //         // console.log(result["data"].name,result["data"].avatar);
    //         $("#title").html(result["data"]["news"].text);
    //         // $("[name='avatar']").val(result["data"].avatar);
    //     }
    // });

</script>

<?php
include_once 'Footer.php';
?>

</body>
</html>