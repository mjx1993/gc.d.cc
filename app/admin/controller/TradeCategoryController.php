<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use app\admin\model\TradeCategoryModel;

use think\Db;
use think\Validate;
use tree\Tree;

class TradeCategoryController extends AdminBaseController
{
    public function _initialize() {
        parent::_initialize();
        $this->model = new TradeCategoryModel();
    }

    /**
     * 行业列表
     * @return array 
     */
    public function index() {
        return $this->fetch();
    }

    public function add() {
        return $this->fetch();
    }

    /**
     * 添加行业
     * @return array 
     */
    public function addPost() {
        if ($this->request->isPost()) {
            $data = $this->request->param();
            $this->valiPost($data);
            

            $tradeCategoryModel = new TradeCategoryModel();
            $result = $tradeCategoryModel->addCategory($data);
        }
    }

    /**
     * [valiPost 验证表单提交]
     * @param  [array] $data  [提交的表单数据]
     * @return [string||bool] [返回验证结果]
     */
    protected function valiPost($data){
        $validate = new Validate([
            'name'  => function($value,$rule){
                if(empty(trim($value))){
                    return '行业名称不能为空!';
                }
                $where = ['name' => $value];
                if(isset($rule['id'])){
                    $where['id'] = ['neq',$rule['id']];
                }
                if($this->model->where($where)->value('id')){
                    return '行业名称已存在';
                }
                return true;
            },

        ]);
        if (!$validate->check($data)) {
            $this->error($validate->getError());
        }
    }
}
