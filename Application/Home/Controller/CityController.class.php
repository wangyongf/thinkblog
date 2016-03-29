<?php
/**
 * Created by PhpStorm.
 * User: yongf-new
 * Date: 2016/3/16
 * Time: 19:41
 */

namespace Home\Controller;

use Think\Controller;

class CityController extends Controller
{
    /**
     * 演示_empty方法的使用
     *
     * @param $name
     */
    public function _empty()
    {
        $name = ACTION_NAME;
        $this->cityAction($name);
    }

    /**
     * 注意此方法为protected
     *
     * @param $name
     */
    protected function cityAction($name)
    {
        echo '当前城市：' . $name;
    }

}