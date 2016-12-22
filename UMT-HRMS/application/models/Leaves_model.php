<?php

class Leaves_model extends CI_Model {

    var $table_name = 'policies';
    var $primary_key = 'policy_id';

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    function get_all() {
        $this->db->select('*');
        $this->db->from('policies');
        return $this->db->get();
    }

    function get_leave_policy_by_id($policy_id) {
        $this->db->select('*');
        $this->db->from('policies');
        $this->db->where($this->primary_key, $policy_id);
        return $this->db->get();
    }

    function get_leave_type_by_id($type_id) {

        $this->db->select('*');
        $this->db->from('leave_types');
        $this->db->where('leave_type_id', $type_id);
        return $this->db->get();
    }

    function get_all_leave_types() {
        $this->db->select('*');
        $this->db->from('leave_types');
        return $this->db->get();
    }

    function delete_leave_policy($policy_id) {
        $this->db->where($this->primary_key, $policy_id);
        $this->db->delete($this->table_name);
    }

    function form_insert($data) {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

    function form_update($data, $policy_id) {
        $this->db->where($this->primary_key, $policy_id);
        $this->db->update($this->table_name, $data);
    }

    function leave_type_form_insert($data) {
        $this->db->insert('leave_types', $data);
        return $this->db->insert_id();
    }

    function leave_type_form_update($data, $type_id) {
        $this->db->where('leave_type_id', $type_id);
        $this->db->update('leave_types', $data);
    }

    function delete_leave_type($leave_type_id) {
        $this->db->where('leave_type_id', $leave_type_id);
        $this->db->delete('leave_types');
    }
    
    function get_emp_leave_summary($emp_id) {
        $this->db->select('*');
        $this->db->from('applications');
        $this->db->join('employees', 'employees.emp_id=applications.emp_id');
        $this->db->where('applications.emp_id', $emp_id);
        $this->db->where('applications.date_to <', date('Y-m-d'));
        $this->db->where('application_status_id', 1);
        return $this->db->get();
    }

}
