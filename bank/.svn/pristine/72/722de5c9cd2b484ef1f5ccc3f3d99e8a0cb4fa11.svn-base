<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class User
 */
class User extends Base_Controller {
	public function __construct() {
		parent::__construct(0);

        $this->load->model('BankModel', 'bank', true);
        $this->load->model('UserModel', 'user', true);
	}

    public function index() {
        $total = $this->bank->getBanks(null, true);

        $paging['curr'] = isset($_POST['curr']) ? intval($_POST['curr']) : 1;
        $paging['limit'] = isset($_POST['limit']) ? intval($_POST['limit']) : 10;

        $result = $this->user->getUserWithBanks($paging);

        if (isset($_POST['curr'], $_POST['limit'])) {
            $this->returnJSON($result);
        }

        $this->data['list'] = $result;
        $this->data['total'] = $total['total'];

        unset($result, $total, $paging, $_POST);

        $this->view('user/index');
    }
}