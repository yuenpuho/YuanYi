<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class BankModel
 */
class MappingModel extends Base_Model {

    public function __construct() {
        parent::__construct();
    }

    public function mappingCompany($data) {
        return $this->insert('bank_company_mapping', $data, true);
    }

    public function relieveCompany($condition) {
        return $this->delete('bank_company_mapping', $condition);
    }

    public function mapEemsiiCompany($data, $condition) {
        return $this->update('company', $data, $condition);
    }

    public function mapUser($data) {
        return $this->insert('bank_user_mapping', $data, true);
    }
}