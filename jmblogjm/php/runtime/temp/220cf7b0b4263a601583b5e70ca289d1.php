<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:63:"E:\github\VueThink\php/application/home\view\index\article.html";i:1497506177;s:68:"E:\github\VueThink\php/application/home\view\public\public_head.html";i:1497496791;s:67:"E:\github\VueThink\php/application/home\view\Public\public_nav.html";i:1497506087;s:69:"E:\github\VueThink\php/application/home\view\Public\public_right.html";i:1497342283;s:68:"E:\github\VueThink\php/application/home\view\Public\public_foot.html";i:1497425282;}*/ ?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8"><title>JM</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/public/static/css/bjy.css">
    <link rel="stylesheet" type="text/css" href="/public/static/home/css/index.css">
     <link rel="stylesheet" type="text/css" href="/public/static/css/common.css">
<script src="/public/static/js/jquery-2.0.0.min.js"></script>
<script>
    logoutUrl="<?php echo url('Home/User/logout'); ?>";
</script>
<script src="/public/static/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="/public/static/js/html5shiv.min.js"></script>
<script src="/public/static/js/respond.min.js"></script>
<![endif]-->
<script src="/public/static/pace/pace.min.js"></script>
<script src="/public/static/home/js/index.js"></script>
<!-- 百度页面自动提交开始 -->
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<!-- 百度页面自动提交结束 -->

<!-- 百度统计开始 -->
<!-- 百度统计结束 -->


    <!-- * 引入ickeck的css部分 -->

<link rel="stylesheet" href="/public/static/iCheck-1.0.2/skins/all.css">


    <!-- 引入ickeck的js部分
    * @param string $tag  颜色主题 -->

<script src="/public/static/iCheck-1.0.2/icheck.min.js"></script>
<script>
$(document).ready(function(){
    $('.icheck').iCheck({
        checkboxClass: "icheckbox_square-$color",
        radioClass: "iradio_square-$color",
        increaseArea: "20%"
    });
});
</script>
 </head>
 <body>
   <div class="html-box">
  <link href="/public/static/ueditor1_4_3/third-party/SyntaxHighlighter/shCoreDefault.css" />
  <link rel="canonical" href="{:'/article'.$_GET['aid']" />
  <nav class="navbar navbar-inverse " role="navigation">
	<div class="container-fluid navbar-left ">
		<div class="navbar-header">
			<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
			<a href="#" class="navbar-brand">JM’s BLOG</a>
		</div>
	</div>
	<nav id="bs-navbar" class="collapse navbar-collapse">	
		<ul class="nav navbar-nav navbar-left">
			<li class="active"><a href="/home">首页</a></li>
			<li><a href="#">前端</a></li>
			<li><a href="#">技术</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">生活<b class="caret"></b></a>
				<ul class="dropdown-menu"> 
					<li><a href="#">音乐</a></li>
					<li><a href="#">电影</a></li>
					<li><a href="#">健身</a></li>
					<li><a href="#">鸡汤</a></li>
					<li class="divider"><a href="#">其他</a></li>
				</ul>
			</li>
		</ul>
	<div class="nav-sign">
		<ul class="nav navbar-nav navbar-right" style="margin-right:15px;">
			<li class=""><a href="#">登录</a></li>
			<li><a href="#">注册</a></li>	
		</ul>
	</div>

	</nav>
	
