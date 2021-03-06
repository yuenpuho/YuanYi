<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 控制器的基类，防止公共方法
 * Class Base_Controller
 */
class Base_Controller extends CI_Controller {
    /**
     * 存储在前端页面展示的变量值
     * @var
     */
	public $data;

    public function __construct($checkLogin = true) {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');

        $this->data['currAction'] = $this->uri->segment(2, '');
        $this->data['currController'] = $this->uri->segment(1, '');
        $this->data['base_url'] = $this->config->item('base_url'); // 主题所在 URL
        $this->data['theme_url'] = $this->data['base_url'] . 'application/views/' . THEME;

        if ($checkLogin) {
            $this->isLogin();
        }
    }

    protected function isLogin() {
        $this->load->library('session');

        if ($this->session->logined != 1) {
            redirect('user/login/');
        }
    }

    protected function view($filename, $withHeader = 1, $withFooter = 1) {
        if ($withHeader) {
            $this->load->view(THEME . '/' . 'header', $this->data);
        }

        $this->load->view(THEME . '/' . $filename, $this->data);

        if ($withFooter) {
            $this->load->view(THEME . '/' . 'footer');
        }
    }

    protected function success($msg = '操作成功') {
        exit(json_encode(array('status' => 1, 'message' => $msg)));
    }

    protected function returnJSON($data = array()) {
        exit(json_encode($data));
    }

    protected function error($msg = '操作失败') {
        exit(json_encode(array('status' => 0, 'message' => $msg)));
    }
}