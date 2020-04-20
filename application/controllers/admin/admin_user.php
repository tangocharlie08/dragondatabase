<?php

class Admin_user extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('password');
        $this->load->model('Log_model');

    }

    function index() {
        $this->admin_list();
    }

    function admin_list() {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['detail'] = $this->db->get('admin')->result();
        $data['title'] = 'Admin user';
        $data['main'] = ('user/list');
        $this->load->view('admin/index', $data);
    }

    function add_new() {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();

        $data['title'] = 'Admin user';
        $data['main'] = ('user/form');
        $this->load->view('admin/index', $data);
    }

    function save() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_user');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('initials', 'Initials', 'required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[repeat_password]');
        $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $config['upload_path'] = './uploads/admin_user/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);



        if ($this->form_validation->run() == FALSE) {
            $this->add_new();
        } else {
            $this->upload->do_upload('image');
            $upload_data = $this->upload->data();
            $data['image'] = $upload_data['file_name'];
            $data['user_type'] = $this->input->post('user_type');
            $data['name'] = $this->input->post('name');
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['status'] = 1;
            $data['initials'] = $this->input->post('initials');
            $data['created'] = date('Y-m-d H:i:s');
            $data['password'] = encrypt_password($this->input->post('password'));
            $this->db->insert('admin', $data);
            $this->Log_model->set_log($this->session->userdata('admin_user_id'), date("Y-m-d"), "Added New User(".$data['name'] .")");
            $this->session->set_flashdata('message', 'Admin added successfull.');
            redirect(admin_url('admin_user'));
        }
    }

    function delete($id) {
        $this->Log_model->set_log($this->session->userdata('admin_user_id'), date("Y-m-d"), "Deleted User");
        $this->db->where('id', $id)->delete('admin');
        redirect(admin_url('admin_user'));
    }

    function edit($id) {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['edit'] = $this->db->where('id', $id)->get('admin')->row();
        $data['title'] = 'Admin user';
        $data['main'] = ('user/form');
        $this->load->view('admin/index', $data);
    }

    function update($id) {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('initials', 'Initials', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_user');
        



        $config['upload_path'] = './uploads/admin_user/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);



        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $this->upload->do_upload('image');

            $upload_data = $this->upload->data();
            if ($upload_data['file_name'] != '') {
                $data['image'] = $upload_data['file_name'];
            }
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['initials'] = $this->input->post('initials');
            $data['username'] = $this->input->post('username');

            if ($_POST['password'] != '') {
                $data['password'] = encrypt_password($this->input->post('password'));
            }

            $this->db->where('id', $id);
            $this->db->update('admin', $data);
            $this->Log_model->set_log($this->session->userdata('admin_user_id'), date("Y-m-d"), "Updated user");
            //echo $this->db->last_query();
            $this->session->set_flashdata('message', 'Details updated successfully.');
            redirect(admin_url('admin_user'));
        }
    }

    function check_user() {
        $user = $this->input->post('username');
        $detail = $this->db->where('username', $user)->get('admin')->row();
        // echo $user; debug($detail); exit;
        if (count($detail) != 0) {
            if ($parentPathPieces && count($parentPathPieces) == 1) {
            $this->form_validation->set_message('check_user', 'Username already exits!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

    function change_status($id) {
        $status = $this->db->get_where('admin', array('id' => $id))->row()->status;

        if ($status == 0) {
            $data['status'] = 1;
            $this->session->set_flashdata('msg', 'User has been activated.');
        } else {
            $data['status'] = 0;
            $this->session->set_flashdata('msg', 'User has been deactivated.');
        }

        $this->db->where('id', $id);
        $this->db->update('admin', $data);


        redirect(admin_url('admin_user'));
    }

}

?>
