<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
namespace app\trade\controller;

use cmf\controller\HomeBaseController;

class CwznController extends HomeBaseController
{
    public function index()
    {
        echo 'cwzn2 by trade';
        return $this->fetch();
    }
}
