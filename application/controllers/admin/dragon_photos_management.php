<?php

class Dragon_photos_management extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('file');
        $this->load->helper(array('form', 'url'));
    }

    function index() {
        $this->photo_lists();
    }

    function photo_lists($limit = 0) {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();


        $this->db->select('*');
        $this->db->from('tbl_dragon_photos');
        
        $this->db->limit(15, $limit);
        $data['image'] = $this->db->get()->result();
        $config['base_url'] = admin_url('dragon_photos_management/photo_lists');
        $config['total_rows'] = $this->db->count_all('tbl_dragon_photos');
        $config['per_page'] = 15;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);

        $data['count'] = $config['total_rows'];



        $data['title'] = "Dragon Photos Management";
        $data['main'] = ("photos/list");
        $this->load->view('admin/index', $data);
    }

    

   

   

    function add($contact_id) {
        // debug($_POST); exit;
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        //$data['image'] = $this->db->select('image')->from('tbl_dragon_photos')->get()->row();
        $data['contact_id'] = $contact_id;
              
        $data['title'] = "Dragon Photos management";
        $data['main'] = ("photos/form");
        $this->load->view('admin/index', $data);
    }

    function save($contact_id) {
        // debug($_POST); exit;

        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('dragon_photos_management'));
        } else {
            // $this->form_validation->set_rules('type', 'Profile', '');
            // $this->form_validation->set_rules('contact_id', 'Contact ID', 'required|integer');
            $this->form_validation->set_rules('photo_id_by', 'Photo ID By', 'required|integer');
           

            if ($this->form_validation->run() == FALSE) {
                $this->add($contact_id);
            } else {
                // $dataone['']

                
                
                $lastId = $contact_id;

                $files = $_FILES;
                // debug($files); exit;

                $cpt = count($_FILES['dragon_images']['name']);
                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['dragon_images']['name'] = $files['dragon_images']['name'][$i];
                    $_FILES['dragon_images']['type'] = $files['dragon_images']['type'][$i];
                    $_FILES['dragon_images']['tmp_name'] = $files['dragon_images']['tmp_name'][$i];
                    $_FILES['dragon_images']['error'] = $files['dragon_images']['error'][$i];
                    $_FILES['dragon_images']['size'] = $files['dragon_images']['size'][$i];
                    $this->upload->initialize($this->set_upload_options());
                    $this->upload->do_upload('dragon_images');

                    // if (!$this->upload->do_upload()){
                    //     echo $this->upload->display_errors(); exit;
                    // }else{
                    //     echo $this->upload->data(); exit;
                    // }


                    $upload = $this->upload->data('dragon_images');
                    // echo $upload['file_name']; exit;
                    

                    

                    $dataone['image'] = $upload['file_name'];
                    $dataone['photo_id_by'] = $this->input->post('photo_id_by');
                    $dataone['contact_id'] = $lastId;
                    $dataone['created'] = date('Y-m-d H:i:s');
                    $this->db->insert('tbl_dragon_photos', $dataone);
                }
               

                $this->session->set_flashdata('message', 'Dragon photos added successfully.');
                redirect(admin_url('dragon_photos_management'));
            }
        }
    }

    private function set_upload_options() {
        $config['upload_path'] = './uploads/dragon_images';
        $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|GIF|PNG|gif|png';
        $config['encrypt_name'] = TRUE;
        $config['overwrite'] = FALSE;
        return $config;
    }

    function update($id) {
        // debug($_FILES); exit;
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            // debug($_POST); exit;
            redirect(admin_url('dragon_photos_management'));
        } else {
            // echo 2; exit;
            $this->form_validation->set_rules('type', 'Profile', '');
            $this->form_validation->set_rules('contact_id', 'Contact ID', '');
            $this->form_validation->set_rules('photo_id_by', 'Photo ID By', '');
           



            if ($this->form_validation->run() == FALSE) {
            
                // echo 2; exit;

                $this->edit($id);
            } else {
            // echo 1; exit;

                 // $lastId = $this->db->insert_id();
                 // $files = $_FILES;
                 // $cpt = count($_FILES['dragon_images']['image']);

                        // $data['image'] = $upload_data['file_name'];

                        
                        
                        
                        $this->upload->initialize($this->set_upload_options());
                        // $this->upload->do_upload('image');
                        // $upload = $this->upload->data('image');


                        $data['type'] = $this->input->post('type');
                        $data['contact_id'] = $this->input->post('contact_id');
                        $data['photo_id_by'] = $this->input->post('photo_id_by');
                        $data['image'] = $this->input->post('image');
               
                        $data['created'] = date('Y-m-d H:i:s');
                        $this->db->where('id', $id);
                        $upload = $this->upload->data('image');
                        // $dataone['type'] =$type;
                        // $dataone['image'] = $upload['file_name'];
                        // $dataone['contact_id'] = $id;
                        // $dataone['created'] = time();
                        // $this->db->update('image', $dataone);
                        // $this->db->update('contact_id', $dataone);
                        // $this->db->update('created', $dataone);
                   
                
                $this->db->update('tbl_dragon_photos', $data);

                $this->session->set_flashdata('message', 'dragon photos updated successfully.');
                redirect(admin_url('dragon_photos_management'));
            }
        }
    }

    

    function edit($id) {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['edit'] = $this->db->get_where('tbl_dragon_photos', array('id' => $id))->row();
         $data['images'] = $this->db->get_where('tbl_dragon_photos', array('id' => $id))->row();
       
        $data['title'] = "Dragon Photos Management";
        $data['main'] = ("photos/form");
        $this->load->view('admin/index', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $image = $this->db->get('tbl_dragon_photos')->row()->image;
        // echo $image; exit;
        if(!empty($image)){
            $path = base_url("/uploads/dragon_images/".$image);
            // echo $path; exit;
            delete_files($path);
            



        }

        $this->db->where('id', $id);
        $this->db->delete('tbl_dragon_photos');
       
        $this->session->set_flashdata('message', 'Dragon photos deleted successfully.');
        redirect(admin_url('dragon_photos_management'));
    }

  
   

    function delete_photo() {
       
        $this->db->where('id', $_POST['id']);
        $image = $this->db->get('tbl_dragon_photos')->row()->image;
        // echo $image; exit;
        if(!empty($image)){
            $path = base_url("/uploads/dragon_images/".$image);
            // echo $path; exit;
            delete_files($path);
            



        }


        $this->db->where('id', $_POST['id']);
        $this->db->delete('tbl_dragon_photos');

        $response['success'] = TRUE;
        $response['id'] = $_POST['id'];

        echo json_encode($response);
    }

}

?>