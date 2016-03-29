<?php
/**
 * Created by PhpStorm.
 * User: yongf-new
 * Date: 2016/3/16
 * Time: 12:47
 */

namespace Home\Controller;

use Think\Controller;

class BlogController extends Controller
{
    public function readAction($id = 0)
    {
        echo 'id=' . $id . '<br/>';
        echo I('id');
//        echo I('path.3');
    }

    public function archiveAction($year = '2016', $month = '3', $day = '16')
    {
        echo 'year=' . $year . '&month=' . $month . '&day=' . $day;
    }

}