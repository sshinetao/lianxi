<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $Article = M("Article");

        //top10
        $top10List = $Article->order('ctime desc')->limit(10)->select();
        $this->assign("top10List", $top10List);
//dump($top10List);
        //rand10
        $rand10List = $Article->order(' rand() ')->limit(10)->select();
        $this->assign("rand10List", $rand10List);
        // dump($rand10List);
        $this->display();
    }

    public function article()
    {
        $aid = $_GET['aid'];
        if (!$aid) {
            $this->error('文章不存在', __CONTROLLER__);
        }


        $Article = M("Article");
        $list = $Article->where('id=' . $aid)->find();

        $Category = M("Category");
        $cate = $Category->where('id=' . $list['cid'])->find();


        $prevId = $Article->where('id <' . $aid)->order('porder desc')->limit(1)->field('id')->find();
        $nextId = $Article->where('id >' . $aid)->order('porder')->limit(1)->field('id')->find();
        $prevPage = $prevId['id'] != '' ? '<li class="am-pagination-prev"><a href="' . __CONTROLLER__ . '/article/aid/' . $prevId['id'] . '.html">&laquo; 上一篇</a></li>' : '';
        $nextPage = $nextId['id'] != '' ? '<li class="am-pagination-next"><a href="' . __CONTROLLER__ . '/article/aid/' . $nextId['id'] . '.html">下一篇 &raquo;</a></li>' : '';

        $page = $prevPage . $nextPage;

        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->assign('category', $cate);

        //dump($list);
        $this->display();
    }

    public function category()
    {
        $cid = $_GET['cid'];
        if (!$cid) {
            $this->error('分类不存在', __CONTROLLER__);
        }
        $Category = M("Category");
        $cate = $Category->where('id=' . $cid)->find();
        $cateName = $cate['name'];

        //文章列表
        $Article = M("Article");
        $count = $Article->where('cid=' . $cid)->count();// 查询满足要求的总记录数
        $p = new \Think\Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $p->setConfig('header', '<br><li class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $p->setConfig('last', '末页');
        $p->setConfig('first', '首页');
        $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $p->lastSuffix = true;//最后一页不显示为总页数
        $show = $p->show();// 分页显示输出
        $list = $Article->where('cid=' . $cid)->order('porder')->limit($p->firstRow . ',' . $p->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('cateName', $cateName);
        $this->assign('page', $show);// 赋值分页输出


        $this->display(); // 输出模板
    }
}