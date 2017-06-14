<?php
namespace app\home\model;

use think\Model;
use think\Db;
// use page\Page;

class Article extends Model{
	// 设置当前模型对应的完整数据表名称
    protected $table = 'jmblog_article';
    
    // 设置当前模型的数据库连接
    protected $connection = [
        // 数据库类型
        'type'        => 'mysql',
        // 服务器地址
        'hostname'    => '127.0.0.1',
        // 数据库名
        'database'    => 'jmbloge',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => 'root',
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => 'jmblog_',
        // 数据库调试模式
        'debug'       => false,
    ];
     // Db::connect(Config::get('jmbloge'));
	protected $pk = 'aid';

	public function getDataList($cid='all',$tid='all',$is_show=1,$is_delete=0,$limite=10,$page=1){
        if($cid=='all' & $tid=="all"){
            //获取全部分类全部标签下的文章
            if($is_show=='all'){
                $where=array(
                    'is_delete'=>$is_delete,
                    'aid'=>['>','0']
                    );
            }else{
                $where=array(
                        'is_delete'=>$is_delete,
                        'is_show'=>$is_show,
                        'aid'=>['>','0']
                    );
            }
            // $page=new Page($count, $limit);
            $list=$this
                ->where($where)
                ->order('addtime desc')
                // ->limit($limit)
                ->page($page,$limit)
                ->select();
            $extend=array(
                    'type'=>'index',
                    'id'=>0
                );
        }elseif ($cid=='all' && $tid!='all'){
            //获取标签下所有文章
            if($is_show=='all'){
                $where=array(
                    'at.tid'=>$tid,
                    'a.is_delete'=>$is_delete
                    );
            }else{
                $where=array(
                    'at.tid'=>$tid,
                    'a.is_delete'=>$is_delete,
                    'a.is_show'=>$is_show
                    );
            }
            //结果长度
            $count=model('article_tag')
                ->alias('at')
                ->join('__ARTICLE__ a','at.aid=a.aid')
                ->where($where)
                ->count();
            // $page=new Page($count, $limit);
            $list=model('article_tag')
                ->alias('at')
                ->join('__ARTICLE__ a','at.aid=a.aid')
                ->where($where)
                ->order('a.addtime desc')
                ->page($page,$limit)
                ->select();
            $extend=array(
                'type'=>'tid',
                'id'=>$tid
                );
        }elseif ($cid!='all' && $tid=='all'){
            //获取分类下全部文章
            if($is_show=='all'){
                $where=array(
                    'cid'=>$cid,
                    'is_delete'=>$is_delete,
                    );
            }else{
                $where=array(
                    'cid'=>$cid,
                    'is_delete'=>$is_delete,
                    'is_show'=>$is_show
                    );
            }
            $count=$this
                ->where($where)
                ->count();
            // $page=new Page($count, $limit);
            $list=$this
                ->where($where)
                ->order('addtime desc')
                // ->limit($page->firstRow.','.$page->listRows)
                ->page($page,$limit)
                ->select();
            $extend=array(
                'type'=>'cid',
                'id'=>$cid
                );
        }
       
        foreach($list as $k => $v){
            $list[$k][addtime]=word_time($v[addtime]);
            $list[$k][tag]=model('ArticleTag')->getDataByAid($v[aid],'all');
            $list[$k][pic_path]=model('ArticlePic')->getDataByAid($v[aid]);
            $list[$k][category]=current(model('Category')->getDataByCid($v[cid],'cid,cname'));
            //图片文件路径预处理
           $v['content']=preg_ueditor_image_path($v[content]);
           $list[$k]['content']=htmlspecialchars($v['content']);
            // $list[$k]['url']=url('Home/Index/article',array('aid'=>$v['aid']));
            $list[$k]['url']='index/article/'.$v['aid'];
            $list[$k][extend]=$extend;
            // $list[$k][tid]='tid';
            // $list[$k][tname]="tname";
            // $list[$k][count]="count";
            
            $list[$k][head_img]="head_img";
            $list[$k][nickname]="nickname";
            $list[$k][date]="date";
            $list[$k][lname]="lname";
        }
        $data=array(
            'data'=>$list,
            );
        return $data;
		
	}
}