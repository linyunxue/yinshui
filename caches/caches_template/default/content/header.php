<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
<link href="./statics/style.css?v=0708" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./statics/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="./statics/common.js"></script>
<script type="text/javascript" src="./statics/jquery.SuperSlide.js"></script>
</head>
  
  <body class="body_index">
    <!--顶部 开始-->
    <div id="top_main">
      <div id="top">
        <div id="top_1"><?php echo $SEO['site_title'];?></div>
        <div id="top_2"></div>
        <div id="top_3">
			<form action="<?php echo APP_PATH;?>index.php" method="get" target="_blank" style="">
				<input type="hidden" name="m" value="search"/>
				<input type="hidden" name="c" value="index"/>
				<input type="hidden" name="a" value="init"/>
				<input type="hidden" name="typeid" value="<?php echo $typeid;?>" id="typeid"/>
				<input type="hidden" name="siteid" value="<?php echo $siteid;?>" id="siteid"/>
				<table class="search_table">
				  <tbody>
					<tr>
					  <th>
						<input type="text" class="form_text1" value="" maxlength="50" name="q" id="q"/></th>
					  <td>
						<input type="submit" value="搜 索" class="form_button btn btn-small1" /></td>
					</tr>
				  </tbody>
				</table>
			</form>
        </div>
      </div>
    </div>
    <!--顶部 结束-->
    <!--Flash幻灯片 开始-->
    <!-- <div id="banner_main"><div id="banner"></div></div>-->
    <!--Flash幻灯片 结束-->
    <!--JS幻灯片 开始-->
    <div id="banner_main">
      <div id="banner">
        <ul class="bannerlist">
          <li style="display: none;">
            <img src="./statics/image/Image5.png"></li>
          <li style="display: block;">
            <img src="./statics/image/Image7.png"></li>
		<li style="display: block;">
            <img src="./statics/image/Image9.png"></li>
        </ul>
      </div>
    </div>
    <script>$('#banner_main').slide({
        titCell: '.hd ul',
        mainCell: '#banner ul',
        autoPlay: true,
        autoPage: true,
        delayTime: 500,
        effect: 'fade'
      });</script>
    <!--JS幻灯片 结束-->
    <!--Logo 开始-->
    <div id="logo_main">
      <div id="logo">
        <!--网站Logo 开始-->
        <div class="WebLogo">
          <a href="/" target="_self">
            <img src="./statics/image/logo.png" title="<?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?>" alt="<?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?>"></a>
        </div>
        <!--网站Logo 结束--></div>
    </div>
    <!--Logo 结束-->
    <?php if(intval($_GET['catid']) === 19 || intval($_GET['ccu']) === 1){$ccu = '&ccu=1';}?>
    <!--导航条 开始-->
    <div id="navigation_main">
      <div id="navigation">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
        <ul class="navigationlist">
          <li class="drop-menu-effect">
            <a href="<?php echo siteurl($siteid);?>" target="_self" class="current">首页</a></li>
			<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
          <li class="drop-menu-effect">
            <a href="<?php echo $r['url'];?><?php if(intval($_GET['catid']) == 19 || intval($_GET['ccu']) == 1){echo $ccu;}?>" target="_self"><?php echo $r['catname'];?></a>
          </li>
		  <?php $n++;}unset($n); ?>
        </ul>
		 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
      </div>
    </div>
    <!--导航条 结束-->
    <script type="text/javascript">(function($) {

      $(function() {
        slidemenu(".drop-menu-effect");
      });
      function slidemenu(_this) {
        $(_this).each(function() {
          var $this = $(this);
          var theMenu = $this.find(".submenu");
          var tarHeight = theMenu.height();
          theMenu.css({
            height: 0
          });
          $this.hover(function() {
            $(this).addClass("hover_menu");
            theMenu.stop().show().animate({
              height: tarHeight
            },
            400);
          },
          function() {
            $(this).removeClass("hover_menu");
            theMenu.stop().animate({
              height: 0
            },
            400,
            function() {
              $(this).css({
                display: "none"
              });
            });
          });
        });
      }</script>
	  
	  