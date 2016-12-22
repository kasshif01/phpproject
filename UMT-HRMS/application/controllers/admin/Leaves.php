<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_session_logic_admin();
    }

    public function index() {
        $data_view['leave_policies'] = $this->Leaves_model->get_all();
        $data['contents'] = $this->load->view('admin/leave_policies_listing', $data_view, TRUE);
        $data['page_title'] = 'Leave Policies';
        $this->load->view('template', $data);
    }

    public function add_edit_leave_policy($policy_id = 0) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data_view['policy_id'] = $policy_id;
            if ($policy_id != 0) {
                $data_view['leave_policies'] = $this->Leaves_model->get_leave_policy_by_id($policy_id);
            }
            $data['contents'] = $this->load->view('admin/add_edit_leave_policy', $data_view, TRUE);
            $data['page_title'] = 'Leave policies';
            $this->load->view('template', $data);
        } else {


            $insert_array['title'] = $this->input->post('title');
            $insert_array['description'] = $this->input->post('description');



            if ($policy_id == 0) {
                $this->Leaves_model->form_insert($insert_array);
            } else {
                $this->Leaves_model->form_update($insert_array, $employee_id);
            }

            redirect('admin/leaves');
        }
    }

    function delete_leave_policy($policy_id) {
        $this->Leaves_model->delete_leave_policy($policy_id);
        redirect('admin/leaves');
    }

    function leave_types() {
        $data_view['leave_types'] = $this->Leaves_model->get_all_leave_types();
        $data['contents'] = $this->load->view('admin/leave_types_listing', $data_view, TRUE);
        $data['page_title'] = 'Leave Types';
        $this->load->view('template', $data);
    }

    public function add_edit_leave_type($type_id = 0) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('leave_type_name', 'leave_type_name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data_view['type_id'] = $type_id;
            if ($type_id != 0) {
                $data_view['leave_types'] = $this->Leaves_model->get_leave_type_by_id($type_id);
            }
            $data['contents'] = $this->load->view('admin/add_edit_leave_type', $data_view, TRUE);
            $data['page_title'] = 'Leave types';
            $this->load->view('template', $data);
        } else {


            $insert_array['leave_type_name'] = $this->input->post('leave_type_name');
            $insert_array['leave_type_description'] = $this->input->post('leave_type_description');



            if ($type_id == 0) {
                $this->Leaves_model->leave_type_form_insert($insert_array);
            } else {
                $this->Leaves_model->leave_type_form_update($insert_array, $type_id);
            }

            redirect('admin/leaves/leave_types');
        }
    }

    function delete_leave_type($leave_type_id) {
        $this->Leaves_model->delete_leave_type($leave_type_id);
        redirect('admin/leaves/leave_types');
    }

}
