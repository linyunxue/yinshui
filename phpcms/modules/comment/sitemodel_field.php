<?php

defined('IN_PHPCMS') or exit('No permission resources.');
//模型原型存储路径
define('MODEL_PATH', PC_PATH . 'modules' . DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . 'fields' . DIRECTORY_SEPARATOR);
pc_base::load_app_class('admin', 'admin', 0);
define('CACHE_MODEL_PATH', CACHE_PATH . 'caches_model' . DIRECTORY_SEPARATOR . 'caches_data' . DIRECTORY_SEPARATOR);
pc_base::load_app_func('util');

class sitemodel_field extends admin {

    private $db;

    function __construct() {
        parent::__construct();
        $this->db = pc_base::load_model('comment_plfield_model');
    }

    public function init() {
        $show_header = '';
        $datas = $this->db->select("", '*', 100, 'fid ASC');
        include $this->admin_tpl('sitemodel_field_manage');
    }

    //添加自定义字段
    public function add() {
        $show_header = '';
        if (isset($_POST['dosubmit'])) {
            $add = $_POST['pl'];
            $add[f] = safe_replace($this->RepFieldtextNbsp($add[f]));
            if (empty($add[f])) {
                showmessage("请填写完整信息！");
            }
            //验证字段重复
            $this->public_checkfield($add);
            //添加进comment_plfield数据库表
            $this->db->insert($add);
            //字段类型
            $field = $this->ReturnPlFtype($add);
            //新增字段
            $this->comment_table = pc_base::load_model('comment_table_model');
            $tab = $this->comment_table->select("", "tableid");
            $this->comment_data_db = pc_base::load_model('comment_data_model');
            for ($i = 1; $i <= count($tab); $i++) {
                $this->comment_data_db->table_name($i);
                $this->comment_data_db->query("alter table phpcms_comment_data_" . $i . " add " . $field);
            }
            showmessage("评论自定义字段添加成功！", "?m=comment&c=sitemodel_field&a=init");
        } else {
            include $this->admin_tpl('sitemodel_field_add');
        }
    }

    //删除自定义字段
    public function delete() {
        $fid = intval($_GET['fid']);
        if (empty($fid)) {
            showmessage("参数不完整！");
        }
        $od = $this->db->get_one(array("fid" => $fid));
        if ($od['fid']) {
            $this->comment_table = pc_base::load_model('comment_table_model');
            $tab = $this->comment_table->select("", "tableid");
            $this->comment_data_db = pc_base::load_model('comment_data_model');
            for ($i = 1; $i <= count($tab); $i++) {
                $this->comment_data_db->table_name($i);
                $this->comment_data_db->query("alter table phpcms_comment_data_" . $i . " drop COLUMN `" . $od[f] . "`");
            }
            //更新comment_plfield
            $this->db->delete(array("fid" => $fid));
            showmessage("评论自定义字段删除成功！", "?m=comment&c=sitemodel_field&a=init");
        } else {
            showmessage("要删除的字段不存在！", "?m=comment&c=sitemodel_field&a=init");
        }
    }

    //编辑字段
    public function editapl() {
        $show_header = '';
        $fid = intval($_GET['fid']);
        if (empty($fid)) {
            showmessage("参数不完整！");
        }
        $r = $this->db->get_one(array("fid" => $fid));
        if (isset($_POST['dosubmit'])) {
            $add = $_POST['pl'];
            $add[f] = safe_replace($this->RepFieldtextNbsp($add[f]));
            if (!$add[f] == $r[f]) {
                //验证字段重复
                $this->public_checkfield($add);
            }
            //字段类型
            $field = $this->ReturnPlFtype($add);
            $this->comment_table = pc_base::load_model('comment_table_model');
            $tab = $this->comment_table->select("", "tableid");
            $this->comment_data_db = pc_base::load_model('comment_data_model');
            for ($i = 1; $i <= count($tab); $i++) {
                $this->comment_data_db->table_name($i);
                $this->comment_data_db->query("alter table phpcms_comment_data_" . $i . " change `" . $r[f] . "` " . $field);
            }
            //更新comment_plfield
            $this->db->update($add, array("fid" => $fid));
            showmessage("评论自定义字段编辑成功！", "?m=comment&c=sitemodel_field&a=init");
        } else {
            include $this->admin_tpl('sitemodel_field_edit');
        }
    }

    //返回字段类型
    public function ReturnPlFtype($add) {
        //字段类型
        if ($add[ftype] == "TINYINT" || $add[ftype] == "SMALLINT" || $add[ftype] == "INT" || $add[ftype] == "BIGINT" || $add[ftype] == "FLOAT" || $add[ftype] == "DOUBLE") {
            $def = " default '0'";
        } elseif ($add[ftype] == "VARCHAR") {
            $def = " default ''";
        } else {
            $def = "";
        }
        $type = $add[ftype];
        //VARCHAR
        if ($add[ftype] == 'VARCHAR' && empty($add[flen])) {
            $add[flen] = '255';
        }
        //字段长度
        if ($add[flen]) {
            if ($add[ftype] != "TEXT" && $add[ftype] != "MEDIUMTEXT" && $add[ftype] != "LONGTEXT") {
                $type.="(" . $add[flen] . ")";
            }
        }
        $field = "`" . $add[f] . "` " . $type . " NOT NULL" . $def;
        return $field;
    }

    //替换空格
    public function RepFieldtextNbsp($text) {
        return str_replace(array("\t", '   ', '  '), array('&nbsp; &nbsp; &nbsp; &nbsp; ', '&nbsp; &nbsp;', '&nbsp;&nbsp;'), trim($text));
    }

    /**
     * 检查字段是否存在
     */
    public function public_checkfield($add) {
        if (empty($add[f])) {
            return;
        }
        //检查主表
        $comment = $this->mysqlfields("comment");
        if (array_key_exists($add[f], $comment)) {
            showmessage("该字段已经存在！");
        }
        //检查附表
        $comment_data = $this->mysqlfields("comment_data_1");
        if (array_key_exists($add[f], $comment_data)) {
            showmessage("该字段已经存在！");
        }
    }

    //返回字段
    public function mysqlfields($table) {
        return $this->db->get_fields($table);
    }

}

?>