<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct() {
        $this->productTbl = 'fmw_products';
    }
    
    public function productList(){
           $query = $this->db->query("select id,name,prod_description,prod_image,prod_price,prod_discount,prod_availability from $this->productTbl");
           return $query->result_array();
    }
    
}