<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
namespace app\admin\controller;

use app\admin\model\RouteModel;
use think\Controller;
use think\Db;

class TestController extends Controller
{
    public function test00() {
        $routeModel = new RouteModel();
        $routeModel->getRoutes();
    }
}