<?php

class Habitat_type_management extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
    }

    function index() {
        $this->lits();
    }

    function lits() {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['detail'] = $this->db->get('tbl_habitat_type')->result();
        $data['title'] = "Habitat Type Management";
        $data['main'] = "habitat_type/list";
        $this->load->view('admin/index', $data);
    }

    function add() {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();

        $data['title'] = "Habitat Type Management";
        $data['main'] = "habitat_type/form";
        $this->load->view('admin/index', $data);
    }

    function save() {


////        debug($_FILES);
//
//        $ext = array_pop(explode('.', $_FILES["image"]["name"]));
//
        //        $config['upload_path'] = './uploads/category_images/';
//        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = '200000';
//
//        $filename = random_string() . '.' . $ext;
//        $config['file_name'] = $filename;
//
//        $this->load->library('upload', $config);
//        if (!$this->upload->do_upload('image')) {
//            $error = array('error' => $this->upload->display_errors());
//            debug($error);
//            exit;
//            $this->session->set_flashdata('error', $error['error']);
//            redirect(admin_url('category_management/add'));
//        } else {
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('habitat_type_management'));
        } else {

            $this->form_validation->set_rules('habitat_type', 'Habitat Type', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->add();
            } else {
                $data['type'] = $this->input->post('habitat_type');
                $data['created'] = date('Y-m-d H:i:s');

                $this->db->insert('tbl_habitat_type', $data);
                $this->session->set_flashdata('message', 'Habitat type added successfully.');
                redirect(admin_url('habitat_type_management'));
            }
        }

//        }
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_habitat_type');
        $this->session->set_flashdata('message', 'Habitat type deleted successfully.');
        redirect(admin_url('habitat_type_management'));
    }

    function edit($id) {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['edit'] = $this->db->where('id', $id)->get('tbl_habitat_type')->row();
        $data['title'] = "Habitat Type Management";
        $data['main'] = "habitat_type/form";
        $this->load->view('admin/index', $data);
    }

    function update($id) {
//        $error = $_FILES['image']['error'];
        //
//        if ($error == 4) {
//            $data['name'] = $this->input->post('name');
//            $this->db->where('id', $id);
//            $this->db->update('category_management', $data);
//
//            redirect(admin_url('category_management'));
//        } else {
//            $ext = array_pop(explode('.', $_FILES["image"]["name"]));
//
//            $config['upload_path'] = './uploads/category_images/';
//            $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = '200000';
//
//            $filename = random_string() . '.' . $ext;
//            $config['file_name'] = $filename;
//
//            $this->load->library('upload', $config);
//
//            if (!$this->upload->do_upload('image')) {
//                $error = array('error' => $this->upload->display_errors());
//                $this->session->set_flashdata('error', $error['error']);
//                redirect(admin_url('category_management/edit/' . $id));
//            } else {
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('habitat_type_management'));
        } else {
            $this->form_validation->set_rules('habitat_type', 'Habitat Type', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->edit($id);
            } else {
                $data['type'] = $this->input->post('habitat_type');
                $data['created'] = date('Y-m-d H:i:s');
                $this->db->where('id', $id);
                $this->db->update('tbl_habitat_type', $data);
                $this->session->set_flashdata('message', 'Habitat type updated successfully.');
                redirect(admin_url('habitat_type_management'));
            }
        }
//            }
//    }
    }

}

?>