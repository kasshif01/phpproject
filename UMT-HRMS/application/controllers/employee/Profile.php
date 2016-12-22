<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_session_logic_emp();
    }

    function index() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('emp_firstname', 'emp_firstname', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data_view['employees'] = $this->Employees_model->get_employee_by_id($this->session->userdata('emp_id'));
            $data['contents'] = $this->load->view('employee/profile', $data_view, TRUE);
            $data['page_title'] = 'profile';
            $this->load->view('template', $data);
        } else {
            $insert_array['emp_firstname'] = $this->input->post('emp_firstname');
            $insert_array['emp_lastname'] = $this->input->post('emp_lastname');
            $insert_array['emp_email'] = $this->input->post('emp_email');
            $insert_array['emp_address'] = $this->input->post('emp_address');
            $insert_array['emp_contact'] = $this->input->post('emp_contact');



            $this->Employees_model->form_update($insert_array, $this->session->userdata('emp_id'));

            redirect('employee/profile');
        }
    }

    function upload_avatar() {

        $emp_id = $this->session->userdata('emp_id');
        if ($_FILES['file_data']['name'] != '') {
            $file_name = $_FILES['file_data']['name'];
            $tmp_folder = $_FILES['file_data']['tmp_name'];
            $destination_path = 'assets/emp_avatar/';

            $employee = $this->Employees_model->get_employee_by_id($emp_id);
            if ($employee->num_rows() > 0) {
                $emp_info = $employee->row();
                $emp_avatar = $emp_info->emp_avatar;
                @unlink(PATH_DIR . 'assets/emp_avatar/' . $emp_avatar);
            }


            $insert_array['emp_avatar'] = upload_custom($tmp_folder, $destination_path, $file_name);
            $insert_array['emp_id'] = $emp_id;

            $this->Employees_model->form_update($insert_array, $emp_id);
        }
        echo json_encode(array('success' => 'success'));
    }

    function change_password() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            echo $this->load->view('admin/change_password_view', '', TRUE);
        } else {
            $insert_array['emp_password'] = $this->input->post('password');
            $emp_id = $this->session->userdata('emp_id');
            $this->Employees_model->form_update($insert_array, $emp_id);

            echo 'success';
        }
    }

}
