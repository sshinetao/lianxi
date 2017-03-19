<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/18
 * Time: 17:36
 */
namespace Home\Widget;

use Think\Controller;

class CateWidget extends Controller
{
    public function menu()
    {
        $Category = M("category");
        $list = $Category->order('porder')->select();
        layout(false);
        $this->assign('menu',$list);
        //dump($list);
        $this->display('Cate:menu');
    }
}