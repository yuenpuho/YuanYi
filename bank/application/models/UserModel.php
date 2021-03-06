<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends Base_Model {
    use application\traits\Adsorber;

    public function __construct() {
        parent::__construct();
    }

    public function getUsers($id = 0, $count = false) {
        // 计算银行总数，用于分页
        if ($count) {
            $sql = "SELECT COUNT(*) total FROM `users`";

            return $this->select($sql, null, true);
        }

        // 根据用户ID 获取一条数据，主要用于修改用户信息
        if ($id) {
            $sql = "SELECT * FROM `users` WHERE id = ?";

            return $this->select($sql, $id);
        }

        // 获取全部用户数据，主要用于开通银行员工权限时，给管理员选择
        $sql = "SELECT * FROM `users`";

        return $this->select($sql);
    }

    public function getUserWithBanks($paging = array()) {
        $fields = "b.bid bid, b.shortname, b.fullname, GROUP_CONCAT(u.userid, ':', u.username, ':', u.valid) users";

        $sql = "SELECT $fields FROM `bank` b LEFT JOIN `bank_user_mapping` m ON b.bid = m.bid";
        $sql .= " LEFT JOIN `users` u ON m.uid = u.userid GROUP BY b.bid ORDER BY b.bid DESC LIMIT ?, ?;";

        $param[] = ($paging['curr'] - 1) * $paging['limit'];
        $param[] = $paging['limit'];

        $result = $this->select($sql, $param);

        // 对结果集进行处理，符合前端页面显示的规格
        $masterFields = array('bid', 'shortname', 'fullname');
        $dependencyFields = array('userid', 'username', 'valid');

        return $this->adsorb($result, 'bid', $masterFields, 'users', $dependencyFields);
    }

    private function merge($data) {
        $temp = array();

        foreach ($data as $item) {
            $temp[$item['bid']]['bid'] = $item['bid'];
            $temp[$item['bid']]['fullname'] = $item['fullname'];

            if (isset($item['userid'])) {
                $temp[$item['bid']]['users'][] = array(
                    'uid' => $item['userid'],
                    'valid' => $item['valid'],
                    'username' => $item['username']
                );
            }
        }

        unset($data);

        return $temp;
    }
}