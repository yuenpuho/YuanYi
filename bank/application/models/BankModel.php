<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class BankModel
 * author：hu.yuanpu
 */
class BankModel extends Base_Model {
    use application\traits\Adsorber;

    public function __construct() {
        parent::__construct();
    }

    public function getBanks($id = 0, $count = false) {
        // 计算银行总数，用于分页
        if ($count) {
            $sql = "SELECT COUNT(*) total FROM `bank`";

            return $this->select($sql, null, true);
        }

        $fields = '`bid`, `shortname`, `fullname`';

        // 根据银行ID 获取一条数据，主要用于修改银行信息
        if ($id) {
            $sql = "SELECT $fields FROM `bank` WHERE bid = ?";

            return $this->select($sql, $id, true);
        }

        // 获取全部银行数据，主要用于关联贷款的公司时，给用户选择
        $sql = "SELECT $fields FROM `bank`";

        return $this->select($sql);
    }

    /**
     * 获取银行与关联的贷款公司
     * @param int $bid
     * @return array
     */
    public function getBanksWithCompanies($bid = 0, $paging = array()) {
        $fields = "b.bid, b.shortname, b.fullname, GROUP_CONCAT(c.cid, ':', c.fullname) companies";
        $sql = "SELECT $fields FROM `bank` b LEFT JOIN `bank_company_mapping` m ON b.bid = m.bid";
        $sql .= " LEFT JOIN `company` c ON m.cid = c.cid";

        // 获取银行ID 对应的数据，主要用于解除关联的贷款公司
        if ($bid) {
            $sql .= " WHERE b.bid = ? GROUP BY b.bid;";

            $result = $this->select($sql, $bid);
        } else {
            // 获取分页对应的数据
            $sql .= " GROUP BY b.bid ORDER BY b.bid DESC LIMIT ?, ?;";

            $param[] = ($paging['curr'] - 1) * $paging['limit'];
            $param[] = $paging['limit'];

            $result = $this->select($sql, $param);
        }

        // 对结果集进行处理，符合前端页面显示的规格
        $masterFields = array('bid', 'shortname', 'fullname');
        $dependencyFields = array('cid', 'cname');

        return $this->adsorb($result, 'bid', $masterFields, 'companies', $dependencyFields);
    }

    public function add($data) {
        return $this->insert('bank', $data);
    }

    public function edit($data, $condition) {
        return $this->update('bank', $data, $condition);
    }
}