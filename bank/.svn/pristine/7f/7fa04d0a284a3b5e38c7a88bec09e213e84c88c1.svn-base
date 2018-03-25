<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends Base_Controller {

	public function __construct() {
        parent::__construct(0);

        $this->load->model('CompanyModel', 'company', true);
    }


	public function index(){
        $total = $this->company->getCompanies(null, true);

        $paging['curr'] = isset($_POST['curr']) ? intval($_POST['curr']) : 1;
        $paging['limit'] = isset($_POST['limit']) ? intval($_POST['limit']) : 10;

        $result = $this->company->getCompaniesWithEemsiiCompany($paging);

        if (isset($_POST['curr'], $_POST['limit'])) {
            $this->returnJSON($result);
        }

        $this->data['list'] = $result;
        $this->data['total'] = $total['total'];

        unset($result, $total, $paging, $_POST);

		$this->view('company/index');
	}

	public function add() {
        $this->data['actUrl'] = $this->data['base_url'] . "company/add/";

        if (isset($_POST['shortname'], $_POST['fullname']) && !empty($_POST['shortname']) && !empty($_POST['fullname'])) {
            $_POST['operating_period'] = $_POST['from'].' 至 '.$_POST['to'];
            unset($_POST['from'], $_POST['to']);

            $result = $this->company->add($_POST);

            if ($result) {
                $this->success();
            } else{
                $this->error();
            }
        }

        $this->view('company/add');
    }

    public function edit($id = 0) {
        if (!empty($_POST['cid'])) {
            $this->success($_POST['fullname']);
        }

        $this->data['actUrl'] = $this->data['base_url'] . "company/edit/";

        $company = $this->company->getCompanies($id);
        $company = $company[0];

        preg_match_all("/(\d{4}-\d{2}-\d{2})/", $company['operating_period'], $matches);
        $company['from'] = $matches[0][0];
        $company['to'] = $matches[0][1];

        $this->data['company'] = $company;

        unset($company);

        $this->view('company/add');
    }
}
