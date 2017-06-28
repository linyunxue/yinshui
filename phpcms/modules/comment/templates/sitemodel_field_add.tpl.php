<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');?>
<div class="pad_10">
<div class="subnav">
  <h2 class="title-1 line-x f14 fb blue lh28">评论自定义字段管理</h2>
  <div class="content-menu ib-a blue line-x"><a class="add fb" href="?m=comment&c=sitemodel_field&a=add&modelid=<?php echo $modelid?>&menuid=<?php echo $_GET['menuid']?>"><em>添加自定义字段</em></a> 　<a class="on" href="?m=comment&c=sitemodel_field&a=init"><em>字段列表</em></a></div>
  <div class="bk10"></div>
</div>
<form name="myform" id="myform" action="?m=comment&c=sitemodel_field&a=add" method="post">
  <div class="common-form">
    <table width="100%" class="table_form contentWrap">
      <tbody>
        <tr>
          <th><strong>字段类型</strong><br></th>
          <td><select name="pl[ftype]" id="formtype">
              <option value="VARCHAR">字符型0-255字节(VARCHAR)</option>
              <option value="TEXT">小型字符型(TEXT)</option>
              <option value="MEDIUMTEXT">中型字符型(MEDIUMTEXT)</option>
              <option value="LONGTEXT">大型字符型(LONGTEXT)</option>
              <option value="TINYINT">小数值型(TINYINT)</option>
              <option value="SMALLINT">中数值型(SMALLINT)</option>
              <option value="INT">大数值型(INT)</option>
              <option value="BIGINT">超大数值型(BIGINT)</option>
              <option value="FLOAT">数值浮点型(FLOAT)</option>
              <option value="DOUBLE">数值双精度型(DOUBLE)</option>
            </select>
            <div id="formtypeTip" class="onShow">请选择字段类型</div></td>
        </tr>
        <tr>
          <th><strong>字段长度</strong><br></th>
          <td><input name="pl[flen]" type="text" id="flen" value="" size="6">
            <div id="formtypeTip" class="onShow">请输入字段长度</div></td>
        </tr>
        <tr>
          <th><strong>是否必填项</strong></th>
          <td><input type="radio" name="pl[ismust]" value="1">
            是
            <input type="radio" name="pl[ismust]" value="0" checked="">
            否</td>
        </tr>
        <tr>
          <th width="25%"><font color="red">*</font> <strong>字段名</strong><br>
            只能由英文字母、数字和下划线组成，并且仅能字母开头，不以下划线结尾 </th>
          <td><input name="pl[f]" type="text" id="f" value="">
            <div id="fieldTip" class="onShow">请输入字段名</div></td>
        </tr>
        <tr>
          <th><font color="red">*</font> <strong>字段标识</strong><br>
            例如：文章标题</th>
          <td><input name="pl[fname]" type="text" id="fname" value="">
            <div id="nameTip" class="onShow">请输入标识</div></td>
        </tr>
        <tr>
          <th><strong>字段提示</strong><br>
            显示在字段别名下方作为表单输入提示</th>
          <td><textarea name="pl[fzs]" rows="2" cols="20" id="tips" style="height:40px; width:80%"></textarea></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="bk15"></div>
  <div class="btn"><input name="dosubmit" type="submit" value="提交" class="button"></div>
</form>
</body>
</html>