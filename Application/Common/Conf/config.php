<?php
return array(
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'h5.m2015.cn', // 服务器地址
    'DB_PWD'    => 'm2015cn', // 密码

    'DB_NAME'   => 'app_dongfeng', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增


    'URL_MODEL'		=>	0,
    'LOG_RECORD'	=>	true,
    'LOG_LEVEL'		=>	'EMERG,ALERT,CRIT,ERR,WARN,NOTICE',

    'DEFAULT_FILTER'	=>	'strip_tags,htmlspecialchars',
    'SHOW_PAGE_TRACE'	=>	false,

    'DB_FIELDS_CACHE'	=>	false,
    'URL_ROUTER_ON'		=>	true,
    'TMPL_DENY_PHP'		=>	false,
    'ERROR_MESSAGE'         =>  '页面错误！请稍后再试～',//错误显示信息,非调试模式有效
    'ERROR_PAGE'            =>  '', // 错误定向页面
    'SHOW_ERROR_MSG'        =>  false,    // 显示错误信息

    //'配置项'=>'配置值'
    'TMPL_PARSE_STRING' => array(
        '__UPLOAD__' => './Uploads'
    ),

    'SESSION_PREFIX' => 'app_session_',
    'COOKIE_PREFIX'  => '',

    'UploadConfig'	=>	array(
        'maxSize'    =>    20971520,
        'savePath'   =>    '',
        'saveName'   =>    date("YmdHis").mt_rand(10000,99999),
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
        'autoSub'    =>    true,
        'subName'    =>    'month_'.date('ym')
    ),
    'WEIXINPAY_CONFIG' => array(
        'KEY'       => 'wxf4955c4949bf96ee',
        'APPSECRET' => '6121b7013d781e9cc47fbe625d137889'
    )
);