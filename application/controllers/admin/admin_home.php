<?php
class Admin_home extends Admin_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    function index(){

    	$user_id = $this->session->userdata('admin_user_id');
        $this->session->unset_userdata('diseased');
        $this->session->unset_userdata('search', '');
        $this->session->unset_userdata('gravid');
        $this->session->unset_userdata('sort_by');
        $this->session->unset_userdata('gender');
        $this->session->unset_userdata('no_of_contacts');
        // echo 1; exit;
    	$data['profile'] = $this->db->select('*')->from('admin')->where('id',$user_id)->get()->row();
    	$data['title'] = 'Dashboard';
    	$data['main'] = 'dashboard';
        $this->load->view('admin/index', $data);
    }
   
}?>