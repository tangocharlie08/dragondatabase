<?php

class Dragon_catchings_management extends Admin_Controller {

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

        $data['catching_dragon'] = $this->Dragon_model->get_catchings($limit);

        $config['base_url'] = admin_url('dragon_catchings_management/lists/');
        $config['total_rows'] = $this->db->count_all('tbl_catchings_dragon');
        $config['per_page'] = 40;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['count'] = $config['total_rows'];
        // debug($data); exit;

        $data['title'] = "Dragon Catchings Management";
        $data['main'] = ("dragon_catchings/list");
        $this->load->view('admin/index', $data);
    }

    function view($id, $limit = 0){
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();  
        // $data['detail'] = $this->Dragon_model->get_dragon_details($id);
        $data['detail'] = $this->Dragon_model->get_catching($id);
        $data['catching_dragon'] = $this->Dragon_model->get_catchings($limit);

        //$data['detail'] = $this->Dragon_model->get_dragon_details($id);
        //debug($data); exit;
        $data['contacts'] = $this->Dragon_model->get_dragon_catching($limit, $id);

        $config['base_url'] = admin_url('dragon_catchings_management/view/');
        $config['total_rows'] = $this->db->count_all('tbl_catchings_dragon');
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['count'] = $config['total_rows'];

        $data['title'] = 'Dragon Catchings Management';
        $data['sub_title'] = 'View Catchings Details';
        $data['sub_link'] = 'dragon_catchings_management';
        $data['main'] = ('dragon_catchings/view');
        $this->load->view('admin/index', $data);

    }

    function add() {
        $user_id = $this->session->userdata('admin_user_id');
        $data['Contact ID'] = $this->db->select('contact_id')->from('tbl_catchings_dragon')->where('id', $user_id)->get()->row();
         $data['Contact ID'] = $this->db->select('contact_id')->from('tbl_catchings_dragon')->where('id', $user_id)->get()->row();


        $data['title'] = 'Dragon Catchings Management';
        $data['main'] = 'dragon_catchings/form';
        $this->load->view('admin/index', $data);
    }

    function save() {

        // debug($_POST); exit;
       
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('dragon_catchings_management'));
        } else {
            //debug($_POST); exit;
            $this->form_validation->set_rules('id', 'ID', 'required');
            $this->form_validation->set_rules('contact_id', 'Contact ID', '');
            $this->form_validation->set_rules('torso', 'Torso', 'required|integer');
            $this->form_validation->set_rules('jaw_width', 'Jaw Width', 'required|integer');
            $this->form_validation->set_rules('tail_girth', 'Tail Girth', 'required|integer');
            $this->form_validation->set_rules('lower_fore_leg', 'Lower Fore Leg', 'required');
            $this->form_validation->set_rules('upper_hind_leg', 'Upper Hind Leg', 'required');
            $this->form_validation->set_rules('upper_fore_leg', 'Upper Fore Leg', 'required');
            $this->form_validation->set_rules('lower_hind_leg', 'Lower Hind Leg', 'required');
            $this->form_validation->set_rules('tail_length', 'Tail Length', '');
            $this->form_validation->set_rules('jaw_length', 'Jaw Length', '');
            $this->form_validation->set_rules('tail', 'Tail', 'required');
            $this->form_validation->set_rules('blood', 'Blood', '');
            $this->form_validation->set_rules('faeces', 'Faeces', 'required');
            $this->form_validation->set_rules('skin', 'Skin', 'required');
            $this->form_validation->set_rules('heamatology', 'Heamatology', '');
            $this->form_validation->set_rules('swab_skin', 'Swab Skin', '');
            $this->form_validation->set_rules('swab_oral', 'Swab Oral', '');
            $this->form_validation->set_rules('swab_cloacal', 'Swab Cloacal', '');
            $this->form_validation->set_rules('body_temp', 'Body Temp', '');



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
                

                $data['created'] = date('Y-m-d H:i:s');

                $this->db->insert('tbl_catchings_dragon', $data);
                // $this->Log_model->set_log($admin_detail->id, 4, "Added New Dragon Contacts");
                $this->session->set_flashdata('message', 'Dragon added successfully.');
                redirect(admin_url('dragon_catchings_management/list'));
            }

         }
           
      }
    

    function delete($id) {
        $this->db->where('id', $id)->delete('tbl_catchings_dragon');
        $this->session->set_flashdata('message', 'Dragon details deleted successfully.');
        redirect(admin_url('dragon_catchings_management'));
    }

    function edit($id) {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['edit'] = $this->db->where('id', $id)->get('tbl_catchings_dragon')->row();
        $data['title'] = 'Dragon Catchings Management';
        $data['main'] = 'dragon_catchings/form';
        $this->load->view('admin/index', $data);
    }

    function update($id) {

        // debug($_POST); exit;
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('dragon_catchings_management'));
        } else {
            $this->form_validation->set_rules('id', 'ID', 'required');
            $this->form_validation->set_rules('contact_id', 'Contact ID', '');
            $this->form_validation->set_rules('torso', 'Torso', 'required|integer');
            $this->form_validation->set_rules('jaw_width', 'Jaw Width', 'required|integer');
            $this->form_validation->set_rules('tail_girth', 'Tail Girth', 'required|integer');
            $this->form_validation->set_rules('lower_fore_leg', 'Lower Fore Leg', 'required');
            $this->form_validation->set_rules('upper_hind_leg', 'Upper Hind Leg', '');
            $this->form_validation->set_rules('upper_fore_leg', 'Upper Fore Leg', '');
            $this->form_validation->set_rules('lower_hind_leg', 'Lower Hind Leg', '');
            $this->form_validation->set_rules('tail_length', 'Tail Length', '');
            $this->form_validation->set_rules('jaw_length', 'Jaw Length', '');
            $this->form_validation->set_rules('tail', 'Tail', '');
            $this->form_validation->set_rules('blood', 'Blood', '');
            $this->form_validation->set_rules('faeces', 'Faeces', '');
            $this->form_validation->set_rules('skin', 'Skin', '');
            $this->form_validation->set_rules('heamatology', 'Heamatology', '');
            $this->form_validation->set_rules('swab_skin', 'Swab Skin', '');
            $this->form_validation->set_rules('swab_oral', 'Swab Oral', '');
            $this->form_validation->set_rules('swab_cloacal', 'Swab Cloacal', '');



           if ($this->form_validation->run() == FALSE) {
                $this->edit($id, $this->input->post('contact_id'));
            } else {

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
               
                

                $data['created'] = date('Y-m-d H:i:s');

                $this->db->where('id', $id);
                $this->db->update('tbl_catchings_dragon', $data);
                // $this->db->insert('tbl_catchings_dragon',$data);
                $this->session->set_flashdata('message', 'Dragon details updated successfully.');
                redirect(admin_url('dragon_catchings_management'));
            }

         }
           
      }

    

}

?>