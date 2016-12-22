<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Applications extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_session_logic_emp();
    }

    public function index() {

        $data_view['applications'] = $this->Applications_model->get_all_by_emp_id();
        $data['contents'] = $this->load->view('employee/applications_listing', $data_view, TRUE);
        $data['page_title'] = 'Applications';
        $this->load->view('template', $data);
    }

    public function add_edit_application($application_id = 0) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('date_from', 'date_from', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data_view['application_id'] = $application_id;
            if ($application_id != 0) {
                $data_view['applications'] = $this->Applications_model->get_application_by_id($application_id);
            }
            $data['contents'] = $this->load->view('employee/add_edit_application', $data_view, TRUE);
            $data['page_title'] = 'Customer Details';
            $this->load->view('template', $data);
        } else {

            $insert_array['emp_id'] = $this->session->userdata('emp_id');
            $insert_array['role_id'] = $this->session->userdata('role_id');
            $insert_array['date_from'] = $this->input->post('date_from');
            $insert_array['date_to'] = $this->input->post('date_to');
            $insert_array['no_of_days'] = $this->input->post('no_of_days');
            $insert_array['leave_type'] = $this->input->post('leave_type');
            $insert_array['reason'] = $this->input->post('reason');
            $insert_array['application_date'] = date('Y-m-d');
            $insert_array['officiating_officer'] = $this->input->post('officiating_officer');



            if ($application_id == 0) {
                if($this->session->userdata('emp_leave_balance') > 0)
                    {
                        $this->Applications_model->form_insert($insert_array);
                    }
                else
                    {
                        redirect('employee/applications/submission_error');
                    }
            } else {
                $this->Applications_model->form_update($insert_array, $application_id);
            }

            redirect('employee/applications');
        }
    }
    
    public function submission_error() {

        $data['contents'] = $this->load->view('submission_denied', 1, TRUE);
        $data['page_title'] = 'submission_denied';
        $this->load->view('template', $data);
    }

}
