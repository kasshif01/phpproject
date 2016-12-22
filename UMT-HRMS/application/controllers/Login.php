<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    function check_email_forgot() {
        $emp_email = $this->input->post('emp_email');

        $employee = $this->login_model->check_email($emp_email);
        if ($employee->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_login', 'Wrong Email .');
            return FALSE;
        }
    }

    function forgot_password() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('emp_email', 'emp_email', 'required|valid_email|callback_check_email_forgot');

        if ($this->form_validation->run() == FALSE) {
            $data['contents'] = $this->load->view('forgot_password', '', TRUE);
            $this->load->view('login_template', $data);
        } else {
            $emp_email = $this->input->post('emp_email');


            $employee = $this->login_model->check_email($emp_email);
            if ($employee->num_rows() > 0) {
                $emp_info = $employee->row();
                $emp_id = $emp_info->emp_id;
                $emp_email = $emp_info->emp_email;
                $emp_name = $emp_info->emp_firstname;

                $this->load->library('email');
                $token = $this->randomPassword($emp_id);


                $message = 'Hi Username,
            <br><br>
            please click on link below(OR copy and open it in new tab) to reset your password on beacon scout.<br><br>
            <a href="' . base_url() . 'reset_password/index/' . $token . '">' . base_url() . 'reset_password/index/' . $token . '</a>';


                $this->email->from('no-reply@beaconscout.com', 'beacon scout');

                $this->email->to($emp_email);

                $this->email->subject('Password reset');

                $this->email->message($message);

                $this->email->send();
            }

            redirect('login');
        }
    }

    function randomPassword($emp_id) {

        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 20; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $token = implode($pass);
        $r_token = md5($token);



        $insert_array['emp_pwd_token'] = $r_token;

        $this->Login_model->update_password_token($insert_array, $emp_id);

        return $r_token;
    }

    public function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('emp_email', 'emp_email', 'required|valid_email');
        $this->form_validation->set_rules('emp_password', 'emp_password', 'required|callback_check_login');

        if ($this->form_validation->run() == FALSE) {
            $data['contents'] = $this->load->view('login', '', TRUE);
            $this->load->view('login_template', $data);
        } else {
            $emp_email = $this->input->post('emp_email');
            $emp_password = $this->input->post('emp_password');

            $employee = $this->login_model->check_email_pass($emp_email, $emp_password);
            if ($employee->num_rows() > 0) {
                $emp_info = $employee->row();
                if ($emp_info->role_id == 1) {
                    $emp_data = array(
                        'emp_id' => $emp_info->emp_id,
                        'emp_firstname' => $emp_info->emp_firstname,
                        'emp_lastname' => $emp_info->emp_lastname,
                        'emp_email' => $emp_info->emp_email,
                        'emp_avatar' => $emp_info->emp_avatar,
                        'role_id' => $emp_info->role_id,
                        'emp_department' => $emp_info->emp_department,
                        'emp_designation' => $emp_info->emp_designation,
                        'emp_leave_balance' => $emp_info->leave_balance
                    );
                    $this->session->set_userdata($emp_data);

                    redirect('admin/employees');
                } else if ($emp_info->role_id == 3) {
                    $emp_data = array(
                        'emp_id' => $emp_info->emp_id,
                        'emp_firstname' => $emp_info->emp_firstname,
                        'emp_lastname' => $emp_info->emp_lastname,
                        'emp_email' => $emp_info->emp_email,
                        'emp_avatar' => $emp_info->emp_avatar,
                        'role_id' => $emp_info->role_id,
                        'emp_department' => $emp_info->emp_department,
                        'emp_designation' => $emp_info->emp_designation,
                    );
                    $this->session->set_userdata($emp_data);


                    redirect('employee/profile');
                } else if ($emp_info->role_id == 2) {
                    $emp_data = array(
                        'emp_id' => $emp_info->emp_id,
                        'emp_firstname' => $emp_info->emp_firstname,
                        'emp_lastname' => $emp_info->emp_lastname,
                        'emp_email' => $emp_info->emp_email,
                        'emp_avatar' => $emp_info->emp_avatar,
                        'role_id' => $emp_info->role_id,
                        'emp_department' => $emp_info->emp_department,
                        'emp_designation' => $emp_info->emp_designation,
                    );
                    $this->session->set_userdata($emp_data);


                    redirect('HOD/profile');
                }
            }
        }
    }

    function logout() {
        $emp_data = array(
            'emp_id' => '',
            'emp_firstname' => '',
            'emp_lastname' => '',
            'emp_email' => '',
            'role_id' => '',
        );
        $this->session->set_userdata($emp_data);
        redirect('login');
    }

    function check_login() {
        $emp_email = $this->input->post('emp_email');
        $emp_password = $this->input->post('emp_password');

        $employee = $this->login_model->check_email_pass($emp_email, $emp_password);
        if ($employee->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_login', 'Wrong Email or Password.');
            return FALSE;
        }
    }

}
