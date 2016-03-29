<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
//        $this->_insertData();
        $data = $this->getArticleInfo();
        $this->assign($data);
        $this->display();
    }

    /**
     * 从数据库中获取文章的信息
     */
    private function getArticleInfo($id = 1)
    {
        $Article = M('Article');        //实例化Article对象

        $data['id'] = $id;
        $data['title'] = $Article->where('id=' . $id)->getField('TITLE');
        $data['pub_time'] = date("Y-m-d", $Article->where('id=' . $id)->getField('PUB_TIME'));
        $data['category_id'] = $Article->where('id=' . $id)->getField('CATEGORY_ID');
        $data['tags'] = $Article->where('id=' . $id)->getField('TAGS');
        $data['summary'] = htmlspecialchars_decode($Article->where('id=' . $id)->getField('SUMMARY'));
        $data['content'] = htmlspecialchars_decode($Article->where('id=' . $id)->getField('CONTENT'));
        $data['edit_time'] = date("Y-m-d", $Article->where('id=' . $id)->getField('EDIT_TIME'));

        $data['title_url'] = U('Home/Post/post?post_id=' . $id);

        return $data;
    }

    /**
     * 插入数据
     */
    public function _insertData()
    {
        $time = time();

        $Article = M('Article');

        $data['TITLE'] = I('title');
        $data['PUB_TIME'] = $time;
        $data['CATEGORY_ID'] = I('category_id');
        $data['TAGS'] = I('tag');
        $data['SUMMARY'] = I('summary');
        $data['CONTENT'] = I('content');
        $data['EDIT_TIME'] = $time;
//        dump($data);

        $Article->data($data)->add();
    }

    public function insertAction()
    {
//        static $index = 1;
//        if ($index++ != 1)
//            return;

        //插入数据
        $this->display('Insert/insert');
    }

    /**
     * 项目介绍页面
     */
    public function portalAction()
    {
//        echo 'Hello, Portal!<br/>';
//        echo '<a href="index.html">返回首页</a>';
        $this->display('Portal:portal');
    }

}