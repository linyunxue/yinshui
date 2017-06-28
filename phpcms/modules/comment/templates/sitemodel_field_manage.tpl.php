<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');
?>
<div class="subnav">
  <h2 class="title-1 line-x f14 fb blue lh28">评论自定义字段管理</h2>
<div class="content-menu ib-a blue line-x"><a class="add fb" href="?m=comment&c=sitemodel_field&a=add&modelid=<?php echo $modelid?>&menuid=<?php echo $_GET['menuid']?>"><em>添加自定义字段</em></a>
　<a class="on" href="?m=comment&c=sitemodel_field&a=init"><em>字段列表</em></a>
</div></div>
<div class="pad-lr-10">
<form name="myform" action="?m=content&c=sitemodel_field&a=listorder" method="post">
<div class="table-list">
    <table width="100%" cellspacing="0" >
        <thead>
            <tr>
			 <th width="70">ID</th>
            <th width="90">字段名称</th>
			<th width="100">字段标识</th>
			<th width="100">字段类型</th>
            <th width="100">是否必填</th>
			<th >操作</th>
            </tr>
        </thead>
    <tbody class="td-line">
	<?php
	foreach($datas as $r) {
		$tablename = L($r['tablename']);
	?>
    <tr>
		<td align='center' width='70'><?php echo $r['fid']?></td>
		<td width='90'><?php echo $r['f']?></td>
		<td width="100"><?php echo $r['fname']?></td>
		<td width="100" align='center'><?php echo $r['ftype']?></td>
        <td width="100" align='center'><?php echo $r['ismust']==0?"否":"是";?></td>
		<td align='center'><a href="?m=comment&c=sitemodel_field&a=editapl&fid=<?=$r['fid']?>" >修改</a> | <a href="?m=comment&c=sitemodel_field&a=delete&fid=<?=$r['fid']?>" >删除</a></td>
	</tr>
	<?php } ?>
    </tbody>
    </table>
</form>
</div>
</body>
</html>
