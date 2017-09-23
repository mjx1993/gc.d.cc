<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
namespace app\trade\controller;

use cmf\controller\HomeBaseController;

class RobotController extends HomeBaseController
{
    public function index()
    {
        echo 'Robot by trade';
    }

    public function blog() 
    {
        $data = input('param.');
        if ($data['id'] == '') {
            echo 'robot by index';
        } else {
            echo 'robot by blog';
        }
    }
}
