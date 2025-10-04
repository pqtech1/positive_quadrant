<?php
class Project_portfolio_model extends CI_Model
{

    public function get_all_projects()
    {
        $this->db->select('pp.*, i.name');
        $this->db->from('project_portfolios pp');
        $this->db->join('industries_serve i', 'pp.industry_id = i.id');
        return $this->db->get()->result();
    }

    public function insert_project($data)
    {
        $this->db->insert('project_portfolios', $data);
        return $this->db->insert_id();
    }

    public function update_project($id, $data)
    {
        $this->db->where('id', $id)->update('project_portfolios', $data);
    }

    public function get_project($id)
    {
        return $this->db->where('id', $id)->get('project_portfolios')->row();
    }

    public function delete_project($id)
    {
        $this->db->where('id', $id)->delete('project_portfolios');
    }

    // Images
    public function insert_image($data)
    {
        $this->db->insert('project_images', $data);
    }

    public function get_project_images($project_id)
    {
        return $this->db->where('project_id', $project_id)->get('project_images')->result();
    }

    public function delete_image($id)
    {
        $this->db->where('id', $id)->delete('project_images');
    }
}
