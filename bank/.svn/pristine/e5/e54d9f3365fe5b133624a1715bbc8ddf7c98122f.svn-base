<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class CompanyModel
 * author：hu.yuanpu
 */
class CompanyModel extends Base_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getCompanies($id = 0, $count = false) {
        // 计算银行总数，用于分页
        if ($count) {
            $sql = "SELECT COUNT(*) total FROM `company`";

            return $this->select($sql, null, true);
        }

        // 根据银行ID 获取一条数据，主要用于修改信息
        if ($id) {
            $sql = "SELECT * FROM `company` WHERE cid = ?";

            return $this->select($sql, $id);
        }

        // 获取全部公司数据，主要用于关联贷款的公司时，给用户选择
        $sql = "SELECT * FROM `company`";

        return $this->select($sql);
    }

    public function getCompaniesWithEemsiiCompany($paging = array()) {
        $sql = "SELECT t1.*, t2.shortname eshort, t2.fullname efull FROM `app_dkb`.`company` t1 ";
        $sql .= "LEFT JOIN `app_eemsii`.`company` t2 ON t1.`mapping_cid` = t2.id ORDER BY t1.cid DESC LIMIT ?, ?;";

        $param[] = ($paging['curr'] - 1) * $paging['limit'];
        $param[] = $paging['limit'];

        return $this->select($sql, $param);
    }

    public function add($data) {
        return $this->insert('company', $data);
    }
}