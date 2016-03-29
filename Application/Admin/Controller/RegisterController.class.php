<?php
/**
 * Created by PhpStorm.
 * User: yongf-new
 * Date: 2016/3/22
 * Time: 2:59
 */

namespace Admin\Controller;

use Think\Controller;

class RegisterController extends Controller
{
    public function registerAction()
    {
        $this->display();
    }

    public function registerDoneAction()
    {
        $email = I('email');
        $password = I('password');

        $User = M('User');
        $data['NAME'] = $email;
        $data['PASSWORD'] = $password;
        if ($User->add($data))
        {
            $result['success'] = TRUE;
            $result['content'] = U('Admin/Login/login');
        }

        $result['resubmitToken'] = md5("Scott Wang");

        $this->ajaxReturn($result);
    }
}