<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/19/019
 * Time: 9:07
 */

session_start();
unset($_SESSION['user']);

header("location:login.php");
?>