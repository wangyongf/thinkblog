<?php
/**
 * Created by PhpStorm.
 * User: yongf-new
 * Date: 2016/3/21
 * Time: 16:33
 */

namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function loginAction()
    {
        $this->display();
    }

    public function verifyAction()
    {
        $email = I('email');
        $password = I('password');

        $User = M('User');
        $condition['NAME'] = $email;
        $pwd = $User->where($condition)->getField('PASSWORD');
        if ($pwd == $password)
        {
            $result['success'] = TRUE;
            $result['content']['loginToUrl'] = U('Admin/Dashboard/dashboard');
        }
        else
        {
            $result['success'] = FALSE;
            $result['content']['loginToUrl'] = U('Admin/Login/login');
        }

        $this->ajaxReturn($result);
    }

}