<?php
/**
 * Created by PhpStorm.
 * User: yongf-new
 * Date: 2016/3/23
 * Time: 13:38
 */

namespace Admin\Controller;

use Think\Controller;

class DashboardController extends Controller
{
    /**
     * 后台主面板
     */
    public function dashboardAction()
    {
        $this->display();
    }

    /**
     * markdown编辑界面
     */
    public function mdeditorAction()
    {
        $this->display();
    }

    /**
     * 传统编辑器
     */
    public function editorAction()
    {
        $this->display();
    }

    /**
     * 不支持ie
     */
    public function tipAction()
    {
        $this->display();
    }
}