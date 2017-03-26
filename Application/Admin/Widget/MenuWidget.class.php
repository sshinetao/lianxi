<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/18
 * Time: 17:36
 */
namespace Admin\Widget;

use Think\Controller;

class MenuWidget extends Controller
{
    public function menu()
    {

        layout(false);

        //dump($list);
        $this->display('Menu:menu');
    }
}