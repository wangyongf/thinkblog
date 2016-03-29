<?php
return array(
    //'配置项'=>'配置值'

    'ACTION_SUFFIX' => 'Action', // 操作方法后缀
//    'URL_PARAMS_BIND' => true, // URL变量绑定到操作方法作为参数，已经默认开启

//    'URL_HTML_SUFFIX' => 'html'     //默认设置，如设置为html，可注释
//    'DB_DSN' => 'mysql://root:wangyongfs1996.@localhost:3306/thinkblog',
    'DB_PREFIX' => 'thinkblog_', // 数据库表前缀

    'DB_TYPE' => 'mysql',       //数据库类型
    'DB_HOST' => 'localhost', //服务器地址
    'DB_NAME' => 'thinkblog',     //数据库名
    'DB_USER' => 'root',        //用户名
    'DB_PWD' => 'wangyongfs1996.',      //密码
    'DB_PORT' => 3306,      //端口
    'DB_CHARSET' => 'utf8',     //字符集

    //启用差异主题定义方式
    //设置后，如果blue主题下面不存在edit模板的话，就会自动定位到默认主题中的edit模板。
    'TMPL_LOAD_DEFAULTTHEME' => TRUE,

    // 设置禁止访问的模块列表
//    'MODULE_DENY_LIST' => array('Common', 'Runtime', 'Home'),
    'MODULE_DENY_LIST' => array('Common', 'Runtime'),
    'DEFAULT_MODULE' => 'Home',

    //修改模板文件的后缀为.tpl
//    'TMPL_TEMPLATE_SUFFIX' => '.tpl',

    //修改定界符
//    'TMPL_L_DELIM' => '<{',
//    'TMPL_R_DELIM' => '>}',

    // 开启路由
    'URL_ROUTER_ON' => TRUE,

    //URL模式 REWRITE
    'URL_MODEL' => '2',

    //模板替换规则
    'TMPL_PARSE_STRING' => array(),
);