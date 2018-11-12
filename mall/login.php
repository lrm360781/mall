<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/10/010
 * Time: 9:47
 */

    include_once "./lib/func.php";

    if(checkLogin())
    {
        header("location:index.php");
    }

/*判断用户输入是否符合规范*/

    $msg="";
    if(!empty($_POST['userName']))
    {
        $userName=intval(trim($_POST["userName"])); /*清楚空字符*/
        $password=trim($_POST["password"]);

        $con = userlink();

        if(!$con)
        {
            exit;
        }

        $password = m5($password);
        $sql = "SELECT * FROM `user` WHERE `id`='{$userName}'AND `password`='{$password}' LIMIT 1";
        $obj = mysqli_query($con,$sql);
        $result = mysqli_fetch_assoc($obj);

        if(is_array($result)&&!empty($result))
        {
            $_SESSION['user'] = $result;
            header("location:index.php");
            exit;
        }else
        {
            $msg="<span style='color:red;margin-left:28px;font-size:14px;'>用户名或密码输入错误，请重新输入！</span>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>景色商城--用户登录</title>
    <link rel="shortcut icon" href="./img/timg.jpg" />
    <link rel="stylesheet" href="css/login.css" />
</head>
<body>

    <div id="topBox">
        <span ><img src="img/top.jpg"/></span>
        <p>景色电子商城欢迎你！</p>
    </div>
    <form action="login.php" method="post" id="loginText">
        <div id="mid">
            <div id="m-right">
                <div class="title">
                    <span>景色商城--用户登录</span>
                </div>
                <div class="loginbBox">
                    <div class="error"><?php echo $msg; ?></div>
                    <div class="userName">
                        <input type="text" class="userName1" name="userName" id="userName" placeholder="请输入账号"  />
                    </div>
                    <div class="password">
                        <input type="password" class="password1" name="password" id="password" placeholder="请输入密码"  />
                    </div>
                    <div class="repass">
                        <span><a  class="create" href="create.php">用户注册</a> </span>
                        <span><a class="retrieve" href="repassword.php">忘记密码？</a> </span>
                    </div>
                    <div class="login">
                        <input class="login_btn" name="login" type="submit" value="登&nbsp;&nbsp;&nbsp;&nbsp;录"/>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
                <p>联系我们：&nbsp;&nbsp;4100-8795-4392</p>
        </div>
    </form>
</body>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/layer/layer.js"></script>
    <script src="js/tipslogin.js"></script>
</html>