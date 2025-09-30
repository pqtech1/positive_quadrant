<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        return $this->db->get('team_members')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('team_members', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('team_members', $data);
    }

    public function update($id, $data) {
        return $this->db->update('team_members', $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('team_members', ['id' => $id]);
    }
}
