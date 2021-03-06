<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapping extends Base_Controller {

	public function __construct() {
        parent::__construct(0);

        $this->load->model('BankModel', 'bank', true);
        $this->load->model('UserModel', 'user', true);
        $this->load->model('CompanyModel', 'company', true);
        $this->load->model('MappingModel', 'mapping', true);
        $this->load->model('EemsiiCompanyModel', 'eemsiiCompany', true);
    }


	public function mapCompany() {
	    if (isset($_POST['bank']) && !empty($_POST['bank'])) {
	        $data = array();
	        $bid = $_POST['bank'];
	        $cids = $_POST['companies'];

	        foreach ($cids as $cid) {
                $data[] = array('bid' => $bid, 'cid' => $cid);
            }

            $result = $this->mapping->mappingCompany($data);

	        if (count($result)) {
	            $this->success();
            } else {
	            $this->error();
            }
        }

        $this->data['actUrl'] = $this->data['base_url'] . "mapping/mapcompany/";
        $this->data['banks'] = $this->bank->getBanks();
        $this->data['companies'] = $this->company->getCompanies();

        $this->view('bank/map');
    }

    public function relieveCompany($id = 0) {
	    if (empty($id)) {
	        $id = $_POST['bid'];
        }

        $result = $this->bank->getBanksWithCompanies($id);
        $result = $result[$id];

        // 解除关联的公司
        if (!empty($_POST['bid'])) {
            $oldCids = array_column($result['companies'], 'cid');

            $delCids = array_diff($oldCids, $_POST['companies']);

            $result = $this->mapping->relieveCompany(array('bid' => $_POST['bid'], 'cid' => $delCids));

            if ($result) {
                $this->success();
            } else {
                $this->error();
            }
        }

        if (count($result)) {
            $this->data['bank'] = $result;
        }

        $this->data['actUrl'] = $this->data['base_url'] . "mapping/relievecompany/";

        unset($result);

        $this->view('bank/map');
    }

    public function mapEemsiiCompany() {
	    if (isset($_POST['company']) && !empty($_POST['company'])) {
	        $data = array('mapping_cid' => $_POST['eemsiiCompany']);
            $condition = array('cid' => $_POST['company']);

            $result = $this->mapping->mapEemsiiCompany($data, $condition);

            if ($result) {
                $this->success();
            } else {
                $this->error();
            }
        }

        $this->data['actUrl'] = $this->data['base_url'] . "mapping/mapeemsiicompany/";

        $companies = $this->company->getCompanies();
        $eemsiiCompanies = $this->eemsiiCompany->getCompanies();

        $this->data['companies'] = $companies;
        $this->data['eemsiiCompanies'] = $eemsiiCompanies;

        $this->view('company/mapeemsii');
    }

    public function mapUser() {
        if (!empty($_POST['bank'])) {
            $data = array();
            $bid = $_POST['bank'];
            $uids = array_keys($_POST['users']);

            foreach ($uids as $uid) {
                $data[] = array('bid' => $bid, 'uid' => $uid);
            }

            $result = $this->mapping->mapUser($data);

            if (count($result)) {
                $this->success();
            } else {
                $this->error();
            }
        }

        $this->data['banks'] = $this->bank->getBanks();
        $this->data['users'] = $this->user->getUsers();

        $this->data['actUrl'] = $this->data['base_url'] . "mapping/mapuser/";

        $this->view('user/map');
    }
}