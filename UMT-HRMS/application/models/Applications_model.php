<?php

class Applications_model extends CI_Model {

    var $table_name = 'applications';
    var $primary_key = 'application_id';

    public function __construct() {

        parent::__construct();
    }

    function get_all_applications() {
        $this->db->select('*');
        $this->db->from('applications');
        return $this->db->get();
    }

    function get_all_approved_applications() {
        $this->db->select('*');
        $this->db->from('applications');
        $this->db->join('employees', 'employees.emp_id=applications.emp_id');
        $this->db->where('application_status_id', 1);
        return $this->db->get();
    }

    function get_all_by_emp_id() {
        $this->db->select('*');
        $this->db->from('applications');
        $this->db->where('emp_id', $this->session->userdata('emp_id'));
        return $this->db->get();
    }

    
    function get_all_app_for_hod() {
        $this->db->select('*');
        $this->db->from('applications');
        $this->db->where('role_id', 3);
        $this->db->where('officiating_officer', $this->session->userdata('emp_id'));
        return $this->db->get();
    }

    function get_application_by_id($application_id) {
        $this->db->select('*');
        $this->db->from('applications');
        $this->db->where($this->primary_key, $application_id);
        return $this->db->get();
    }

    function delete_application($application_id) {
        $this->db->where($this->primary_key, $application_id);
        $this->db->delete($this->table_name);
    }

    function form_insert($data) {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

    function form_update($data, $application_id) {
        $this->db->where($this->primary_key, $application_id);
        $this->db->update($this->table_name, $data);
    }

}
