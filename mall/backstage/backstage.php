<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31 0031
 * Time: 8:59
 */
    include_once "../lib/func.php";

    if($login = checkLogin())
    {
        $user = $_SESSION['user'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>电子商务平台</title>
    <link rel="shortcut icon" href="../img/timg.jpg" />
    <link rel="stylesheet" href="../css/backstage.php"
</head>
<body>
    <div id="head">    <!--菜单栏-->
        <p>
            <span>商城后台管理</span>
        </p>
        <ul>
            <?php if($login): ?>
                <li class="nav_right">
                    <a href="../loginout.php">注销</a>
                </li>
                <li class="nav_right">
                    <span>欢迎你:<?php echo $_SESSION['user']['id'] ?></span>
                </li>
            <?php else: ?>
                <li class="nav_right">
                    <a href="../login.php">登录\注册</a>
                </li>
            <?php endif;?>
        </ul>
    </div>
</body>
</html>