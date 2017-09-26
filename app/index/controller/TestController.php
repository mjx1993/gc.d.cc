<?php 

namespace app\index\controller;

use think\Controller;
use app\admin\service\QVideoService;

class TestController extends Controller
{
	public function _initialize() {
		$this->QVideoService = new QVideoService();
	}

	public function test() {
		$fileId = '14651978969511533880';
		$fileName = '工匠';
		$data = $this->QVideoService->GetVideoDescribe($fileName);
		dump($data);
	}
}