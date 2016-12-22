<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_session_logic_admin();
    }

    public function index() {
        $data_view['employees'] = $this->Employees_model->get_all();
        $data['contents'] = $this->load->view('admin/Employees_listing', $data_view, TRUE);
        $data['page_title'] = 'Employees';
        $this->load->view('template', $data);
    }

    public function emp_leave_summary($emp_id) {
        $data_view['emp_id'] = $emp_id;
        $data['contents'] = $this->load->view('emp_leave_calendar', $data_view, TRUE);
        $data['page_title'] = 'Employee leave calendar';
        $this->load->view('template', $data);
    }

    public function roles() {
        $data_view['roles'] = $this->Employees_model->get_all_roles();
        $data['contents'] = $this->load->view('admin/roles_listing', $data_view, TRUE);
        $data['page_title'] = 'Roles';
        $this->load->view('template', $data);
    }

    public function applications() {
        $data_view['applications'] = $this->Applications_model->get_all_applications();
        $data['contents'] = $this->load->view('admin/applications_listing', $data_view, TRUE);
        $data['page_title'] = 'Applicaions';
        $this->load->view('template', $data);
    }

    public function add_edit_employee($employee_id = 0) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('emp_code', 'emp_code', 'required|callback_check_emp_code');
        $this->form_validation->set_rules('emp_email', 'emp_email', 'required|callback_check_email');

        if ($this->form_validation->run() == FALSE) {
            $data_view['employee_id'] = $employee_id;
            if ($employee_id != 0) {
                $data_view['employees'] = $this->Employees_model->get_employee_by_id($employee_id);
            }
            $data['contents'] = $this->load->view('admin/add_edit_employee', $data_view, TRUE);
            $data['page_title'] = 'Customer Details';
            $this->load->view('template', $data);
        } else {


            $insert_array['emp_code'] = $this->input->post('emp_code');
            $insert_array['role_id'] = $this->input->post('role_id');
            $insert_array['emp_type'] = $this->input->post('emp_type');
            $insert_array['emp_firstname'] = $this->input->post('emp_firstname');
            $insert_array['emp_lastname'] = $this->input->post('emp_lastname');
            $insert_array['emp_email'] = $this->input->post('emp_email');
            $insert_array['emp_date_of_birth'] = $this->input->post('emp_date_of_birth');
            $insert_array['emp_address'] = $this->input->post('emp_address');
            $insert_array['emp_contact'] = $this->input->post('emp_contact');
            $insert_array['leave_balance'] = $this->input->post('leave_balance');
            $insert_array['emp_designation'] = $this->input->post('emp_designation');
            $insert_array['emp_department'] = $this->input->post('emp_department');
            $insert_array['emp_date_of_joining'] = $this->input->post('emp_date_of_joining');
            $insert_array['emp_status_id'] = 1;



            if ($employee_id == 0) {
                $insert_array['emp_password'] = $this->randomPassword();
                $this->Employees_model->form_insert($insert_array);
            } else {
                $this->Employees_model->form_update($insert_array, $employee_id);
            }

            redirect('admin/employees');
        }
    }
    
    public function employee_types(){
        $data_view['employee_types'] = $this->Employees_model->get_all_emp_types();
        $data['contents'] = $this->load->view('admin/employee_types_listing', $data_view, TRUE);
        $data['page_title'] = 'Employee Types';
        $this->load->view('template', $data);
    }

    function delete_Employee($employee_id) {
        $this->Employees_model->delete_employee($employee_id);
        redirect('admin/employees');
    }
    
     public function add_edit_emp_type($emp_type_id = 0) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'title', 'required');
         $this->form_validation->set_rules('annual_leaves', 'annual_leaves', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data_view['emp_type_id'] = $emp_type_id;
            if ($emp_type_id != 0) {
                $data_view['employee_types'] = $this->Employees_model->get_emp_type_by_id($emp_type_id);
            }
            $data['contents'] = $this->load->view('admin/add_edit_employee_type', $data_view, TRUE);
            $data['page_title'] = 'Employee Types';
            $this->load->view('template', $data);
        } else {

            $insert_array['title'] = $this->input->post('title');
            $insert_array['annual_leaves'] = $this->input->post('annual_leaves');
            
            if ($emp_type_id == 0) {
                $this->Employees_model->insert_emp_type($insert_array);
            } else {
                $this->Employees_model->update_emp_type($insert_array, $emp_type_id);
            }

            redirect('admin/employees/employee_types');
        }
    }
    
     function delete_emp_type($emp_type_id) {
        $this->Employees_model->delete_emp_type($emp_type_id);
        redirect('admin/employees/employee_types');
    }

    function employee_profile() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('emp_firstname', 'emp_firstname', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data_view['employees'] = $this->Employees_model->get_employee_by_id($this->session->userdata('emp_id'));
            $data['contents'] = $this->load->view('admin/profile', $data_view, TRUE);
            $data['page_title'] = 'profile';
            $this->load->view('template', $data);
        } else {
            $insert_array['emp_firstname'] = $this->input->post('emp_firstname');
            $insert_array['emp_lastname'] = $this->input->post('emp_lastname');
            $insert_array['emp_email'] = $this->input->post('emp_email');
            $insert_array['emp_address'] = $this->input->post('emp_address');
            $insert_array['emp_contact'] = $this->input->post('emp_contact');



            $this->Employees_model->form_update($insert_array, $this->session->userdata('emp_id'));

            redirect('admin/employees/employee_profile');
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

    function approve_application() {
        $application_id = $this->input->post('application_id');

        $application = $this->Applications_model->get_application_by_id($application_id);

        if ($application->num_rows() > 0) {
            $app = $application->row();

            $emp_id = $app->emp_id;
            $no_of_days = $app->no_of_days;

            $employee = $this->Employees_model->get_employee_by_id($emp_id);

            if ($employee->num_rows() > 0) {
                $emp = $employee->row();

                $emp_type = $emp->emp_type;
                $emp_leave_balance = $emp->leave_balance;

                $insert_array_emp['leave_balance'] = $emp_leave_balance - $no_of_days;

                $insert_array['application_status_id'] = 1;

                $this->Employees_model->form_update($insert_array_emp, $emp_id);

                $this->Applications_model->form_update($insert_array, $application_id);

                redirect('admin/employees/applications');
            }
        }
    }

    function disapprove_application() {
        
        $application_id = $this->input->post('application_id');
        $insert_array['application_status_id'] = 2;
        $this->Applications_model->form_update($insert_array, $application_id);
        redirect('admin/employees/applications');
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

    function randomPassword() {

        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 20; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $password = implode($pass);

        return $password;
    }
    
    function check_email()
	{
		$email = $this->input->post('emp_email');
		$employees = $this->Employees_model->check_email($email);
		if( $employees->num_rows()>0)
		{
			$this->form_validation->set_message('check_email', 'Email already exists.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
        
        function check_emp_code()
	{
            $code = $this->input->post('emp_code');
            $employees = $this->Employees_model->check_emp_code($code);
            if( $employees->num_rows()>0)
            {
                    $this->form_validation->set_message('check_emp_code', 'Employee code already exists.');
                    return FALSE;
            }
            else
            {
                    return TRUE;
            }
	}

}
