<?php

class Log_management extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('file');
    }

    function index() {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['details'] = $this->db->get('tbl_logs')->result();
        $data['title'] = "Log Management";
        $data['main'] = ("log/list");
        $this->load->view('admin/index', $data);
    }

    function add() {
        // echo "string"; exit;
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();

        $data['title'] = "Log";
        $data['main'] = ("log/form");
        $this->load->view('admin/index', $data);
    }

    function save() {
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('log_management'));
        } else {
            $this->form_validation->set_rules('', 'Type', 'required');

            if ($this->form_validation->run()) {
                $data['type'] = $this->input->post('type');
                $data['created'] = date('Y-m-d H:i:s');
                $this->db->insert('tbl_dragon_photos', $data);
                redirect(admin_url('dragon_profile_management'));

                // $ext = array_pop(explode('.', $_FILES["image"]["name"]));

                // $config['upload_path'] = './uploads/slider_images/';
                // $config['allowed_types'] = 'gif|jpg|png|jpeg';
                // $config['max_size'] = 20000;


                // $filename = random_string() . '.' . $ext;
                // $config['file_name'] = $filename;

                // $this->load->library('upload', $config);

                // if (!$this->upload->do_upload('image')) {
                //     $error = array('error' => $this->upload->display_errors());
                //     $this->session->set_flashdata('error', $error['error']);
                //     redirect(admin_url('slider_management/add'));
                // } else {
                //     $data['title'] = $this->input->post('title');
                //     $data['description'] = $this->input->post('description');
                //     $data['image'] = $filename;
                //     $this->db->select_max('order', 'great');
                //     $res = $this->db->get('tbl_slider');

                //     $order = $res->row()->great;

                //     $data['order'] = ++$order;
                //     $this->db->insert('tbl_slider', $data);
                //     redirect(admin_url('slider_management'));
                // }
            } else {
                $this->add();
            }
        }
    }

    function edit($id) {
        $data['edit'] = $this->db->get_where('tbl_slider', array('id' => $id))->row();

        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();


        $data['title'] = 'Dragon Photo Management';
        $data['main'] = 'dragon_photos/form';
        $this->load->view('admin/index', $data);
    }

    function update($id) {
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('Dragon_profile_management'));
        } else {
            $this->form_validation->set_rules('title', 'Title', 'required|trim');
            $this->form_validation->set_rules('description', 'Description', 'required|trim');

            $error = $_FILES['image']['error'];

            if ($error == 4) {
                $data['title'] = $this->input->post('title');
                $data['description'] = $this->input->post('description');
                $this->db->where('id', $id);
                $this->db->update('tbl_slider', $data);
                redirect(admin_url('Dragon_profile_management'));
            } else {
                $ext = array_pop(explode('.', $_FILES["image"]["name"]));
                $filename = random_string() . '.' . $ext;

                $image = $this->db->get_where('tbl_slider', array('id' => $id))->row()->image;
                if ($image != '' && file_exists('uploads/slider_images/' . $image)) {
                    unlink('uploads/slider_image/' . $image);
                }

                $config['file_name'] = $filename;
                $config['upload_path'] = './uploads/slider_images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2000;


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect(admin_url('Dragon_profile_management/edit/' . $id));
                } else {
                    $data['title'] = $this->input->post('title');
                    $data['description'] = $this->input->post('description');
                    $data['image'] = $filename;
                    $this->db->where('id', $id);
                    $this->db->update('tbl_slider', $data);
                    redirect(admin_url('Dragon_profile_management'));
                }
            }
        }
    }

    function delete($id) {
        $this->db->where('id', $id)->delete('tbl_slider');
        redirect(admin_url('slider_management'));
    }

    

}

?>