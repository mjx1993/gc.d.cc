<?php 


// 子域名检测
/*\think\Route::get('xx/:var','robot/blog/read',['domain'=>'robot']);
\think\Route::get('xx3d/:var','print3d/index/read',['domain'=>'print3d']);

\think\Route::get('post/:var','trade/cwzn/post',['domain'=>'cwzn']);
\think\Route::get('post/:var','trade/fastener/post',['domain'=>'fastener']);*/


return [

    '__domain__' => [

        // 指向trade模块
        'fastener'      => 'trade/fastener',  //紧固件
        'cwzn'          => 'trade/cwzn',      //厨卫智能家居
        'robot'         => 'trade/robot',
        'print3d'       => 'trade/print3d',

        // 泛域名规则建议在最后定义 绑定泛二级域名域名到cp模块
        '*'             => 'cp?id=*',
    ],
    
];