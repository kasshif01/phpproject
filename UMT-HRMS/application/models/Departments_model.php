<?php

class Departments_model extends CI_Model {

    var $table_name = 'departments';
    var $primary_key = 'dep_id';

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    function get_all() {
        $this->db->select('*');
        $this->db->from($this->table_name);
        return $this->db->get();
    }

    function get_dep_by_id($dep_id) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where($this->primary_key, $dep_id);
        return $this->db->get();
    }

    function delete_dep($dep_id) {
        $this->db->where($this->primary_key, $dep_id);
        $this->db->delete($this->table_name);
    }

    function form_insert($data) {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

    function form_update($data, $dep_id) {
        $this->db->where($this->primary_key, $dep_id);
        $this->db->update($this->table_name, $data);
    }
}