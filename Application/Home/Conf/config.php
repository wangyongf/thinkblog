<?php
return array(
	//'配置项'=>'配置值'

    //开启路由
    /*'URL_ROUTER_ON' => true,

    //路由定义
    'URL_ROUTE_RULES' => array(
        'news/:year/:month/:day' => array('News/archive', 'status=1'),
        'news/:id' => 'News/read', 'news/read/:id' => '/news/:1',
    ),

    //静态路由
    'URL_MAP_RULES' => array(
        'new/top' => 'news/index/type/top',
        'new/top.html' => 'news/index?type=top',
        'hello/:name' => function ($name) {
            echo 'Hello,' . $name;
        }
    ),*/

    //静态路由是完整匹配
    //如果当前URL地址采用了伪静态支持的话，静态路由的定义需要包含伪静态后缀才能生效

    //规则路由闭包支持
);