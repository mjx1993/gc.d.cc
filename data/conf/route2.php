<?php 


// 子域名检测
/*\think\Route::get('xx/:var','robot/blog/read',['domain'=>'robot']);
\think\Route::get('xx3d/:var','print3d/index/read',['domain'=>'print3d']);*/

return [

    '__domain__' => [

        'fastener'      => 'trade/fastener',
        'cwzn'          => 'trade/cwzn',
        'robot'         => [
                ':id'   => 'trade/robot/blog',
        ],
        // 'robot'         => 'trade/robot', 

        // 泛域名规则建议在最后定义 绑定泛二级域名域名到cp模块
        '*'             => 'cp?id=*',
    ],
    
];