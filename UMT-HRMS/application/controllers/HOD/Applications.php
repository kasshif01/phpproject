<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Applications extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_session_logic_hod();
    }

    function index() {
        $data_view['applications'] = $this->Applications_model->get_all_app_for_hod();
        $data['contents'] = $this->load->view('hod/applications_listing', $data_view, TRUE);
        $data['page_title'] = 'Applications';
        $this->load->view('template', $data);
    }

    function my_applications() {
        $emp_id = $this->session->userdata('emp_id');
        $data_view['applications'] = $this->Applications_model->get_all_by_emp_id($emp_id);
        $data['contents'] = $this->load->view('hod/my_applications', $data_view, TRUE);
        $data['page_title'] = 'Applications';
        $this->load->view('template', $data);
    }

    function add_edit_application($application_id = 0) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('date_from', 'date_from', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data_view['application_id'] = $application_id;
            if ($application_id != 0) {
                $data_view['applications'] = $this->Applications_model->get_application_by_id($application_id);
            }
            $data['contents'] = $this->load->view('hod/add_edit_application', $data_view, TRUE);
            $data['page_title'] = 'Submit an application';
            $this->load->view('template', $data);
        } else {

            $insert_array['emp_id'] = $this->session->userdata('emp_id');
            $insert_array['role_id'] = $this->session->userdata('role_id');
            $insert_array['date_from'] = $this->input->post('date_from');
            $insert_array['date_to'] = $this->input->post('date_to');
            $insert_array['no_of_days'] = $this->input->post('no_of_days');
            $insert_array['leave_type'] = $this->input->post('leave_type');
            $insert_array['reason'] = $this->input->post('reason');
            $insert_array['application_status_id'] = 0;
            $insert_array['application_date'] = date('Y-m-d');
            $insert_array['officiating_officer'] = $this->input->post('officiating_officer');


            if ($application_id == 0) {
                $this->Applications_model->form_insert($insert_array);
            } else {
                $this->Applications_model->form_update($insert_array, $application_id);
            }

            redirect('HOD/applications');
        }
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
    }

}
