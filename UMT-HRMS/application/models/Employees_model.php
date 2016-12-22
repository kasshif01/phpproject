<?php

class Employees_model extends CI_Model {

    var $table_name = 'employees';
    var $primary_key = 'emp_id';

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    function get_all() {
        $this->db->select('*');
        $this->db->from($this->table_name);
        return $this->db->get();
    }

    function get_all_roles() {
        $this->db->select('*');
        $this->db->from('roles');
        return $this->db->get();
    }

    function get_employee_by_id($emp_id) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where($this->primary_key, $emp_id);
        return $this->db->get();
    }

    function delete_employee($emp_id) {
        
        $this->db->delete('employees', array('emp_id' => $emp_id));
        $this->db->delete('applications', array('emp_id' => $emp_id));
        
    }

    function form_insert($data) {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

    function form_update($data, $emp_id) {
        $this->db->where($this->primary_key, $emp_id);
        $this->db->update($this->table_name, $data);
    }

    function get_all_departments() {
        $this->db->select('*');
        $this->db->from('departments');
        return $this->db->get();
    }

    function get_dep_by_id($dep_id) {
        $this->db->select('dep_name');
        $this->db->from('departments');
        $this->db->where('dep_id', $dep_id);
        return $this->db->get();
    }

    function get_emp_by_dep_id() {
        $dep_id = $this->session->userdata('emp_department');
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('emp_department', $dep_id);
        $this->db->where('role_id <', 3);
        return $this->db->get();
    }
    
    function get_all_emp_types(){
        $this->db->select('*');
        $this->db->from('employee_types');
        return $this->db->get();
    }
    
    function delete_emp_type($emp_type_id){
        $this->db->where('id', $emp_type_id);
        $this->db->delete('employee_types');
    }
    
    function get_emp_type_by_id($emp_type_id){
        $this->db->select('*');
        $this->db->from('employee_types');
        $this->db->where('id', $emp_type_id);
        return $this->db->get();
    }
    
    function insert_emp_type($data) {
        $this->db->insert('employee_types', $data);
        return $this->db->insert_id();
    }

    function update_emp_type($data, $emp_type_id) {
        $this->db->where('id', $emp_type_id);
        $this->db->update('employee_types', $data);
    }
    
    function check_email($email){
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('emp_email', $email);
        return $this->db->get();
    }
    
    function check_emp_code($code){
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('emp_code', $code);
        return $this->db->get();
    }

}
