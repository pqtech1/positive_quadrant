<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tech_Expertise_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_tech_names()
    {
        $query = $this->db->select('tech_id, tech_name')->from('hire_tech_name')->get();
        return $query->result_array();
    }
    public function get_hire_details($id = null)
    {
        $this->db->select('id, tech_name');
        $this->db->from('hire_details');
        if ($id) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    public function insert_tech_expertise($data)
    {
        $this->db->insert('hire_tech_expertise', $data);
        return $this->db->affected_rows() > 0;
    }

    public function check_duplicate($hire_id, $tech_id)
    {
        // Query to check for an existing entry with the same hire_id and tech_id
        $this->db->select('1');
        $this->db->from('hire_tech_expertise');
        $this->db->where('hire_id', $hire_id);
        $this->db->where('tech_id', $tech_id);
        $query = $this->db->get();

        // Return true if a record exists, otherwise false
        return $query->num_rows() > 0;
    }

    public function fetchAllData($data, $tablename, $where, $orderBy = '', $orderType = 'ASC')
    {
        $this->db->select($data)->from($tablename)->where($where);
        if (!empty($orderBy)) {
            $this->db->order_by($orderBy, $orderType);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fetchSingleData($exp_id)
    {
        $this->db->where('exp_id', $exp_id);
        $query = $this->db->get('hire_tech_expertise');

        return $query->row();
    }
    public function updateTechExpertise($exp_id, $tech_values)
    {
        // Prepare the data to be updated
        $data = [
            'tech_values' => $tech_values  // Column to update
        ];

        // Update the record where the 'exp_id' matches
        $this->db->where('exp_id', $exp_id);
        return $this->db->update('hire_tech_expertise', $data);  // Use the correct table name
    }
    public function deleteData($tablename, $where)
    {
        $query = $this->db->delete($tablename, $where);
        return $query;
    }
    public function insertDynamicData($tablename, $data)
    {
        $query = $this->db->insert($tablename, $data);
        return $query;
    }




    public function get_tech_expertise_by_hire_id($hire_id)
    {
        $this->db->select('exp_id, tech_id, tech_values');
        $this->db->from('hire_tech_expertise');
        $this->db->where('hire_id', $hire_id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
