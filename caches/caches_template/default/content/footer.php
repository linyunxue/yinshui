<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
				<!-- 底部版权 开始-->
				<div id="copyright_main">

				<div id="link_main "><div id="link "><div class="link_title "><h2>友情链接</h2></div><div class="link_body ">
				
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=cc97f7b186ba43caa83296094c9dbe2a&action=type_list&siteid=1&order=listorder+DESC&num=10&return=dat\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'type_list')) {$dat = $link_tag->type_list(array('siteid'=>'1','order'=>'listorder DESC','limit'=>'10',));}?>
<?php $n=1;if(is_array($dat)) foreach($dat AS $v) { ?>
<a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['name'];?></a>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				
				</div></div>
				
				</div><!-- 友情链接 结束-->
				<div id="copyright" style='clear:both;'>
				<div class="bottom_info"><b><a href="/" target="_self "><?php echo $SEO['site_title'];?></a>&nbsp;</b>
                    <b>主办单位：</b>福建省农村饮水安全中心&nbsp;
                    <b><a href="http://www.miitbeian.gov.cn/" target="_blank">闽ICP备15000974-1</a>&nbsp;
				<script language="javascript" type="text/javascript" src="http://js.users.51.la/18916479.js"></script>
<noscript><a href="http://www.51.la/?18916479" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="http://img.users.51.la/18916479.asp" style="border:none" /></a></noscript>
				</div>
				</div>
				</div>
				
				
				<!--返回顶部start-->
				<script type="text/javascript " src="./statics/common(1).js "></script>
				<script>
					scrolltotop.controlattrs={offsetx:20, offsety:150};
					scrolltotop.controlHTML = '<img src="./statics/image/12.gif" />';
					scrolltotop.anchorkeyword = '#gotop';
					scrolltotop.title = '回顶部';
					scrolltotop.init();
                </script><!--返回顶部end-->

                <!-- 底部版权 结束-->
                <div id="topcontrol" title="回顶部" style="position: fixed; bottom: 150px; right: 20px; opacity: 0; cursor: pointer;">
                  <img src="./statics/image/12.gif"></div>
                <div class="SonlineBox" id="SonlineBox" style="top: 180px; position: absolute; left: 0px; width: 164px; height: 321px;">
                  <div class="openTrigger" style="display: none; left: 0px;" title=""></div>

                </div>
  </body>

</html>