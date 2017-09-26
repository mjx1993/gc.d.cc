<?php
namespace app\admin\service;

use think\Db;
use QcloudApi\QcloudApi;

class QVideoService
{
	// protected $QcloudApi;

	/*public function _initialize() {
		$QcloudApi = new QcloudApi();
		$vod = $QcloudApi::load($QcloudApi::MODULE_VOD, config('QCLOUD_CONFIG'));
	}*/

	/**
	 * 获取视频信息
	 * @param  string $fileId 视频ID
	 * @param  COMMON_PARAMS  公共参数
	 * @return array 
	 */
	function GetVideoInfo($fileId) {
		$QcloudApi = new QcloudApi();
		$vod = $QcloudApi::load($QcloudApi::MODULE_VOD, config('QCLOUD_CONFIG'));
		//参数
		$package = array(
			'fileId' => $fileId
		);
		$a = $vod->DescribeVodPlayUrls($package);
		if ($a === false) {
			$error = $vod->getError();
			return $error->getError();
		}else 
			return $a;
	}

	/**
	 * 根据视频名称前缀搜索视频，并返回其播放信息列表
	 * @param  string $fileName 视频名称（前缀匹配）
	 * @param Integer pageNo   页号
	 * @param Integer pageSize	分页大小
	 * @param  COMMON_PARAMS  公共参数
	 * @return array 
	 */
	function GetVideoDescribe($fileName, $pageNo='', $pageSize='') {
		$QcloudApi = new QcloudApi();
		$vod = $QcloudApi::load($QcloudApi::MODULE_VOD, config('QCLOUD_CONFIG'));
		//参数
		$package = array(
			'fileName' => $fileName
		);
		$a = $vod->DescribeVodPlayInfo($package);
		if ($a === false) {
			$error = $vod->getError();
			return $error->getError();
		}else 
			return $a;
	}

	/**
	 * 删除视频
	 * @param  string $fileId 视频ID
	 * @param  priority  可填0；优先级0:中 1：高 2：低
	 * @param  COMMON_PARAMS  公共参数
	 * @return array 
	 */
	function DeleteVideo($fileId) {
		$QcloudApi = new \QcloudApi();
		$vod = $QcloudApi::load($QcloudApi::MODULE_VOD, config('QCLOUD_CONFIG'));
		//参数
		foreach($_GET["fileIds"] as $fileid){
			$package = array(
				'fileId' => $fileid,
				'priority' => 0
			);
			$a = $vod->DeleteVodFile($package);
			if($a === false)
				break;
		}
		if ($a === false) {
			$error = $vod->getError();
			$this->ajaxReturn($error->getError());
		} else {
			$videoinfo['code'] = 0;
			$videoinfo['message'] = "";
			$this->ajaxReturn($videoinfo);
		}		
	}

}