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

    /**
     * 退出登录
     */
    public function exitAction()
    {
        $this->clearCookies();
        $this->redirect('Login/login', 0);
    }

    /**
     * 清除登录相关cookie
     */
    private function clearCookies()
    {
        cookie('sign', null);
    }

    public function verifyAction()
    {
        $SECURE_KEY = "laoma";
        $email = I('email');
        $password = I('password');

        $User = M('User');
        $condition['NAME'] = $email;
        $pwd = $User->where($condition)->getField('PASSWORD');
        $uid = $User->where($condition)->getField('ID');
        if ($pwd == $password)
        {
            $result['success'] = TRUE;
            $sign = md5($uid + $SECURE_KEY);
            //设置cookie
            cookie('uid', $uid);
            cookie('sign', $sign);
            $lastUrl = cookie('lasturl');
            if ($lastUrl != null)
            {
                cookie('lasturl', null);
                $url = $lastUrl;
            }
            else
            {
                $url = U('Admin/Dashboard/dashboard');
            }
            $result['content']['loginToUrl'] = $url;
        }
        else
        {
            $result['success'] = FALSE;
            $result['content']['loginToUrl'] = U('Admin/Login/login');
        }

        $this->ajaxReturn($result);
    }

}