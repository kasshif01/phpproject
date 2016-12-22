<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($emp_pwd_token) {
        $employee = $this->Login_model->check_emp_by_token($emp_pwd_token);
        if ($employee->num_rows() > 0) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('pwd', 'pwd', 'required');
            $this->form_validation->set_rules('confirm_pwd', 'confirm_pwd', 'required');

            if ($this->form_validation->run() == FALSE) {



                $data['contents'] = $this->load->view('password_reset', '', TRUE);
                $this->load->view('login_template', $data);
            } else {

                $pwd = $this->input->post('pwd');
                $confirm_pwd = $this->input->post('confirm_pwd');

                if ($pwd == $confirm_pwd) {
                    $insert_array['emp_password'] = $pwd;
                    $insert_array['emp_pwd_token'] = '';
                    $this->Login_model->update_password($insert_array, $emp_pwd_token);
                    redirect('login');
                } else {
                    echo "Password does not match";
                }
            }
        }
    }

}
