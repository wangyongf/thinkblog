<?php
/**
 * Created by PhpStorm.
 * User: yongf-new
 * Date: 2016/3/29
 * Time: 16:50
 */

namespace Home\Controller;

use Think\Controller;

class PostController extends Controller
{
    public function postAction()
    {
        $post_id = I('post_id');
        $data = $this->getArticleInfo($post_id);
        $this->assign($data);

        $links = $this->getFriendLink();
        $this->assign('links', $links);

        $this->display('Index/post');
    }

    /**
     * 从数据库中获取文章的信息
     */
    private function getArticleInfo($id = 1)
    {
        $Article = M('Article');        //实例化Article对象

        $data['title'] = $Article->where('id=' . $id)->getField('TITLE');
        $data['pub_time'] = date("Y-m-d", $Article->where('id=' . $id)->getField('PUB_TIME'));
        $data['category_id'] = $Article->where('id=' . $id)->getField('CATEGORY_ID');
        $data['tags'] = $Article->where('id=' . $id)->getField('TAGS');
        $data['summary'] = htmlspecialchars_decode($Article->where('id=' . $id)->getField('SUMMARY'));
        $data['content'] = htmlspecialchars_decode($Article->where('id=' . $id)->getField('CONTENT'));
        $data['edit_time'] = date("Y-m-d", $Article->where('id=' . $id)->getField('EDIT_TIME'));

        return $data;
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
}