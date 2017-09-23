<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
namespace app\admin\model;

use app\admin\model\RouteModel;
use think\Model;
use think\Cache;

class TradeCategoryModel extends Model
{
    /**
     * 添加行业
     * @return array 
     */
    public function addCategory($param) {
        $result = true;
        self::startTrans();
        try {
            if (!empty($data['more']['thumbnail'])) {
                $data['more']['thumbnail'] = cmf_asset_relative_url($data['more']['thumbnail']);
            }

            $this->allowField(true)->save($data);
            $id = $this->id;

            self::commit();
        } catch (\Exception $e) {
            self::rollback();
            $result = false;
        }

        if ($result != false) {
            //设置子域名
            $routeModel = new RouteModel();
            if (!empty($data['domain']) && !empty($id)) {
                $routeModel->setRoute($data['domain'], 'portal/List/index', ['id' => $id], 2, 5000);
                $routeModel->setRoute($data['domain'] . '/:id', 'portal/Article/index', ['cid' => $id], 2, 4999);
            }
            $routeModel->getRoutes(true);
        }

        return $result;
    }   
}

