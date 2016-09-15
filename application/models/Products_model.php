<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    protected $table_name;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table_name = 'tbl_products';
    }

    /**
     * @return mixed
     */
    public function getAll() {
        return $this->db->from($this->table_name)->get()->result_array();
    }

}

/* End of file Products_model.php */
/* Location: ./application/controllers/Products_model.php */