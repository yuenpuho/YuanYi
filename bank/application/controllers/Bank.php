<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends Base_Controller
{
    public function __construct()
    {
        parent::__construct(0);

        $this->load->model('BankModel', 'bank', true);
    }

    public function index()
    {
        dd([1], [2]);
        $this->view('admin', 0, 0);
    }

    public function bankList()
    {
        $total = $this->bank->getBanks(null, true);

        $paging['curr'] = isset($_POST['curr']) ? intval($_POST['curr']) : 1;
        $paging['limit'] = isset($_POST['limit']) ? intval($_POST['limit']) : 10;

        $result = $this->bank->getBanksWithCompanies(null, $paging);

        if (isset($_POST['curr'], $_POST['limit'])) {
            $this->returnJSON($result);
        }

        $this->data['list'] = $result;
        $this->data['total'] = $total['total'];

        unset($result, $total, $paging, $_POST);

        $this->view('bank/index');
    }

    public function add()
    {
        if (isset($_POST['shortname'], $_POST['fullname']) && !empty($_POST['shortname']) && !empty($_POST['fullname'])) {
            $data = array('shortname' => trim($_POST['shortname']), 'fullname' => trim($_POST['fullname']));

            $result = $this->bank->add($data);

            if ($result) {
                $this->success();
            } else {
                $this->error();
            }
        }

        $this->data['actUrl'] = $this->data['base_url'] . "bank/add/";

        $this->view('bank/add');
    }

    public function edit($id = 0)
    {
        if (!empty($_POST['bid'])) {
            $data = array('shortname' => $_POST['shortname'], 'fullname' => $_POST['fullname']);
            $condition = array('bid' => $_POST['bid']);

            $result = $this->bank->edit($data, $condition);

            if ($result) {
                $this->success();
            } else {
                $this->error();
            }
        }

        $this->data['actUrl'] = $this->data['base_url'] . "bank/edit/";

        $bank = $this->bank->getBanks($id);

        $this->data['bank'] = $bank;

        unset($bank);

        $this->view('bank/add');
    }
}