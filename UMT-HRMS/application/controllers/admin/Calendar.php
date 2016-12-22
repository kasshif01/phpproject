<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_session_logic_admin();
    }

    public function index() {



        $data['contents'] = $this->load->view('admin/leave_calendar', '', TRUE);
        $data['page_title'] = 'Leave Calendar';
        $this->load->view('template', $data);
    }

}
