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
        $type = I('type');
        if ($type == 0)
        {
            $this->_insertArticle();
        }
        elseif ($type == 1)
        {
            $this->_updateArticle();
        }
    }

    /**
     * 新增文章
     */
    private function _insertArticle()
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

    /**
     * 更新文章
     */
    private function _updateArticle()
    {
        $time = time();

        $Article = M('Article');

        $data['ID'] = I('id');
        $data['TITLE'] = I('title');
        $data['PUB_TIME'] = $time;
//        $data['CATEGORY_ID'] = I('category_id');
        $data['CATEGORY_ID'] = 1;           //暂时先把分类设为1，后期再改进
        $data['TAGS'] = I('tag');
        $data['SUMMARY'] = I('summary');
        $data['CONTENT'] = I('content');
        $data['EDIT_TIME'] = $time;
//        dump($data);

        $Article->save($data);

        $result['success'] = TRUE;
        $this->ajaxReturn($result);
    }

    /**
     * 删除一篇文章
     */
    public function delAction()
    {
        $Article = M('Article');

        $id = I('id');
        if ($Article->delete($id) > 0)
        {
            $result['success'] = TRUE;
        }
        else
        {
            $result['success'] = FALSE;
        }

        $this->ajaxReturn($result);
    }
}