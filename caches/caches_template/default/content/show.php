<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--主体内容 开始-->
<div class="article">
  <div id="left">
    <div class="left_title" style='display:none;'>
      <h2>网站导航</h2></div>
    <div class="left_body" style='display:none;'>
      <ul class="subchannellist">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
		<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
		<li class="depth1"><a href="<?php echo $r['url'];?>/index.php?m=content&c=index&a=lists&catid=<?php echo $r['catid'];?>"><?php echo $r['catname'];?></a></li>
		<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
      </ul>
    </div>
	<div class="left_title">
      <h2>评论排行</h2></div>
    <div class="left_body">
	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=9eeaba0a57bcf88c1b4779f4dc232d7a&action=bang&siteid=%24siteid&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('siteid'=>$siteid,)).'9eeaba0a57bcf88c1b4779f4dc232d7a');if(!$data = tpl_cache($tag_cache_name,3600)){$comment_tag = pc_base::load_app_class("comment_tag", "comment");if (method_exists($comment_tag, 'bang')) {$data = $comment_tag->bang(array('siteid'=>$siteid,'limit'=>'20',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
      <ul class="textlist1">
		<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<li>·<a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut($r[title], 40);?></a><span>(<?php echo $r['total'];?>)</span></li>
			<?php $n++;}unset($n); ?>
		</ul>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div>
    <div class="left_bottom"></div>
	
    <div class="left_title">
      <h2>联系我们</h2></div>
    <div class="left_body">
        <div class="contact_wrap">
            <b>地址：</b>福州市西洪路494号
            <br>
            <b>电话：</b>0591-83725471
            <br>
            <b>E-mail：</b>fjncys@163.com
            <br>
            <b>邮政编码：</b>350001
            <br>
            <b>网址：</b>
            <a href="http://www.fjncys.com/" target="_blank" class="WebUrl">http://www.fjncys.com</a>
            <br>
        </div>
    </div>
    <div class="left_bottom"></div>
  </div>
  <div id="right">
    <div class="right_title">
      <!--当前位置 开始-->
      <div id="location">
        <b>当前位置：</b><a href="<?php echo siteurl($siteid);?>">首页</a><span> &gt; </span><?php echo catpos($catid);?> 正文</div>
      <!--当前位置 结束--></div>
    <div class="right_body">
      <div class="InfoTitle">
        <h1><?php echo $title;?></h1></div>
      <div class="info_from_wrap">
        <b>来源：</b><?php echo $copyfrom;?>&nbsp;
        <b>日期：</b><?php echo $inputtime;?>&nbsp;
		</div>
      <div class="InfoContent">
	  <?php echo $content;?>
	  </div>
      <div class="info_previous_next_wrap">
        <div class="Previous">
          <b>上一篇：</b><a href="<?php echo $previous_page['url'];?>"><?php echo $previous_page['title'];?></a></div>
        <div class="Next">
          <b>下一篇：</b>
          <a href="<?php echo $next_page['url'];?>"><?php echo $next_page['title'];?></a>
		  </div>
      </div>
    </div>
    <div class="right_bottom"></div>
  </div>
  <div class="clear"></div>
</div>
<!--主体内容 结束-->
<?php include template("content","footer"); ?>