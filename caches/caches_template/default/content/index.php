<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>  <?php include template("content","header"); ?>
  <?php if(intval($_GET['catid']) === 19){$ccu = '&ccu=1';}?>
    <!--主体内容 开始-->
    <div class="index">
      <div class="index_1">
        <div class="index_1_1">
          <div class="left_title1">
            <span class="more1">
              <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['10']['catid'];?><?php echo $ccu;?>" target="_blank">更多&gt;&gt;</a></span>
            <h2><?php echo $CATEGORYS['10']['catname'];?></h2></div>
          <div class="left_body1">
            <div class="left_body1_1 slideBox">

                <div class="hd">
                    <ul>
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3431329f40ccac39edabaae88935c5f3&action=position&posid=1&thumb=1&order=listorder+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'1','thumb'=>'1','order'=>'listorder DESC','limit'=>'5',));}?>
                        <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
                        <?php $num++?>
                        <li><?php echo $num;?></li>
                        <?php $n++;}unset($n); ?>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </ul>
                </div>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3431329f40ccac39edabaae88935c5f3&action=position&posid=1&thumb=1&order=listorder+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'1','thumb'=>'1','order'=>'listorder DESC','limit'=>'5',));}?>
                <div class="bd">
                <ul class="content news-photo picbig">
             <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            	<li>
                    <div class="img-wrap">
                        <a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><img src="<?php echo thumb($r[thumb],210,0);?>" style="width:280px;height:200px;" title="<?php echo $r['title'];?>"/></a>
                    </div>
                    <a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title],20);?></a>
                </li>
                <?php $n++;}unset($n); ?>
                </ul>
                </div>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</div>
              <style type="text/css">
                  .slideBox{ width:280px; height:200px; overflow:hidden; position:relative; border:1px solid #ddd;  }
                  .slideBox .hd{ height:15px; overflow:hidden; position:absolute; right:5px; bottom:5px; z-index:1; }
                  .slideBox .hd ul{ overflow:hidden; zoom:1; float:left;  }
                  .slideBox .hd ul li{ float:left; margin-right:2px;  width:15px; height:15px; line-height:14px; text-align:center; background:#fff; cursor:pointer; }
                  .slideBox .hd ul li.on{ background:#f00; color:#fff; }
                  .slideBox .bd{ position:relative; height:100%; z-index:0;   }
                  .slideBox .bd li{ zoom:1; vertical-align:middle; }
                  .slideBox .bd img{ width:450px; height:230px; display:block;  }

                  /* 下面是前/后按钮代码，如果不需要删除即可 */
                  .slideBox .prev,
                  .slideBox .next{ position:absolute; left:3%; top:50%; margin-top:-25px; display:block; width:32px; height:40px; background:url(../images/slider-arrow.png) -110px 5px no-repeat; filter:alpha(opacity=50);opacity:0.5;   }
                  .slideBox .next{ left:auto; right:3%; background-position:8px 5px; }
                  .slideBox .prev:hover,
                  .slideBox .next:hover{ filter:alpha(opacity=100);opacity:1;  }
                  .slideBox .prevStop{ display:none;  }
                  .slideBox .nextStop{ display:none;  }

              </style>
              <script id="jsID" type="text/javascript">
                  var ary = location.href.split("&");
                  $(".slideBox").slide( { mainCell:".bd ul", effect:ary[1],autoPlay:ary[2],trigger:ary[3],easing:ary[4],delayTime:ary[5],mouseOverStop:ary[6],pnLoop:ary[7],autoPlay:true });
              </script>

			<div class="left_body1_2">
				<ul class="textlist ">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=d9da4e58392a315b1b4979b823638d0f&sql=SELECT+%2A+FROM+sd_news+ORDER+BY+updatetime+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM sd_news ORDER BY updatetime DESC LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
					<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
                    <?php if($key<=7) { ?>
					<li>
						<span class="float_right "><?php echo date('Y-m-d',$val[updatetime]);?></span>
						<a href="<?php echo $val['url'];?>" title="<?php echo $val['title'];?>" <?php echo title_style($val[style]);?>><?php echo str_cut($val['title'],80,'');?></a>
					</li>
                    <?php } ?>
					<?php $n++;}unset($n); ?>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</ul>
			</div>
		</div>
				<div class="left_bottom1 ">
				</div></div>
				<div class="index_1_2 ">
				
				<div class="left_title3 ">
				<span class="more1 "><a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['19']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span><h2><?php echo $CATEGORYS['19']['catname'];?></h2>
				</div>
				<div class="left_body3 ">
				<ul class="textlist ">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=9d266e3d38ef45a2e09270420361d9fa&action=lists&catid=19&order=updatetime+DESC&num=10\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'19','order'=>'updatetime DESC','limit'=>'10',));}?>
				<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
				<li><span class="float_right "><?php echo date('Y-m-d',$val[updatetime]);?></span><a href="<?php echo $val['url'];?>" target="_blank " title="<?php echo $val['title'];?> "><?php echo str_cut($val['title'],60,'');?></a></li>
				<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</ul>
				</div>
				<div class="left_bottom3 "></div>
				</div>
				
				
				</div>
				
				<div class="clear "></div>
				
