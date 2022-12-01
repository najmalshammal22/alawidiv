<?php
session_start();
?>

<?php
include_once 'Nav.php';
?>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">基本设置</h4>

                <form class="needs-validation" action="adminPost.php" method="post" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">站点标题</label>
                        <input type="text" class="form-control"  placeholder="请输入站点标题"
                               name="title" value="<?php echo $text['title'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom02">站点LOGO</label>
                        <input type="text" class="form-control" placeholder="请填写站点LOGO文字"
                               name="logo" value="<?php echo $text['logo'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom03">站点文案</label>
                        <input type="text" class="form-control"  placeholder="显示在顶部的文案"
                               name="writing" value="<?php echo $text['writing'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom04">管理员账号</label>
                        <input type="text" class="form-control"  placeholder="请输入需修改的管理员账号"
                               name="adminName" value="<?php echo $login['user'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">管理员密码</label>
                        <input type="password" class="form-control"  name="pw" type="password"
                               value="" placeholder="不修改请留空">
                    </div>
                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary" type="submit">提交修改</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">情侣配置</h4>

                <form class="needs-validation" action="loveadminPost.php" method="post" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">男主Nanme</label>
                        <input type="text" class="form-control"  placeholder="请输入男主Name"
                               name="boy" value="<?php echo $text['boy'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom02">女主Name</label>
                        <input type="text" class="form-control" placeholder="请输入女主Name"
                               name="girl" value="<?php echo $text['girl'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom03">男主QQ</label>
                        <input type="text" class="form-control"  placeholder="请输入男主QQ（用于显示头像）"
                               name="boyimg" value="<?php echo $text['boyimg'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom04">女主QQ</label>
                        <input type="text" class="form-control"  placeholder="请输入女主QQ（用于显示头像）"
                               name="girlimg" value="<?php echo $text['girlimg'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">起始时间</label>
                        <input type="datetime-local" class="form-control"  placeholder="请输入起始时间"
                               name="startTime" value="<?php echo $text['startTime'] ?>" required>
                    </div>
                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary" type="submit">提交修改</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">卡片配置&版权配置</h4>

                <form class="needs-validation" action="CardadminPost.php" method="post" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">背景图片URL地址</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片Name"
                               name="bgimg" value="<?php echo $text['bgimg'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">卡片1Name</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片Name"
                               name="card1" value="<?php echo $text['card1'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom02">卡片1描述</label>
                        <input type="text" class="form-control" placeholder="请输入卡片描述"
                               name="deci1" value="<?php echo $text['deci1'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom03">卡片2Name</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片Name"
                               name="card2" value="<?php echo $text['card2'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom04">卡片2描述</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片描述"
                               name="deci2" value="<?php echo $text['deci2'] ?>" required>

                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">卡片3Name</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片Name"
                               name="card3" value="<?php echo $text['card3'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">卡片3描述</label>
                        <input type="text" class="form-control"  placeholder="请输入卡片描述"
                               name="deci3" value="<?php echo $text['deci3'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">域名备案号</label>
                        <input type="text" class="form-control"  placeholder="没有请留空" name="icp"
                               value="<?php echo $text['icp'] ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom05">站点版权信息</label>
                        <input type="text" class="form-control"  placeholder="请输入站点版权信息"
                               name="Copyright" value="<?php echo $text['Copyright'] ?>" required>
                    </div>
                    <div class="form-group mb-3 text_right">
                        <button class="btn btn-primary" type="submit">提交修改</button>
                    </div>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

<?php
include_once 'Footer.php';
?>

</body>
</html>