<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 数据库操作的基类
 * Class Base_Model
 * author: hu.yuanpu
 * date: 2017/09/12
 */
class Base_Model extends CI_Model {
    /**
     * 存储操作 MySQL 的连接标识
     * @var null
     */
    private $handle = null;

    public function __construct($db = 'default') {
        parent::__construct();

        $this->handle = $db == 'default' ? $this->db : $this->load->database('eemsii', TRUE);
    }

    /**
     * 查询数据，支持多条件、无条件，或者单一条件查询
     * @param $sql
     * @param mixed $param
     * @param bool $single
     * @return mixed
     */
    protected function select($sql, $param = '', $single = false) {
        // 返回一条数据
        if ($single) {
            if (empty($param)) {
                return $this->handle->query($sql)->row_array();
            } else {
                return $this->handle->query($sql, $param)->row_array();
            }
        }

        if (empty($param)) {
            return $this->handle->query($sql)->result_array();
        } else {
            return $this->handle->query($sql, $param)->result_array();
        }
    }

    /**
     * 添加数据（支持批量添加，批量添加时，返回新增ID的数组）
     * @param string $tbl
     * @param array $data
     * @param bool $batch
     * @return array
     */
    protected function insert($tbl = '', $data = array(), $batch = false) {
        if ($batch) {
            $this->handle->insert_batch($tbl, $data);

            $start = $this->handle->insert_id();
            $end = count($data) - 1;
            $end = $start + $end;

            return range($start, $end);
        } else {
            $this->handle->insert($tbl, $data);

            return $this->handle->insert_id();
        }
    }

    protected function update($tbl = '', $data = array(), $condition = array()) {
        return $this->handle->update($tbl, $data, $condition);
    }

    /**
     * 删除数据（支持多条件）
     * @param string $tbl
     * @param array $condition
     * @return mixed
     */
    protected function delete($tbl = '', $condition = array()) {
        if (count($condition) == 1) {
            return $this->handle->delete($tbl, $condition);
        }

        foreach ($condition as $key => $item) {
            if (is_array($item)) {
                $this->handle->where_in($key, $item);
            } else {
                $this->handle->where($key, $item);
            }
        }

        return $this->handle->delete($tbl);
    }
}