<div class="index_2 ">
  <div class="index_2_1 ">
    <!--社区介绍 开始-->
    <div class="left_title4 ">
      <span class="more ">
        <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['17']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
      <h2><?php echo $CATEGORYS['17']['catname'];?></h2></div>
    <div class="left_body4 ">
      <ul class="textlist ">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=63317b59581990fa532ffb63ce78a3a8&action=lists&catid=17&order=updatetime+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'17','order'=>'updatetime DESC','limit'=>'5',));}?>
		<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        <li><a href="<?php echo $val['url'];?>" target="_blank " title="<?php echo $val['title'];?>"><?php echo str_cut($val['title'],30,'');?></a></li>
		<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
    <div class="left_bottom4 "></div>
    <!--社区介绍 结束-->
	
	    <!--社区介绍1111 开始-->
    <div class="left_title4 ">
      <span class="more ">
        <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['18']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
      <h2><?php echo $CATEGORYS['18']['catname'];?></h2></div>
    <div class="left_body4 ">
      <ul class="textlist ">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=31a843e371d30565cb1969aadf50baaf&action=lists&catid=18&order=updatetime+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'18','order'=>'updatetime DESC','limit'=>'5',));}?>
		<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        <li><a href="<?php echo $val['url'];?>" target="_blank " title="<?php echo $val['title'];?>"><?php echo str_cut($val['title'],30,'');?></a></li>
		<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
    <div class="left_bottom4 "></div>
    <!--社区介绍111 结束-->
	
	<!--社区介绍333 开始-->
    <div class="left_title4 ">
      <span class="more ">
        <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['25']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
      <h2><?php echo $CATEGORYS['25']['catname'];?></h2></div>
    <div class="left_body4 ">
      <ul class="textlist ">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=592a20c7c46168571539e1a683bc8486&action=lists&catid=25&order=updatetime+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'25','order'=>'updatetime DESC','limit'=>'5',));}?>
		<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        <li><a href="<?php echo $val['url'];?>" target="_blank " title="<?php echo $val['title'];?>"><?php echo str_cut($val['title'],30,'');?></a></li>
		<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
    <div class="left_bottom4 "></div>
    <!--社区介绍333 结束-->
	
    <!--网上互动 开始-->
    <div class="left_title5 ">
      <span class="more ">
        <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['21']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
      <h2><?php echo $CATEGORYS['21']['catname'];?></h2></div>
    <div class="left_body5 ">
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
      <a href="/guestbook.html " target="_blank ">
        <img src="./statics/image/hd_1.jpg " title=" " alt=" "></a>
    </div>
    <!--网上互动 结束-->
	</div>
  <div class="index_2_2 ">
    <!--14 开始-->
    <div class="index_2_2_1 ">
      <div class="left_title6 ">
        <span class="more ">
          <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['12']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
        <h2><?php echo $CATEGORYS['12']['catname'];?></h2></div>
      <div class="left_body6 ">
        <ul class="textlist ">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=9a139e209363a8c998f62f1e44929222&action=lists&catid=12&order=updatetime+DESC&num=6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'12','order'=>'updatetime DESC','limit'=>'6',));}?>
		<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
          <li>
            <span class="float_right "><?php echo date('Y-m-d',$val[updatetime]);?></span>
            <a href="<?php echo $val['url'];?>" target="_blank " title="<?php echo str_cut($val['title'],60,'');?> "><?php echo str_cut($val['title'],60,'');?></a></li></li>
		<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
      </div>
      <div class="left_bottom6 "></div>
    </div>
    <!--14 结束-->
    <!--15 开始-->
    <div class="index_2_2_2 ">
      <div class="left_title6 ">
        <span class="more ">
          <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['15']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
        <h2><?php echo $CATEGORYS['15']['catname'];?></h2></div>
      <div class="left_body6 ">
        <ul class="textlist ">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=e15364766423bd480f1637b3fea22a89&action=lists&catid=15&order=updatetime+DESC&num=6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'15','order'=>'updatetime DESC','limit'=>'6',));}?>
		<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
          <li>
            <span class="float_right "><?php echo date('Y-m-d',$val[updatetime]);?></span>
            <a href="<?php echo $val['url'];?>" target="_blank " title="<?php echo str_cut($val['title'],60,'');?> "><?php echo str_cut($val['title'],60,'');?></a></li></li>
			<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
      </div>
      <div class="left_bottom6 "></div>
    </div>
    <!--15 结束-->
    <!--社区动态 开始-->
    <div class="index_2_2_3 ">
      <div class="left_title7 ">
        <span class="more ">
          <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['22']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
        <h2><?php echo $CATEGORYS['22']['catname'];?></h2></div>
      <div class="left_body7 ">
        <ul class="textlist ">
          <!--循环开始-->
		  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=217f6df2268fe47dd6a2ad42843e9d02&action=lists&catid=22&order=updatetime+DESC&num=10\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'22','order'=>'updatetime DESC','limit'=>'10',));}?>
		<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
          <li>
            <span class="float_right "><?php echo date('Y-m-d',$val[updatetime]);?></span>
            <a href="<?php echo $val['url'];?>" target="_blank " title="<?php echo str_cut($val['title'],60,'');?>"><?php echo str_cut($val['title'],60,'');?></a></li>
			<?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</ul>
      </div>
      <div class="left_bottom7 "></div>
    </div>
    <!--社区动态 结束-->
    <!--城市投建 开始-->
    <div class="index_2_2_4 ">
      <div class="left_title7 ">
        <span class="more ">
          <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['14']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
        <h2><?php echo $CATEGORYS['14']['catname'];?></h2></div>
      <div class="left_body7 ">
        <ul class="textlist ">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b42c605ecc3dded3e29baa5c70871284&action=lists&catid=14&order=updatetime+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'14','order'=>'updatetime DESC','limit'=>'5',));}?>
		<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
          <li>
            <span class="float_right "><?php echo date('Y-m-d',$val[updatetime]);?></span>
            <a href="<?php echo $val['url'];?>" target="_blank " title="<?php echo str_cut($val['title'],60,'');?> "><?php echo str_cut($val['title'],60,'');?></a></li>
          <?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</ul>
      </div>
      <div class="left_bottom7 "></div>
    </div>
    <!--城市投建 结束-->
    <div class="index_2_2_5 " style='display:block;'>
      <a href="/">
        <img src="./statics/image/ad01.png"></a>
      <div class="left_bottom7 "></div>
    </div>

    <div class="index_2_2_6 " style='display:none;'>
      <div class="left_title7 ">
        <span class="more ">
          <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['13']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
        <h2><?php echo $CATEGORYS['13']['catname'];?></h2></div>
      <div class="left_body7 ">
        <ul class="textlist ">
          <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39548848fc93123fe031a1e40885e750&action=lists&catid=13&order=updatetime+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'13','order'=>'updatetime DESC','limit'=>'5',));}?>
		<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
          <li>
            <span class="float_right "><?php echo date('Y-m-d',$val[updatetime]);?></span>
            <a href="<?php echo $val['url'];?>" target="_blank " title="<?php echo str_cut($val['title'],60,'');?>"><?php echo str_cut($val['title'],60,'');?></a></li>
           <?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</ul>
      </div>
    </div>

	
    <div class="index_2_2_3 ">
      <div class="left_title7 ">
        <span class="more ">
          <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['16']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
        <h2><?php echo $CATEGORYS['16']['catname'];?></h2></div>
      <div class="left_body7 ">
        <ul class="textlist ">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f5b90151604c258cf917f6b33f585316&action=category&catid=16&num=5&siteid=%24siteid&order=listorder+ASC&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data2 = $content_tag->category(array('catid'=>'16','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'5',));}?>
            <?php $n=1; if(is_array($data2)) foreach($data2 AS $key => $v) { ?><!--子栏目循环开始-->
            <li><a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $v['catid'];?><?php echo $ccu;?>"><?php echo $v['catname'];?></a></li>
            <?php $n++;}unset($n); ?><!--子栏目循环结束-->
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</ul>
      </div>
      <div class="left_bottom7 "></div>
    </div>

    <div class="index_2_2_4 ">
      <div class="left_title7 ">
        <span class="more ">
          <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['13']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
        <h2><?php echo $CATEGORYS['13']['catname'];?></h2></div>
      <div class="left_body7 ">
        <ul class="textlist ">
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39548848fc93123fe031a1e40885e750&action=lists&catid=13&order=updatetime+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'13','order'=>'updatetime DESC','limit'=>'5',));}?>
		<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
          <li>
            <span class="float_right "><?php echo date('Y-m-d',$val[updatetime]);?></span>
            <a href="<?php echo $val['url'];?>" target="_blank " title="<?php echo str_cut($val['title'],60,'');?> "><?php echo str_cut($val['title'],60,'');?></a></li>
          <?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		</ul>
      </div>
      <div class="left_bottom7 "></div>
    </div>
	
	<div style='clear:both;'></div>
    <div class="index_2_2_7 product">
      <div class="left_title7 ">
        <span class="more ">
          <a href="/index.php?m=content&c=index&a=lists&catid=<?php echo $CATEGORYS['20']['catid'];?><?php echo $ccu;?>" target="_blank ">更多&gt;&gt;</a></span>
        <h2><?php echo $CATEGORYS['20']['catname'];?></h2></div>
      <div class="left_body7 ">
        <ul class="textlist ">
 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=be86e19b385a770b0578181ec8c55ab1&action=lists&catid=20&order=updatetime+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'20','order'=>'updatetime DESC','limit'=>'5',));}?>
		<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
          <li>
            <span class="float_right "><?php echo date('Y-m-d',$val[updatetime]);?></span>
            <a href="<?php echo $val['url'];?>" target="_blank " title="<?php echo str_cut($val['title'],60,'');?> "><?php echo str_cut($val['title'],60,'');?></a></li>
 <?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		  </ul>
      </div>
	  <div class="left_bottom7 "></div>
    </div>
	
	</div>
</div>

<div class="clear "></div></div>
<!--主体内容 结束-->
<?php include template("content","footer"); ?>
