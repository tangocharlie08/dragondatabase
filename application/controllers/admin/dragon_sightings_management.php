<?php

class Dragon_sightings_management extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("Dragon_model");
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    function index() {
        $this->lists();
    }

     function lists($limit = 0) {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row(); 

        $data['sighting_dragon'] = $this->Dragon_model->get_sightings($limit);

        $config['base_url'] = admin_url('dragon_sightings_management/lists/');
        $config['total_rows'] = $this->db->count_all('tbl_sightings_dragon');
        $config['per_page'] = 40;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['count'] = $config['total_rows'];
        // debug($data); exit;

        $data['title'] = "Dragon Sightings Management";
        $data['main'] = ("dragon_sightings/list");
        $this->load->view('admin/index', $data);
    }


    function add() {
        $user_id = $this->session->userdata('admin_user_id');
        $data['Contact ID'] = $this->db->select('contact_id')->from('tbl_sightings_dragon')->where('id', $user_id)->get()->row();
         $data['Contact ID'] = $this->db->select('contact_id')->from('tbl_sightings_dragon')->where('id', $user_id)->get()->row();


        $data['title'] = 'Dragon Sightings Management';
        $data['main'] = 'dragon_sightings/form';
        $this->load->view('admin/index', $data);
    }


    function save() {

        //debug($_POST); exit;
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('dragon_sightings_management'));
        } else {
            $this->form_validation->set_rules('id', 'ID', 'required');
            $this->form_validation->set_rules('contact_id', 'Contact ID', 'required|integer');
            $this->form_validation->set_rules('dominane', 'Dominance', 'required|integer');
            $this->form_validation->set_rules('head_bob', 'Head Bob', 'required|integer');
            $this->form_validation->set_rules('arm_wave', 'Arm Wave', 'required|integer');
            $this->form_validation->set_rules('tail_slap', 'Tail Slap', 'required');
            $this->form_validation->set_rules('ch', 'CH', '');
            $this->form_validation->set_rules('fighting', 'Fighting', '');
            $this->form_validation->set_rules('eating', 'Eating', '');
            $this->form_validation->set_rules('hb_fast', 'HB Fast', '');
            $this->form_validation->set_rules('hb_slow', 'HB Slow', '');
            $this->form_validation->set_rules('aw_left', 'AW Left', '');
            $this->form_validation->set_rules('aw_right', 'AW Right', '');
            $this->form_validation->set_rules('fighting_with_contact', 'Fighting With Contact', '');
            $this->form_validation->set_rules('fighting_with_no_contact', 'Fighting With No Contact', '');
            $this->form_validation->set_rules('nesting', 'Nesting', '');
            $this->form_validation->set_rules('laying', 'Laying', '');
            $this->form_validation->set_rules('tasting', 'Tasting', '');
            $this->form_validation->set_rules('resting', 'Resting', '');
            $this->form_validation->set_rules('dew_lap', 'Dew Lap', '');
            $this->form_validation->set_rules('body_temp', 'Body', '');

             if ($this->form_validation->run() == FALSE) {

                $this->add();
            } else {

            // $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
                $data['id'] = $this->input->post('id');
                $data['contact_id'] = $this->input->post('contact_id');
                $data['torso'] = $this->input->post('torso');
                $data['jaw_width'] = $this->input->post('jaw_width');
                $data['tail_girth'] = $this->input->post('tail_girth');
                $data['lower_fore_leg'] = $this->input->post('lower_fore_leg');
                $data['upper_hind_leg'] = $this->input->post('upper_hind_leg');
                $data['upper_fore_leg'] = $this->input->post('upper_fore_leg');
                $data['lower_hind_leg'] = $this->input->post('date_extracted');
                $data['tail_length'] = $this->input->post('tail_length');
                $data['jaw_length'] = $this->input->post('jaw_length');
                $data['tail'] = $this->input->post('tail');
                $data['blood'] = $this->input->post('blood');
                $data['faeces'] = $this->input->post('faeces');
                $data['skin'] = $this->input->post('skin');
                $data['heamatology'] = $this->input->post('heamatology');
                $data['swab_skin'] = $this->input->post('swab_skin');
                $data['swab_oral'] = $this->input->post('swab_oral');
                $data['swab_cloacal'] = $this->input->post('swab_cloacal');
                $data['body_temp'] = $this->input->post('body_temp');

                

                $data['created'] = date('Y-m-d H:i:s');

                $this->db->where('id', $id);
                // $this->db->update('tbl_sightings_dragon', $data);
                $this->db->insert('tbl_sightings_dragon',$data);
                $this->session->set_flashdata('message', 'Dragon details added successfully.');
                redirect(admin_url('dragon_sightings_management'));
            }

         }
           
      }
    //     $formSubmit = $this->input->post('submitForm');
    //     if ($formSubmit == 'Cancel') {
    //         redirect(admin_url('doctor_management'));
    //     } else {
    //         $this->form_validation->set_rules('name', 'Name', 'required');
    //         $this->form_validation->set_rules('description', 'Description', 'required');

    //         $config['upload_path'] = './uploads/doctors/';
    //         $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|GIF|PNG|gif|png';
    //         $config['encrypt_name'] = TRUE;

    //         $this->load->library('upload', $config);

    //         if ($this->form_validation->run() == FALSE) {
    //             $this->add_new();
    //         } else {
    //             $this->upload->do_upload('image');
    //             $upload_data = $this->upload->data();
    //             $data['image'] = $upload_data['file_name'];

    //             $data['name'] = $this->input->post('name');
    //             $data['description'] = $this->input->post('description');
    //             $this->db->insert('tbl_doctors', $data);
    //             $this->session->set_flashdata('message', 'Doctor added successfully');
    //             redirect(admin_url('doctor_management'));
    //         }
    //     }
    // }

    function delete($id) {
        $this->db->where('id', $id)->delete('tbl_sightings_dragon');
        $this->session->set_flashdata('message', 'Dragon details deleted successfully.');
        redirect(admin_url('dragon_sightings_management'));
    }

    function edit($id) {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['edit'] = $this->db->where('id', $id)->get('tbl_sightings_dragon')->row();
        $data['title'] = 'Dragon Sightings Management';
        $data['main'] = 'dragon_sightings/form';
        $this->load->view('admin/index', $data);
    }

    function view($id, $limit = 0){
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();  
        // $data['detail'] = $this->Dragon_model->get_dragon_details($id);
        $data['detail'] = $this->Dragon_model->get_sighting($id);
        $data['sighting_dragon'] = $this->Dragon_model->get_sightings($limit);

        //$data['detail'] = $this->Dragon_model->get_dragon_details($id);
        //debug($data); exit;
       // $data['contacts'] = $this->Dragon_model->get_dragon_catching($limit, $id);

        $config['base_url'] = admin_url('dragon_sightings_management/view/');
        $config['total_rows'] = $this->db->count_all('tbl_sightings_dragon');
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['count'] = $config['total_rows'];

        $data['title'] = 'Dragon Sightings Management';
        $data['sub_title'] = 'View Sighting Details';
        $data['sub_link'] = 'dragon_sightings_management';
        $data['main'] = ('dragon_sightings/view');
        $this->load->view('admin/index', $data);

    }

    function update($id) {

        //debug($_POST); exit;
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('dragon_sightings_management'));
        } else {
            $this->form_validation->set_rules('id', 'ID', 'required');
            $this->form_validation->set_rules('contact_id', 'Contact ID', 'required|integer');
            $this->form_validation->set_rules('dominance', 'Dominance', 'required|integer');
            $this->form_validation->set_rules('head_bob', 'Head Bob', 'required|integer');
            $this->form_validation->set_rules('arm_wave', 'Arm Wave', 'required|integer');
            $this->form_validation->set_rules('tail_slap', 'Tail Slap', 'required');
            $this->form_validation->set_rules('ch', 'CH', '');
            $this->form_validation->set_rules('fighting', 'Fighting', '');
            $this->form_validation->set_rules('eating', 'Eating', '');
            $this->form_validation->set_rules('hb_fast', 'HB Fast', '');
            $this->form_validation->set_rules('hb_slow', 'HB Slow', '');
            $this->form_validation->set_rules('aw_left', 'AW Left', '');
            $this->form_validation->set_rules('aw_right', 'AW Right', '');
            $this->form_validation->set_rules('fighting_with_contact', 'Fighting With Contact', '');
            $this->form_validation->set_rules('fighting_with_no_contact', 'Fighting With No Contact', '');
            $this->form_validation->set_rules('nesting', 'Nesting', '');
            $this->form_validation->set_rules('laying', 'Laying', '');
            $this->form_validation->set_rules('tasting', 'Tasting', '');
            $this->form_validation->set_rules('resting', 'Resting', '');
            $this->form_validation->set_rules('dew_lap', 'Dew Lap', '');
            $this->form_validation->set_rules('body_temp', 'Body', '');



           if ($this->form_validation->run() == FALSE) {
                $this->edit($id, $this->input->post('contact_id'));
            } else {
                
                $data['contact_id'] = $this->input->post('contact_id');
                $data['dominance'] = $this->input->post('dominance');
                $data['head_bob'] = $this->input->post('head_bob');
                $data['arm_wave'] = $this->input->post('arm_wave');
                $data['tail_slap'] = $this->input->post('tail_slap');
                $data['ch'] = $this->input->post('ch');
                $data['fighting'] = $this->input->post('fighting');
                $data['eating'] = $this->input->post('eating');
                $data['hb_fast'] = $this->input->post('hb_fast');
                $data['hb_slow'] = $this->input->post('hb_slow');
                $data['aw_left'] = $this->input->post('aw_left');
                $data['aw_right'] = $this->input->post('aw_right');
                $data['fighting_with_contact'] = $this->input->post('fighting_with_contact');
                $data['fighting_with_no_contact'] = $this->input->post('fighting_with_no_contact');
                $data['laying'] = $this->input->post('laying');
                $data['resting'] = $this->input->post('resting');
                $data['dew_lap'] = $this->input->post('dew_lap');
                $data['body_temp'] = $this->input->post('body_temp');

                

                $data['created'] = date('Y-m-d H:i:s');

                $this->db->where('id', $id);
                $this->db->update('tbl_sightings_dragon', $data);
                // $this->db->insert('tbl_sightings_dragon',$data);
                $this->session->set_flashdata('message', 'Dragon details updated successfully.');
                redirect(admin_url('dragon_sightings_management'));
            }

         }
           
      }


    //     $formSubmit = $this->input->post('submitForm');
    //     if ($formSubmit == 'Cancel') {
    //         redirect(admin_url('doctor_management'));
    //     } else {
    //         $this->form_validation->set_rules('name', 'Name', 'required');
    //         $this->form_validation->set_rules('description', 'Description', 'required');

    //         $config['upload_path'] = './uploads/doctors/';
    //         $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|GIF|PNG|gif|png';
    //         $config['encrypt_name'] = TRUE;
    //         $this->load->library('upload', $config);



    //         if ($this->form_validation->run() == FALSE) {
    //             $this->edit($id);
    //         } else {
    //             if ($_FILES['image']['error'] == 0) {
    //                 $this->upload->do_upload('image');

    //                 $upload_data = $this->upload->data();
    //                 $data['image'] = $upload_data['file_name'];
    //             }


    //             $data['name'] = $this->input->post('name');
    //             $data['description'] = $this->input->post('description');
    //             $this->db->where('id', $id);
    //             $this->db->update('tbl_doctors', $data);
    //             $this->session->set_flashdata('message', 'Doctor info updated successfully.');
    //             redirect(admin_url('doctor_management'));
    //         }
    //     }
    // }

    

}

?>