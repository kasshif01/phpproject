<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_session_logic_hod();
    }

    public function leave_types() {
        $data_view['leave_types'] = $this->Leaves_model->get_all_leave_types();
        $data['contents'] = $this->load->view('hod/leave_types_listing', $data_view, TRUE);
        $data['page_title'] = 'Leave types';
        $this->load->view('template', $data);
    }

    public function leave_policies() {
        $data_view['leave_policies'] = $this->Leaves_model->get_all();
        $data['contents'] = $this->load->view('hod/leave_policies_listing', $data_view, TRUE);
        $data['page_title'] = 'Leave Policies';
        $this->load->view('template', $data);
    }

}
