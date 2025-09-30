<?php 

class IndustriesSubDetailsModel extends CI_Model
{
    public function createData($data) {
        return $this->db->insert('industriessubdetails', $data);
    }

    public function fetchAllData($data, $tablename, $where, $orderBy = '', $orderType = 'ASC')
    {
        $this->db->select($data)
                 ->from($tablename)
                 ->where($where);
    
        // Add ordering if specified
        if (!empty($orderBy)) {
            $this->db->order_by($orderBy, $orderType);
        }
    
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchSingleData($data, $tablename, $where)
    {
        $query = $this->db->select($data)
                        ->from($tablename)
                        ->where($where)
                        ->get();
        return $query->row_array();
    }

    public function updateData($tablename, $data, $where)
    {
        $query = $this->db->update($tablename, $data, $where);
        return $query;
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
}
