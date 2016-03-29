<?php
/**
 * Created by PhpStorm.
 * User: yongf-new
 * Date: 2016/3/16
 * Time: 20:42
 */

namespace Home\Controller;

use Think\Controller;

class EmptyController extends Controller
{
    public function indexAction()
    {
        //根据当前控制器名来判断要执行那个城市的操作
        $cityName = CONTROLLER_NAME;
        $this->_city($cityName);
    }

    protected function _city($name)
    {
        echo '当前城市：' . $name;
    }

}