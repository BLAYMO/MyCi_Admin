<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products_model extends CI_Model
{

    public $table = 'products';
    public $id = 'productCode';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('productCode', $q);
	$this->db->or_like('productName', $q);
	$this->db->or_like('productLine', $q);
	$this->db->or_like('productScale', $q);
	$this->db->or_like('productVendor', $q);
	$this->db->or_like('productDescription', $q);
	$this->db->or_like('quantityInStock', $q);
	$this->db->or_like('buyPrice', $q);
	$this->db->or_like('MSRP', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('productCode', $q);
	$this->db->or_like('productName', $q);
	$this->db->or_like('productLine', $q);
	$this->db->or_like('productScale', $q);
	$this->db->or_like('productVendor', $q);
	$this->db->or_like('productDescription', $q);
	$this->db->or_like('quantityInStock', $q);
	$this->db->or_like('buyPrice', $q);
	$this->db->or_like('MSRP', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Products_model.php */
/* Location: ./application/models/Products_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-05-01 12:10:38 */
/* http://harviacode.com */