<?php

/*
* 计算星座的函数 string get_zodiac_sign(string month, string day)
* 输入：月份，日期
* 输出：星座名称或者错误信息
*/
function get_zodiac_sign($month, $day) {
	// 检查参数有效性
    if ($month < 1 || $month > 12 || $day < 1 || $day > 31)
        return (false);
    // 星座名称以及开始日期
    $signs = array(
	        array( "20" => "水瓶座"),
	        array( "19" => "双鱼座"),
	        array( "21" => "白羊座"),
	        array( "20" => "金牛座"),
	        array( "21" => "双子座"),
	        array( "22" => "巨蟹座"),
	        array( "23" => "狮子座"),
	        array( "23" => "处女座"),
	        array( "23" => "天秤座"),
	        array( "24" => "天蝎座"),
	        array( "22" => "射手座"),
	        array( "22" => "摩羯座")
	    );
   	list($sign_start, $sign_name) = each($signs[(int)$month-1]);
   	if ($day < $sign_start) 
   		list($sign_start, $sign_name) = each($signs[($month - 2 < 0) ? $month = 11 : $month -= 2]);
   	return $sign_name;
}

/**
 * 发送 云之讯 验证码
 * @param  int $mobile 手机号
 * @param  int $code  验证码
 * @return boole      是否发送成功
 */
function send_yun_code($mobile, $code) {
	$config = config('YUN_ZHI_XUN');
	$option = [
        	'accountsid' => $config['YUN_ACCOUNT_SID'],     	// your sid
        	'token' => $config['YUN_ACCOUNT_TOKEN']        // your token
    	];
    $ucpass = new \ucpaas\Ucpaas($option);
    $status = $ucpass->templateSMS($config['YUN_APPID'], $mobile, $config['YUN_TEMPLATE_ID'], $code);
    $arr = json_decode($status, true);
    if ($arr['resp']['respCode'] == 000000)
		return true;
    else
		return false;
}

/**
 * 将路径转换加密
 * @param  string $file_path 路径
 * @return string            转换后的路径
 */
function path_encode($file_path){
    return rawurlencode(base64_encode($file_path));
}

/**
 * 将路径解密
 * @param  string $file_path 加密后的字符串
 * @return string            解密后的路径
 */
function path_decode($file_path){
    return base64_decode(rawurldecode($file_path));
}

/**
 * 根据文件后缀的不同返回不同的结果
 * @param  string $str 需要判断的文件名或者文件的id
 * @return integer     1:图片  2：视频  3：压缩文件  4：文档  5：其他
 */
function file_category($str){
    // 取文件后缀名
    $str=strtolower(pathinfo($str, PATHINFO_EXTENSION));
    // 图片格式
    $images=array('webp','jpg','png','ico','bmp','gif','tif','pcx','tga','bmp','pxc','tiff','jpeg','exif','fpx','svg','psd','cdr','pcd','dxf','ufo','eps','ai','hdri');
    // 视频格式
    $video=array('mp4','avi','3gp','rmvb','gif','wmv','mkv','mpg','vob','mov','flv','swf','mp3','ape','wma','aac','mmf','amr','m4a','m4r','ogg','wav','wavpack');
    // 压缩格式
    $zip=array('rar','zip','tar','cab','uue','jar','iso','z','7-zip','ace','lzh','arj','gzip','bz2','tz');
    // 文档格式
    $document=array('exe','doc','ppt','xls','wps','txt','lrc','wfs','torrent','html','htm','java','js','css','less','php','pdf','pps','host','box','docx','word','perfect','dot','dsf','efe','ini','json','lnk','log','msi','ost','pcs','tmp','xlsb');
    // 匹配不同的结果
    switch ($str) {
        case in_array($str, $images):
            return 1;
            break;
        case in_array($str, $video):
            return 2;
            break;
        case in_array($str, $zip):
            return 3;
            break;
        case in_array($str, $document):
            return 4;
            break;
        default:
            return 5;
            break;
    }
}

/**
 * 生成二维码
 * @param  string  $url  url连接
 * @param  integer $size 尺寸 纯数字
 */
function qrcode($url,$size=4){
    Vendor('Phpqrcode.phpqrcode');
    QRcode::png($url,false,QR_ECLEVEL_L,$size,2,false,0xFFFFFF,0x000000);
}