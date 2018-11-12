<?php
        /*
         * Created by PhpStorm.
         * User: Administrator
         * Date: 2018/9/10/010
         * Time: 9:47
         */
        $msg1 = '';
        include_once "./lib/func.php";
        /*判断用户输入是否符合规范*/
        if (!empty($_POST["userName"]))
        {
            $userName=trim($_POST["userName"]); /*清楚空字符*/
            $password=trim($_POST["password"]);

            $con = userlink();

            if(!$con)
            {
                exit;
            }

            if(empty($userName)||strlen($userName)>11){
                $msg1 = "<span style='color:red;margin-left:28px;font-size:18px;'>用户名不规范，请重新输入！</span>";
                exit();
            }

            if(empty($password)||strlen($password)<6||strlen($password>16)) {
                $msg1 = "<span style='color:red;margin-left:28px;font-size:18px;'>密码不规范，请重新输入！</span>";
                exit();
            }

            $sql = "SELECT COUNT(`id`) as total FROM `user` WHERE `id`={$userName}";
            $obj = mysqli_query($con,$sql);

            $result = mysqli_fetch_assoc($obj);

            //判断字符集是否已经存在
            if(isset($result['total'])&&$result['total']>0)
            {
                $msg1 = "<span style='color:red;margin-left:28px;font-size:14px;'>该用户名已存在，请重新输入！</span>";
            }else
            {
                $time = date("Y-m-d");
                $password = m5($password);

                //插入数据库
                $sql = "INSERT INTO  `user`(`id`,`password`,`add_time`) VALUES ({$userName},'{$password}','{$time}')";
                $result = mysqli_query($con,$sql);
                unset($result);  //释放内存


                $sql = "SELECT * FROM `user` WHERE `id`='{$userName}'AND `password`='{$password}' LIMIT 1";
                $obj = mysqli_query($con,$sql);
                $result = mysqli_fetch_assoc($obj);

                if(!checkLogin()&&$result)
                {
                    $msg1 = "<span style='color:black;margin-left:28px;font-size:18px;'>恭喜你，注册成功！</span>";
                    $_SESSION['user'] = $result;
                    header("Refresh:2;url=index.php");
                }else{
                    $msg1 = "<span style='color:red;margin-left:28px;font-size:18px;'>注册失败，请重新输入！</span>";
                }
            }
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>景色商城--用户注册</title>
    <link rel="shortcut icon" href="./img/timg.jpg" />
    <link rel="stylesheet" href="css/login.css" />
</head>
<body>

<div id="topBox">
    <span ><img src="img/top.jpg"/></span>
    <p>景色电子商城欢迎你！</p>
</div>
<form action="create.php" method="post" id="loginText">
    <div id="mid">
        <div id="m-right">
            <div class="title">
                <span>景色商城--用户注册</span>
            </div>
            <div class="loginbBox">
                <div class="error"><?php echo $msg1; ?></div>
                <div class="userName">
                    <input type="text" class="userName1" name="userName" id="userName" placeholder="请输入账号11位数值"  />
                </div>
                <div class="password">
                    <input type="password" class="password1" name="password" id="password" placeholder="请输入密码6-16位之间"  />
                </div>
                <div class="password">
                    <input type="password" class="password1" name="repassword" id="repassword" placeholder="请确认密码"  />
                </div>

                <div class="login">
                    <input class="login_btn" name="login" type="submit" value="注&nbsp;&nbsp;&nbsp;&nbsp;册"/>
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
<script src="js/tipscreate.js"></script>   <!--弹出提示窗口-->
</html>