<?php
/**
 * Created by PhpStorm.
 * User: yongf-new
 * Date: 2016/5/13
 * Time: 16:25
 */

namespace Admin\Controller;

use Think\Controller;

class InsertController extends Controller
{
    /**
     * 插入数据
     */
    public function insertAction()
    {
        $this->_insertData();
    }

    /**
     * 插入数据
     */
    private function _insertData()
    {
        $time = time();

        $Article = M('Article');

        $data['TITLE'] = I('title');
        $data['PUB_TIME'] = $time;
//        $data['CATEGORY_ID'] = I('category_id');
        $data['CATEGORY_ID'] = 1;           //暂时先把分类设为1，后期再改进
        $data['TAGS'] = I('tag');
        $data['SUMMARY'] = I('summary');
        $data['CONTENT'] = I('content');
        $data['EDIT_TIME'] = $time;
//        dump($data);

        $Article->data($data)->add();

        $result['success'] = TRUE;
        $this->ajaxReturn($result);
    }
}