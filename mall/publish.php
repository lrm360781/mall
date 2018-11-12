<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/21/021
 * Time: 10:28
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布商品</title>
    <link href="./css/printf.css" rel="stylesheet">
</head>
<body>
<div id="nav"></div>
    <div id="p_left">
        <div id="top">
            <span>发布商品</span>
        </div>
        <!--添加商品  输入框-->
        <div id="addp">
            <!--允许用户上传文件-->
            <form action="publish.php" method="post" enctype="multipart/form-data">
                <div class="txt" id="goods_id">
                    <span>商品名称</span>
                    <input type="text" class="inBox" id="goods_id" name="goods_id" placeholder="请输入商品名称">
                </div>
                <div class="txt">
                    <span>商品价格</span>
                    <input type="text" class="inBox" id="goods_pri" name="goods_pri" placeholder="请输入商品价格">
                </div>
                <div class="txt" >
                    <span>上市日期</span>
                    <input type="text" class="inBox" id="goods_ctime" name="goods_ctime" placeholder="请输入上市时间">
                </div>
                <div class="imges" >
                    <span>上传图片</span>
                    <!--限制上传图片的格式-->
                    <input type="file" accept="image/png,image/gif,image/jpeg" id="file" name="file">
                </div>
                <div class="txt">
                    <span>商品详情</span>
                    <input type="text" class="inFoot" id="goods_cell" name="goods_cell" placeholder="请输入详细信息">
                </div>
            </form>

        </div>
    </div>
    <div id="p_right">
        <img src="">
    </div>
</div>
</body>
</html>

