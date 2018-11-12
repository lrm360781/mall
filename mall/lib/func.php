<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/14/014
 * Time: 8:12
 */

   function userlink()
   {            //连接数据库
       $con = mysqli_connect('localhost','root','');

       if(!$con)
       {
           return false;
       }
              //具体运用的数据库 表
       mysqli_select_db($con,'mall');
              //设置字符集
       mysqli_set_charset($con,'utf8');
       return $con;
   }

   //MD5加密函数
    function m5($password)
    {
        if(!$password)
        {
            return false;
        }
        return md5(md5($password).'mall');
    }




    //判断用户是否登录
    function checkLogin()
    {
        //开启session
        session_start();
        //检查session是否存在
        if(!isset($_SESSION['user'])||empty($_SESSION['user']))
        {
            return false;
        }
        return true;
    }


    /**
     * 获取当前url
     * @return string
     */
    function getUrl()
    {
        /*$_SERVER['SERVER_PORT'] 获取服务器端口*/
        $url = '';
        $url .= $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
        $url .= $_SERVER['HTTP_HOST'];  /* 请求头信息中的Host内容，获取当前域名*/
        $url .= $_SERVER['REQUEST_URI'];   /*当前脚本路径，根目录之后的目录*/
        return $url;
    }

    /**
     * 根据page生成url
     * @param $page
     * @param string $url
     * @return string
     */
    function pageUrl($page, $url = '')
    {
        $url = empty($url) ? getUrl() : $url;
        //查询url中是否存在?
        $pos = strpos($url, '?');
        if($pos === false)
        {
            $url .= '?page=' . $page;
        }
        else
        {
            $queryString = substr($url, $pos + 1);
            //解析querystring为数组
            parse_str($queryString, $queryArr);
            if(isset($queryArr['page']))
            {
                unset($queryArr['page']);
            }
            $queryArr['page'] = $page;

            //将queryArr重新拼接成queryString
            $queryStr = http_build_query($queryArr);

            $url = substr($url, 0, $pos) . '?' . $queryStr;

        }
        return $url;

    }


    function pages($total, $currentPage, $pageSize, $show = 3)
        {
            $pageStr = '';

            //仅当总数大于每页显示条数 才进行分页处理
            if($total > $pageSize)
            {

                //总页数
                $totalPage = ceil($total / $pageSize);//向上取整 获取总页数

                //对当前页进行处理
                $currentPage = $currentPage > $totalPage ? $totalPage : $currentPage;
                //分页起始页
                $from = max(1, ($currentPage - intval($show / 2)));
                //分页结束页
                $to = $from + $show - 1;


                $pageStr .= '<div class="page-nav">';
                $pageStr .= '<ul>';


                //仅当 当前页大于1的时候 存在 首页和上一页按钮
                if($currentPage > 1)
                {

                    $pageStr .= "<li><a href='" . pageUrl(1) . "'>首页</a></li>";
                    $pageStr .= "<li><a href='" . pageUrl($currentPage - 1) . "'>上一页</a></li>";

                }


                //当结束页大于总页
                if($to > $totalPage)
                {
                    $to = $totalPage;
                    $from = max(1, $to - $show + 1);
                }


                if($from > 1)
                {
                    $pageStr .= '<li>...</li>';
                }


                for($i = $from; $i <= $to; $i++)
                {
                    if($i != $currentPage)
                    {
                        $pageStr .= "<li><a href='" . pageUrl($i) . "'>{$i}</a></li>";
                    }
                    else
                    {
                        $pageStr .= "<li><span class='curr-page'>{$i}</span></li>";
                    }
                }


                if($to < $totalPage)
                {
                    $pageStr .= '<li>...</li>';

                }

                if($currentPage < $totalPage)
                {
                    $pageStr .= "<li><a href='" . pageUrl($currentPage + 1) . "'>下一页</a></li>";
                    $pageStr .= "<li><a href='" . pageUrl($totalPage) . "'>尾页</a></li>";
                }

                $pageStr .= '</ul>';
                $pageStr .= '</div>';


            }

            return $pageStr;
        }

?>