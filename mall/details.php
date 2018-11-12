<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26/026
 * Time: 14:35
 */
    include_once "./lib/func.php";

    $sv = 0;

    $goodsId = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : '';

    //如果id不存在 跳转到商品列表
    if(!$goodsId)
    {
        header('location:index.php');
    }

    if($login = checkLogin())
    {
        $user = $_SESSION['user'];
    }

    $con = userlink();

    $sql1 = "SELECT goods.g_id,`name`,price,des,picture_url1 FROM goods,picture WHERE goods.g_id=picture.g_id AND goods.g_id='{$goodsId}' LIMIT 1";
    $obj = mysqli_query($con,$sql1);
    $result1 = mysqli_fetch_assoc($obj);

    $sql2 = "SELECT * FROM field WHERE goods_type_id=(SELECT goods_type_id FROM goods WHERE g_id='{$goodsId}')";
    $obj = mysqli_query($con,$sql2);
    $result2 = mysqli_fetch_assoc($obj);
    $sql3 = "SELECT * FROM goods_type_cell WHERE g_id='{$goodsId}'";
    $obj = mysqli_query($con,$sql3);
    $result3 = mysqli_fetch_assoc($obj);
        /*合并两个数组，第一个数组作为键值，第二个数组作为值*/
    $det = array_combine($result2,$result3);
        /*删除数组第一个元素*/
    $det = array_splice($det,1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>电子商务平台</title>
    <link rel="shortcut icon" href="./img/timg.jpg" />
    <link rel="stylesheet" href="css/seaNav.css" />  <!--搜索框以上部分-->
    <link rel="stylesheet" href="css/details.css">
</head>
<body>
    <div id="nav">    <!--菜单栏-->
        <ul>
            <li class="nav_left">
                <a href="index.php">首页</a>
            </li>
            <li class="nav_left">
                <a href="#">个人中心</a>
            </li>
            <li class="nav_left">
                <a href="#">购物车</a>
            </li>
            <li class="nav_left">
                <a href="#">我的订单</a>
            </li>
            <li class="nav_left">
                <a href="publish.php">我的店铺</a>
            </li>

            <?php if($login): ?>
                <li class="nav_right">
                    <a href="loginout.php">注销</a>
                </li>
                <li class="nav_right">
                    <span>欢迎你:<?php echo $_SESSION['user']['id'] ?></span>
                </li>
            <?php else: ?>
                <li class="nav_right">
                    <a href="login.php">登录\注册</a>
                </li>
            <?php endif;?>
        </ul>
    </div>
    <!--搜索栏-->
    <div class="searchBox">
        <form action="index.php" method="post">
            <input type="text" id="searchKey" name="searchKey" autocomplete="商品名称"/>
            <input name="searchBtn" id="searchBtn" type="submit" value="搜 索" />
        </form>
    </div>
    <div class="product">
        <div class="f1">
            <div class="f11 f1Left">
                <img src="<?php echo $result1['picture_url1']?>" />
            </div>
            <div class="f11 f1Right">
                <div class="f12 head">
                    <p class="head">
                        <span class="n1"><?php echo $result1['name']?></span>
                        <span class="des"><?php echo $result1['des']?></span>
                    </p>
                </div>
                <div class="f12 price zt">
                    <p class="price">价格：￥
                        <span><?php echo $result1['price']?></span>
                    </p>
                </div>
                <div class="f12 but">
                    <a href="#"><input class="f13 but2" type="button" value="加入购物车"></a>
                    <a href="#"><input class="f13 but1" type="button" value="立即购买"></a>
                </div>
            </div>
        </div>
        <div class="f2">
            <div class="f21">
                <p>宝贝详情</p>
            </div>
            <div class="f22">
                <?php foreach($det as $key=>$value):?>
                    <div class="f221  details">
                        <span><?php echo $key.":".$value;?></span>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</body>
</html>
