<?php

class login_model extends CI_Model {

    var $table_name = 'employees';
    var $primary_key = 'emp_id';

    public function __construct() {
        parent::__construct();
    }

    function check_email_pass($emp_email, $emp_password) {
        $this->db->select('*');
        $this->db->from('employees');

        $this->db->where('emp_status_id', 1);
        $this->db->where('emp_email', $emp_email);
        $this->db->where('emp_password', $emp_password);
        return $this->db->get();
    }

    function check_email($emp_email) {
        $this->db->select('emp_id,emp_firstname,emp_status_id,emp_email');
        $this->db->from('employees');

        $this->db->where('emp_status_id', 1);
        $this->db->where('emp_email', $emp_email);
        return $this->db->get();
    }

    function check_password($emp_id, $emp_pwd) {
        $this->db->select('emp_pwd');
        $this->db->from('employees');
        $this->db->where('emp_id', $emp_id);
        $this->db->where('emp_pwd', $emp_pwd);
        return $this->db->get();
    }

    function update_password_token($insert_array, $emp_id) {
        $this->db->where('emp_id', $emp_id);
        $this->db->update('employees', $insert_array);
    }

    function check_emp_by_token($token) {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('emp_pwd_token', $token);
        return $this->db->get();
    }

    function update_password($insert_array, $token) {
        $this->db->where('emp_pwd_token', $token);
        $this->db->update('employees', $insert_array);
    }

}
