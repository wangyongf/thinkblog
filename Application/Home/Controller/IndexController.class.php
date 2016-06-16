<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        $articles = $this->getArticleInfo();
        $this->assign('articles', $articles);

        $links = $this->getFriendLink();
        $this->assign('links', $links);

        $this->display();
    }

    /**
     * 从数据库中获取文章的信息
     */
    private function getArticleInfo()
    {
        $Article = M('Article');        //实例化Article对象

        $ids = $Article->getField('id', TRUE);

        $articles = null;
        for ($idx = count($ids) - 1; $idx >= 0; $idx--)
        {
            $id = $ids[$idx];
            $singleArticle['id'] = $id;
            $singleArticle['title'] = $Article->where('id=' . $id)->getField('TITLE');
            $singleArticle['pub_time'] = date("Y-m-d", $Article->where('id=' . $id)->getField('PUB_TIME'));
            $singleArticle['category_id'] = $Article->where('id=' . $id)->getField('CATEGORY_ID');
            $singleArticle['tags'] = $Article->where('id=' . $id)->getField('TAGS');
            $singleArticle['summary'] = htmlspecialchars_decode($Article->where('id=' . $id)->getField('SUMMARY'));
            $singleArticle['content'] = htmlspecialchars_decode($Article->where('id=' . $id)->getField('CONTENT'));
            $singleArticle['edit_time'] = date("Y-m-d", $Article->where('id=' . $id)->getField('EDIT_TIME'));

            $singleArticle['title_url'] = U('Home/Post/post?post_id=' . $id);

            $articles[$id] = $singleArticle;
        }

        return $articles;
    }

    /**
     * 获取友情链接
     */
    private function getFriendLink()
    {
        $Link = M('Link_group');        //初始化Link_group

        $ids = $Link->getField('id', TRUE);

        $links = null;
        for ($idx = 0; $idx < count($ids); $idx++)
        {
            $id = $ids[$idx];
            $singleLink['id'] = $id;
            $singleLink['name'] = $Link->where('id=' . $id)->getField('NAME');
            $singleLink['description'] = $Link->where('id=' . $id)->getField('DESCRIPTION');
            $singleLink['url'] = $Link->where('id=' . $id)->getField('URL');

            $links[$id] = $singleLink;
        }

        return $links;
    }

    public function insertAction()
    {
//        static $index = 1;
//        if ($index++ != 1)
//            return;

        //插入数据
        $this->display('Insert:insert');
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