<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:61:"E:\github\VueThink\php/application/home\view\index\index.html";i:1497428641;s:68:"E:\github\VueThink\php/application/home\view\Public\public_head.html";i:1497427509;s:67:"E:\github\VueThink\php/application/home\view\Public\public_nav.html";i:1497428996;s:70:"E:\github\VueThink\php/application/home\view\Public\public_slider.html";i:1497424244;s:68:"E:\github\VueThink\php/application/home\view\Public\public_list.html";i:1497430211;s:69:"E:\github\VueThink\php/application/home\view\Public\public_right.html";i:1497342283;s:68:"E:\github\VueThink\php/application/home\view\Public\public_foot.html";i:1497425282;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="/public/static/css/jmslider.css">
		<link rel="stylesheet" type="text/css" href="/public/static/home/css/index.css">
		<meta charset="UTF-8"><title>JM</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/public/static/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/static/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/public/static/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/public/static/css/bjy.css">
    
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
			<li class="active"><a href="#">首页</a></li>
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
		<div class="slider" id="slider">
  <div class="slider-inner">
    <div class="item">
      <img class="img" src="/public/static/upload/slide_1.jpg">
    </div>
    <div class="item">
      <img class="img" src="/public/static/upload/slide_2.jpg">
    </div>
    <div class="item">
      <img class="img" src="/public/static/upload/slide_3.jpg">
    </div>
  </div>
</div>
		<div class="b-h-70"></div>
		<div id="b-content" class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-8">
  <div class="note-empty" name="title_word">
    <div class="row b-tag-title">
      <div class="col-xs-12 col-md-12 col-lg-12">
        <h2><?php echo $title_word; ?></h2></div>
    </div>
  </div>
  <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
    <div class="row b-one-article">
      <h3 class="col-xs-12 col-md-12 col-lg-12">
        <a class="b-oa-title" href="<?php echo $v['url']; ?>" target="_blank" onclick="return recordId('<?php echo $v['extend']['type']; ?>',<?php echo $v['extend']['id']; ?>)"><?php echo $v['title']; ?></a></h3>
      <div class="col-xs-12 col-md-12 col-lg-12 b-date">
        <ul class="row">
          <li class="col-xs-2 col-md-2 col-lg-3">
            <i class="fa fa-user"></i><?php echo $v['author']; ?></li>
              <li class="col-xs-3 col-md-3 col-lg-3">
            <i class="fa fa-calendar"></i><?php echo $v['addtime']; ?></li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 hidden-xs">
            <figure class="b-oa-pic b-style1">
              <a href="<?php echo $v['url']; ?>" target="_blank">
                <img src="<?php echo $v['pic_path']; ?>" alt="<?php echo \think\Config::get('IMAGE_TITLE_ALT_WORD'); ?>" title="<?php echo \think\Config::get('IMAGE_TITLE_ALT_WORD'); ?>"></a>
              <figcaption>
                <a href="<?php echo $v['url']; ?>" target="_blank"></a>
              </figcaption>
            </figure>
          </div>
          
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 article-desc">
        <div class="col-xs-12 col-sm-6  col-md-6 col-lg-8 b-des-read"><?php echo $v['description']; ?></div></div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <ul class="row">
        
          <li class="col-xs-5 col-md-2 col-lg-2">
            <i class="fa fa-list-alt"></i>
            <a href="<?php echo url('Home/Index/category',array('cid'=>$v['cid'])); ?>" target="_blank"><?php echo $v['category']['cname']; ?></a>
            <li class="col-xs-7 col-md-5 col-lg-4 ">
              <i class="fa fa-tags"></i>
    
            </li>
        </ul>
      </div>
      <a class=" b-readall" href="<?php echo $v['url']; ?>" target="_blank">阅读全文</a></div>
 <?php endforeach; endif; else: echo "" ;endif; ?>

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
		<div class="row"><footer id="b-foot" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><ul><li class="text-center"> <a rel="nofollow" href="http://git.oschina.net/shuaibai123/thinkbjy" target="_blank"></a> © 2014-2016 www.mashaobin.com 版权所有</li><li class="text-center"> 联系邮箱：<?php echo \think\Config::get('ADMIN_EMAIL'); ?></li></ul><div class="b-h-20"></div><a class="go-top fa fa-angle-up animated jello" href="javascript:;" onclick="goTop()"></a></footer></div>
		<!-- <include file="Public/public_login"/> -->
	</body>
	<script src="/public/static/js/jm-slider.js"></script>
	<script>
		jQuery(document).ready(function($) {
		  $('#slider').Slider();
		});
	</script>
</html>