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
        $isLogin = $this->checkAuth();

        if ($isLogin)
        {
            $articleCount = $this->getArticleCount();
            $this->assign('articleCount', $articleCount);

            $articleInfo = $this->getArticleInfo(FALSE);
            $this->assign('articleInfo', $articleInfo);

            $this->display();
        }
        else
        {
            $this->clearCookies();
            cookie('lasturl', __SELF__);
            $this->redirect('Login/login', 0);
        }
    }

    /**
     * 权限检查，检查是否登录
     */
    private function checkAuth()
    {
        $SECURE_KEY = "laoma";

        $uid = cookie('uid');
        $sign = cookie('sign');

        if ($sign == md5($uid + $SECURE_KEY))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * 获取文章总数
     */
    private function getArticleCount()
    {
        $Article = M('article');

        return $Article->count();
    }

    /**
     * 从数据库中获取文章的信息
     *
     */
    private function getArticleInfo($limit)
    {
        $Article = M('Article');        //实例化Article对象

        if ($limit)
        {
            $ids = $Article->getField('id', 5);
        }
        else
        {
            $ids = $Article->getField('id', TRUE);
        }

        $articles = null;
        for ($idx = count($ids) - 1; $idx >= 0; $idx--)
        {
            $id = $ids[$idx];
            $singleArticle['id'] = $id;

            $original = $Article->where('id=' . $id)->getField('ORIGINAL');
            if ($original == 0)
            {
                $singleArticle['original'] = "原创";
            }
            else
            {
                $singleArticle['original'] = "转载";
            }

            $singleArticle['title'] = $Article->where('id=' . $id)->getField('TITLE');
            $singleArticle['edit_time'] = date("Y年m月d日 h:m:s", $Article->where('id=' . $id)->getField('EDIT_TIME'));
//            $singleArticle['author_id'] = $Article->where('id=' . $id)->getField('AUTHOR_ID');
            $singleArticle['author'] = "老码";
            $singleArticle['views'] = $Article->where('id=' . $id)->getField('VIEWS');

            $singleArticle['title_url'] = U('Home/Post/post?post_id=' . $id);
            $singleArticle['edit_url'] = U('Admin/Dashboard/editor?id=' . $id);

            $articles[$id] = $singleArticle;
        }

        return $articles;
    }

    /**
     * 清除登录相关cookie
     */
    private function clearCookies()
    {
        cookie('sign', null);
    }

    /**
     * 文章简易管理页面
     */
    public function articleManagerAction()
    {
        $isLogin = $this->checkAuth();

        if ($isLogin)
        {
            $articleCount = $this->getArticleCount();
            $this->assign('articleCount', $articleCount);

            $articleInfo = $this->getArticleInfo(TRUE);
            $this->assign('articleInfo', $articleInfo);

            $this->display('article-manager');
        }
        else
        {
            $this->clearCookies();
            cookie('lasturl', __SELF__);
            $this->redirect('Login/login', 0);
        }
    }

    /**
     * markdown编辑界面
     */
    public function mdeditorAction()
    {
        $isLogin = $this->checkAuth();

        if ($isLogin)
        {
            $articleId = I('id');
            if ($articleId != null)
            {
                $Article = M('Article');

                $article['title'] = $Article->where('id=' . $articleId)->getField('TITLE');
                $article['category'] = $Article->where('id=' . $articleId)->getField('CATEGORY_ID');
                $article['tag'] = $Article->where('id=' . $articleId)->getField('TAGS');
                $article['type'] = $Article->where('id=' . $articleId)->getField('ORIGINAL');
                $article['summary'] = $Article->where('id=' . $articleId)->getField('SUMMARY');
                $article['content'] = $Article->where('id=' . $articleId)->getField('CONTENT');

                $this->assign('article', $article);
            }

            $this->display();
        }
        else
        {
            $this->clearCookies();
            cookie('lasturl', __SELF__);
            $this->redirect('Login/login', 0);
        }
    }

    /**
     * 传统编辑器
     */
    public function editorAction()
    {
        $isLogin = $this->checkAuth();

        if ($isLogin)
        {
            $articleId = I('id');
            if ($articleId != null)
            {
                $Article = M('Article');

                $article['title'] = $Article->where('id=' . $articleId)->getField('TITLE');
                $article['category'] = $Article->where('id=' . $articleId)->getField('CATEGORY_ID');
                $article['tag'] = $Article->where('id=' . $articleId)->getField('TAGS');
                $article['type'] = $Article->where('id=' . $articleId)->getField('ORIGINAL');
                $article['summary'] = $Article->where('id=' . $articleId)->getField('SUMMARY');
                $article['content'] = $Article->where('id=' . $articleId)->getField('CONTENT');

                $this->assign('article', $article);
            }

            $this->display();
        }
        else
        {
            $this->clearCookies();
            cookie('lasturl', __SELF__);
            $this->redirect('Login/login', 0);
        }
    }

    /**
     * 显示不支持ie
     */
    public function tipAction()
    {
        $isLogin = $this->checkAuth();

        if ($isLogin)
        {
            $this->display();
        }
        else
        {
            $this->clearCookies();
            cookie('lasturl', __SELF__);
            $this->redirect('Login/login', 0);
        }
    }

}