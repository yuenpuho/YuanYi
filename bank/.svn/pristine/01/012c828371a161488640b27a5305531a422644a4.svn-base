<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class EemsiiCompanyModel
 */
class EemsiiCompanyModel extends Base_Model {

    public function __construct() {
        parent::__construct('eemsii');
    }

    public function getCompanies($id = 0) {
        $fields = '*';

        if ($id) {
            $sql = "SELECT $fields FROM `company` WHERE cid = ?";

            return $this->select($sql, $id);
        } else {
            $sql = "SELECT $fields FROM `company`";

            return $this->select($sql);
        }
    }
}