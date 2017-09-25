<?php 

namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use ucpaas\Ucpaas;

class UcpaasController extends AdminBaseController
{

	public function test() {
		$param = $this->request->param();
		$mobile = $param['mobile'];
		$code = $param['code'];
		// dump($mobile.'-'.$code);
		$rc = send_yun_code($mobile, $code);
		if ($rc) 
			echo '短信发送成功！';
	    else 
	    	echo '短信发送失败！';
	}

	public function testzodiac () {
		$param = $this->request->param();
		$month = $param['month'];
		$day = $param['day'];
		$name = get_zodiac_sign($month, $day);
		dump($name);
	}

	public function testqrcode() {
		$re = qrcode('http://www.baidu.com', 4);
	}
}