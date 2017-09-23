<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------

if (file_exists(CMF_ROOT . "data/conf/route.php")) {
    $runtimeRoutes = include CMF_ROOT . "data/conf/route.php";
} else {
    $runtimeRoutes = [];
}

if (file_exists(CMF_ROOT . "data/conf/route2.php")) {
    $runtimeRoutes2 = include CMF_ROOT . "data/conf/route2.php";
} else {
    $runtimeRoutes2 = [];
}

return array_merge($runtimeRoutes, $runtimeRoutes2);

// return $runtimeRoutes;