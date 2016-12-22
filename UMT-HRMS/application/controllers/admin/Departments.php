<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_session_logic_admin();
    }

    public function index() {
        $data_view['departments'] = $this->Departments_model->get_all();
        $data['contents'] = $this->load->view('admin/departments_listing', $data_view, TRUE);
        $data['page_title'] = 'Departments';
        $this->load->view('template', $data);
    }

    public function add_edit_department($dep_id = 0) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('dep_name', 'dep_name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data_view['dep_id'] = $dep_id;
            if ($dep_id != 0) {
                $data_view['departments'] = $this->Departments_model->get_dep_by_id($dep_id);
            }
            $data['contents'] = $this->load->view('admin/add_edit_department', $data_view, TRUE);
            $data['page_title'] = 'Departments';
            $this->load->view('template', $data);
        } else {

            $insert_array['dep_name'] = $this->input->post('dep_name');
            
            if ($dep_id == 0) {
                $this->Departments_model->form_insert($insert_array);
            } else {
                $this->Departments_model->form_update($insert_array, $dep_id);
            }

            redirect('admin/departments');
        }
    }

    function delete_department($dep_id) {
        $this->Departments_model->delete_dep($dep_id);
        redirect('admin/leaves');
    }
}
