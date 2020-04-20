<?php

class General_location_management extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
    }

    function index() {
        $this->T_STRING();
    }

    function T_STRING() {

        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $details = $this->db->get('tbl_location_dragon')->result();
        $data['detail'] = $details;
        $data['title'] = "General Location Management";
        $data['main'] = "general_location/list";
        $this->load->view('admin/index', $data);
    }

    function add() {

        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
       
        $data['title'] = "General Location Management";
        $data['main'] = "general_location/form";
        $this->load->view('admin/index', $data);
    }

    function save() {

        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('general_location_management'));
        } else {
            $data['location'] = $this->input->post('general_location');
            $data['created'] = date('Y-m-d');

            $this->db->insert('tbl_location_dragon', $data);
            $this->session->set_flashdata('message', 'General Location added successfully.');
            redirect(admin_url('general_location_management'));
        }

    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_location_dragon');
        $this->session->set_flashdata('message', 'General Location deleted successfully.');
        redirect(admin_url('general_location_management'));
    }

    function edit($id) {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['edit'] = $this->db->where('id', $id)->get('tbl_location_dragon')->row();
        $data['title'] = "General Location Management";
        $data['main'] = "general_location/form";
        $this->load->view('admin/index', $data);
    }

    function update($id) {

        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('general_location_management'));
        } else {
            $data['location'] = $this->input->post('general_location');
            $this->db->where('id', $id);
            $this->db->update('tbl_location_dragon', $data);
            $this->session->set_flashdata('message', 'General Location Updated Successfully.');
            redirect(admin_url('general_location_management'));
        }

    }

}

?>