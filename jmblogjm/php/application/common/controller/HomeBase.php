<?php
namespace app\common\controller;

use think\Controller;

use app\home\model\Article;
use app\home\model\Comment;
use app\home\model\Category;
use app\home\model\Tag;
/**
 * 前台基类Controller
 */
class HomeBase extends Controller{
    /**
     * 初始化方法
     */
    public function _initialize(){
        parent::_initialize();
        // 判断博客是否关闭
        // if(config('WEB_STATUS')!=1){
        //     $this->display('Public/web_close');
        //     exit();
        // }
        // 组合置顶推荐where
        $recommend_map=array(
            'is_show'=>1,
            'is_delete'=>0,
            'is_top'=>1
            );
        // 获取置顶推荐文章
        $recommend=model('Article')
            ->where($recommend_map)
            ->order('aid desc')
            ->select();
        // 获取最新评论
        // $new_comment=model('Comment')->getNewComment();
        // 判断是否显示友情链接
        $show_link=MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME=='Home/Index/index' ? 1 : 0;
        // 分配常用数据
        $assign=array(
            'categorys'=>model('Category')->getAllData(),
             'tags'=>model('Tag')->getAllData(),
            // 'links'=>model('application/home/model/Link')->getDataByState(0,1),
            'recommend'=>$recommend,
            // 'new_comment'=>$new_comment,
             'show_link'=>$show_link
            );
        // $categorys=model('Category')->getAllData();
        // $this->assign('homebase'$assign);
        $this->assign('categorys',model('Category')->getAllData());
        $this->assign('tags',model('Tag')->getAllData());
        $this->assign('recommend',$recommend);
        $this->assign('show_link',$show_link);
        // return $assign;
    }




}