</nav>

 <div class="b-h-70"></div>
  <div id="b-content" class="container">
   <div class="row">
    <div class="col-xs-12 col-md-12 col-lg-8">
     <div class="row b-article">
      <h1 class="col-xs-12 col-md-12 col-lg-12 b-title"><?php echo $article['current']['title']; ?></h1>
      <div class="col-xs-12 col-md-12 col-lg-12">
       <ul class="row b-metadata">
        <li class="col-xs-3 col-md-2 col-lg-2"><i class="fa fa-user"></i> <?php echo $article['current']['author']; ?></li>
        <li class="col-xs-8 col-md-4 col-lg-4"><i class="fa fa-calendar"></i> <?php echo date('Y-m-d H:i:s',$article['current']['addtime']); ?></li>
        <li class="col-xs-3 col-md-2 col-lg-2"><i class="fa fa-list-alt"></i> <a href="<?php echo $article['current']['category']['cid']; ?>"><?php echo $article['current']['category']['cname']; ?></a>
         <?php if(!empty($article['current']['tag'])): endif; ?></li>
        <li class="col-xs-7 col-md-5 col-lg-4 "><i class="fa fa-tags"></i>
         <?php if(is_array($article['current']['tag']) || $article['current']['tag'] instanceof \think\Collection || $article['current']['tag'] instanceof \think\Paginator): $i = 0; $__LIST__ = $article['current']['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
          <a class="b-tag-name" href="{:'tag'.$v['tid']}"><?php echo $v['tname']; ?></a>
         <?php endforeach; endif; else: echo "" ;endif; ?></li>
       </ul>
      </div>
      <div class="col-xs-12 col-md-12 col-lg-12 b-content-word">
        <?php echo $article['current']['content']; ?> 
       <eq name="article['current']['is_original']" value="1">
        <p class="b-h-20"></p>
        <p class="b-copyright"> <?php echo \think\Config::get('COPYRIGHT_WORD'); ?></p>
       </eq>
       <ul class="b-prev-next">
        <li class="b-prev"> 上一篇：
         <empty name="article['prev']"> 
          <span>没有了</span>
          <else /> 
          <a href="<?php echo $article['prev']['url']; ?>"><?php echo $article['prev']['title']; ?></a>
         </empty></li>
        <li class="b-next"> 下一篇：
         <empty name="article['next']"> 
          <span>没有了</span>
          <else /> 
          <a href="<?php echo $article['next']['url']; ?>"><?php echo $article['next']['title']; ?></a>
         </empty></li>
       </ul>
      </div>
     </div>
     <!-- <include file="Public/public_comment" /> -->
    </div>
    <div id="b-public-right" class="col-lg-4 hidden-xs hidden-sm hidden-md">
  <div class="b-tags">
    <h4 class="b-title">热门标签</h4>
    <ul class="b-all-tname">
      <?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $k = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <li class="b-tname">
          <a class="tstyle-<?php echo $tag_i; ?>" href="<?php echo url('Home/Index/tag',array('tid'=>$v['tid'])); ?>" onclick="return recordId('tid',<?php echo $v['tid']; ?>)"><?php echo $v['tname']; ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div class="b-recommend">
    <h4 class="b-title">置顶推荐</h4>
    <p class="b-recommend-p">
      <?php if(is_array($recommend) || $recommend instanceof \think\Collection || $recommend instanceof \think\Paginator): if( count($recommend)==0 ) : echo "" ;else: foreach($recommend as $key=>$v): ?>
        <a class="b-recommend-a" href="<?php echo url('Home/Index/article',array('aid'=>$v['aid'])); ?>" target="_blank">
          <span class="fa fa-th-list b-black"></span><?php echo $v['title']; ?></a>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </p>
  </div>
  <div class="b-link">
    <h4 class="b-title">最新评论</h4>
    <div>
      <?php if(is_array($new_comment) || $new_comment instanceof \think\Collection || $new_comment instanceof \think\Paginator): if( count($new_comment)==0 ) : echo "" ;else: foreach($new_comment as $key=>$v): ?>
        <ul class="b-new-comment <eq name=" key " value="0">
          <img class="b-head-img js-head-img" src="__HOME_IMAGE__/qq_default.jpg" _src="<?php echo $v['head_img']; ?>" alt="<?php echo $v['nickname']; ?>">
          <li class="b-nickname"><?php echo $v['nickname']; ?>
            <span><?php echo $v['date']; ?></span></li>
          <li class="b-nc-article">在
            <a href="<?php echo url('Home/Index/article',array('aid'=>$v['aid'])); ?>" target="_blank"><?php echo $v['title']; ?></a>中评论</li>
          <li class="b-content"><?php echo $v['content']; ?></li></ul>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
  <eq name="show_link" value="1">
    <div class="b-link">
      <h4 class="b-title">友情链接</h4>
      <p>
        <?php if(is_array($links) || $links instanceof \think\Collection || $links instanceof \think\Paginator): if( count($links)==0 ) : echo "" ;else: foreach($links as $k=>$v): ?>
          <a class="b-link-a" href="<?php echo $v[url]; ?>" target="_blank">
            <span class="fa fa-link b-black"></span><?php echo $v['lname']; ?></a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </p>
    </div>
  </eq>
  <div class="b-search">
    <form class="form-inline" role="form" action="<?php echo url('Home/Index/search'); ?>" method="get">
      <input class="b-search-text" type="text" name="search_word">
      <input class="b-search-submit" type="submit" value="全站搜索"></form>
  </div>
</div>
   </div>
  </div>
   <footer id="b-foot" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><ul><li class="text-center"> <a rel="nofollow" href="http://git.oschina.net/shuaibai123/thinkbjy" target="_blank"></a> © 2014-2016 www.mashaobin.com 版权所有</li><li class="text-center"> 联系邮箱：<?php echo \think\Config::get('ADMIN_EMAIL'); ?></li></ul><div class="b-h-20"></div><a class="go-top fa fa-angle-up animated jello" href="javascript:;" onclick="goTop()"></a></footer>
</div>
 </body>
</html>