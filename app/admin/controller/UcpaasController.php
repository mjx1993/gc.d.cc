<?php 

namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use ucpaas\Ucpaas;

class UcpaasController extends AdminBaseController
{
	public function send() {
		$mobile = '13726032667';
		$veryify_code = '1e38';
		$config = config('YUN_ZHI_XUN');
		$option = [
        	'accountsid' => $config['YUN_ACCOUNT_SID'],     	// your sid
        	'token' => $config['YUN_ACCOUNT_TOKEN']        // your token
    	];
    	$ucpass = new Ucpaas($option);
    	$status = $ucpass->templateSMS($config['YUN_APPID'], $mobile, $config['YUN_TEMPLATE_ID'], $veryify_code);
    	$arr = json_decode($status, true);
    	if ($arr['resp']['respCode'] == 000000)
			echo "短信发送成功！";
    	else
			echo "短信发送失败！";
	}
}