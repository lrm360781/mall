<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
use app\index\model\User as UserModel;
use think\Session;

class User extends Base
{
    //登录界面
    public function login()
    {
        return $this->view->fetch();
    }

    // 验证登录
	  public function checkLogin(Request $request)
    {
        $status1 = 0; //验证失败标志
        $result = '验证失败'; //失败提示信息
        $data = $request -> param();

        //验证规则
        $rule = [
            'name|姓名' => 'require',
            'password|密码'=>'require',
            'verify|验证码' =>'require|captcha'
        ];

        //验证数据 $this->validate($data, $rule, $msg)
        $result = $this -> validate($data, $rule);

        //通过验证后,进行数据表查询
        //此处必须全等===才可以,因为验证不通过,$result保存错误信息字符串,返回非零
        if (true === $result) {
            //查询条件
            $map = [
                'name' => $data['name'],
                'password' => md5($data['password']),
            ];

            //数据表查询,返回模型对象
            $user = UserModel::get($map);
            if(null === $user) {
                $result = '没有该用户,请检查';
            } else {
                $status1 = 1;
                $result = '验证通过,点击[确定]后进入后台';
                Session::set('user_id',$user->id);
                Session::set('user_info',$user->getData());
                $user->setInc('login_count');
            }
        }
        return ['status'=>$status1, 'message'=>$result, 'data'=>$data];
    }

    //退出登陆
    public function logout()
    {
        //退出前先更新登录时间字段,下次登录时就知道上次登录时间了
        UserModel::update(['login_time'=>time()],['id'=> Session::get('user_id')]);
        Session::delete('user_id');
        Session::delete('user_info');

        $this -> success('注销登陆,正在返回',url('user/login'));
    }

    //管理员列表
    public function  adminList()
    {
        $this -> view -> assign('title', '管理员列表');
        $this -> view -> assign('keywords', 'PHP中文网教学系统');
        $this -> view -> assign('desc', '教学案例');

        $this -> view -> count = UserModel::count();

        //判断当前是不是admin用户
        //先通过session获取到用户登陆名
        $userName = Session::get('user_info.name');
        if ($userName == 'admin') {
            $list = UserModel::all();  //admin用户可以查看所有记录,数据要经过模型获取器处理
        } else {
            //为了共用列表模板,使用了all(),其实这里用get()符合逻辑,但有时也要变通
            //非admin只能看自己信息,数据要经过模型获取器处理
            $list = UserModel::all(['name'=>$userName]);
        }


        $this -> view -> assign('list', $list);
        //渲染管理员列表模板
        return $this -> view -> fetch('admin_list');
    }

    //管理员状态变更
    public function setStatus(Request $request)
    {
        $user_id = $request -> param('id');
        $result = UserModel::get($user_id);
        if($result->getData('status') == 1) {
            UserModel::update(['status'=>0],['id'=>$user_id]);
        } else {
            UserModel::update(['status'=>1],['id'=>$user_id]);
        }
    }

    //删除管理员
    public function deleteUser(Request $request){
        $user_id=$request->param('id');
        UserModel::update(['is_delete'=>1],['id'=> $user_id]);
        UserModel::destroy($user_id);
    }

    //恢复删除
    public function unDelete(){
        UserModel::update(['delete_time'=>null],['is_delete'=>1]);
    }
}
