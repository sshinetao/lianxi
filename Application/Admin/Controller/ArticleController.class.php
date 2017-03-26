<?php
namespace Admin\Controller;

use Think\Controller;

class ArticleController extends Controller
{


    public function add()
    { $Cate = M("Category");
        $CateList = $Cate->select();
        $this->assign("CateList",$CateList);

        $this->display();
    }

    public function  doAdd(){

        $Article = D("Article"); // 实例化User对象

        if (!$Article->create()){
            // 如果创建失败 表示验证没有通过 输出错误提示信息
           // exit($Article->getError());
            $data['status']  = 0;
            $data['content'] = $Article->getError();
            $this->ajaxReturn($data);
        }else{
            $Article->ctime = NOW_TIME; // 增加register_time属性
            if (false !== $Article->add ()) {
                $data['status']  = 1;
                $this->ajaxReturn($data);
            } else {
                $data['status']  = 0;
                $data['content'] = $Article->getError();
                $this->ajaxReturn($data);
            }

        }
    }

    public function list()
    {
        $this->display();
    }
}
