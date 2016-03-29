<?php
/**
 * Created by PhpStorm.
 * User: yongf-new
 * Date: 2016/3/22
 * Time: 4:31
 */

namespace Admin\Controller;

use Think\Controller;

class ResetController extends Controller
{
    public function resetAction()
    {
        $this->display();
    }

    public function resetDoneAction()
    {
        $email = I('email');
        $password = I('password');

        $User = M('User');
        $condition['NAME'] = $email;
        $data['PASSWORD'] = $password;
        if ($User->where($condition)->save($data))
        {
            $this->success('密码修改成功', U('Admin/Login/login'));
        }
        else
        {
            $this->error('密码修改失败');
        }
    }
}