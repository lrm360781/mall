<?php

    include_once "./lib/func.php";

    if($login = checkLogin())
    {
        $user = $_SESSION['user'];
    }

    //检查page参数
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    //把page与1对比 取中间最大值
    $page = max($page, 1);
    //每页显示条数
    $pageSize = 3;

    // page =1  limit 0,2
    // page =2  limit 2,2
    // page =3  limit 4,2

    $offset = ($page - 1) * $pageSize;


    $con = userlink();

    $sql = "SELECT COUNT(`g_id`) as total from `goods`";
    $obj = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($obj);

    $total = isset($result['total'])?$result['total']:0;

    unset($sql,$result,$obj);
    //只查询需要的数据
    $sql = "SELECT goods.g_id,`name`,price,des,picture.picture_url1 FROM goods,picture WHERE goods.g_id=picture.g_id 
ORDER BY g_id ASC limit {$offset},{$pageSize}";

    $obj = mysqli_query($con,$sql);

    $goods = array();
    while($result = mysqli_fetch_assoc($obj))
    {
        $goods[] = $result;
    }

    $pages = pages($total,$page,$pageSize,3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>电子商务平台</title>
    <link rel="shortcut icon" href="./img/timg.jpg" />
    <link rel="stylesheet" href="css/seaNav.css" />  <!--搜索框以上部分-->
    <link rel="stylesheet" href="css/page.css" />       <!--分页-->
    <link rel="stylesheet" href="css/show.css" />   <!--显示商品-->
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
    <div class="view">
        <?php foreach($goods as $v):?>
            <div class="hv">
                <div class="mi">
                    <div class="goods border">
                        <!--查看商品详情-->
                        <a href="details.php?id=<?php echo $v['g_id']?>">
                            <div class="imges">
                                <img  src="<?php echo $v['picture_url1']?>" alt="<?php echo $v['name']?>">
                            </div>
                            <div class="product">
                                <em><b>￥</b><?php echo $v['price']?></em>
                                <p class="productTitle"><?php echo $v['name']?></p>
                                <p class="productStatus">
                                    <span>该款月成交<em>4.9万笔</em></span>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <!--分页导航栏-->
    <?php echo $pages; ?>
</body>
</html>