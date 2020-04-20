<?php

class Dragon_management extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Dragon_model');
        $this->load->helper('form');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Log_model');
        
    }

    function index() {
        
        $this->lists();
    }

    function lists($limit = 0) {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();

       
        // $this->db->join('tbl_location_dragon as l', 'l.id = d.general_location');

        
        $data['dragons'] = $this->Dragon_model->get_dragons($limit);
        $config['base_url'] = admin_url('dragon_management/lists/');
        $config['total_rows'] = $this->db->count_all('tbl_dragons');
        $config['per_page'] = 40;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['count'] = $config['total_rows'];
        // debug($data); exit;

        $data['title'] = "Individual Dragon Management";
        $data['main'] = ("dragons/list");
        $this->load->view('admin/index', $data);
    }

    function add() {
        // debug($_POST); exit;
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();


        $data['title'] = "Individual Dragon Management";
        $data['main'] = ("dragons/form");
        $this->load->view('admin/index', $data);
    }

     function edit($id) {

        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['edit'] = $this->db->where('id', $id)->get('tbl_dragons')->row();
       // debug($data); exit;
        $data['title'] = 'Individual Dragon Management';
        $data['main'] = ('dragons/form');
        $this->load->view('admin/index', $data);
    }

    function save() {
        // debug($_POST); exit;
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('dragon_management'));
        } else {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('gender', 'Gender', 'required|integer');
            $this->form_validation->set_rules('original_id_by', 'Original ID By', 'required|integer');
            $this->form_validation->set_rules('general_location', 'General Location', 'required|integer');
            // $this->form_validation->set_rules('dragon_profile', 'Dragon Profile', 'required|integer');
            $this->form_validation->set_rules('age', 'Age', 'required|integer');
            $this->form_validation->set_rules('sub_location', 'Sub Location', '');
            $this->form_validation->set_rules('date_extracted', 'Date Extracted', '');
            $this->form_validation->set_rules('date_genotyped', 'Date Genotyped', '');
            $this->form_validation->set_rules('date_tagged', 'Date Tagged', '');
            $this->form_validation->set_rules('date_dna_taken', 'Date DNA Taken', '');
            $this->form_validation->set_rules('pit_tag', 'PIT tag', '');
            $this->form_validation->set_rules('genotyped_sample_no', 'Genotyped Sample No', '');
            $this->form_validation->set_rules('notes', 'Notes', '');



            if ($this->form_validation->run() == FALSE) {

                $this->add();
            } else {
                $data['name'] = $this->input->post('name');
                $data['gender'] = $this->input->post('gender');
                $data['original_id_by'] = $this->input->post('original_id_by');
                $data['general_location'] = $this->input->post('general_location');
                // $data['profile_id'] = $this->input->post('dragon_profile');
                $data['age'] = $this->input->post('age');
                $data['notes'] = $this->input->post('notes');
                $data['sub_location'] = $this->input->post('sub_location');
                $data['date_extracted'] = $this->input->post('date_extracted');
                $data['date_genotyped'] = $this->input->post('date_genotyped');
                $data['date_tagged'] = $this->input->post('date_tagged');
                $data['date_dna_taken'] = $this->input->post('date_dna_taken');
                $data['genotyped_sample_no'] = $this->input->post('genotyped_sample_no');
                $data['notes'] = $this->input->post('notes');
                $data['created'] = date('Y-m-d H:i:s');

                $this->db->insert('tbl_dragons', $data);
                $this->db->insert('tbl_contact_dragon',$data);
                $this->Log_model->set_log($this->session->userdata('admin_user_id'), date("Y-m-d"), "Added New Dragon(".$data['name'] .")");
                $this->session->set_flashdata('message', 'Dragon added successfully.');
                redirect(admin_url('dragon_management'));
            }
        }
    }


    function update($id) {

        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('dragon_management'));
        } else {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('gender', 'Gender', 'required|integer');
            $this->form_validation->set_rules('original_id_by', 'Original ID By', 'required|integer');
            $this->form_validation->set_rules('general_location', 'General Location', 'required|integer');
            // $this->form_validation->set_rules('dragon_profile', 'Dragon Profile', 'required|integer');
            $this->form_validation->set_rules('age', 'Age', 'required|integer');
            $this->form_validation->set_rules('sub_location', 'Sub Location', '');
            $this->form_validation->set_rules('date_extracted', 'Date Extracted', '');
            $this->form_validation->set_rules('date_genotyped', 'Date Genotyped', '');
            $this->form_validation->set_rules('date_tagged', 'Date Tagged', '');
            $this->form_validation->set_rules('date_dna_taken', 'Date DNA Taken', '');
            $this->form_validation->set_rules('pit_tag', 'PIT tag', '');
            $this->form_validation->set_rules('genotyped_sample_no', 'Genotyped Sample No', '');

            if ($this->form_validation->run() == FALSE) {

                $this->edit($id, $this->input->post('contact_id'));
            } else {
                $data['name'] = $this->input->post('name');
                $data['gender'] = $this->input->post('gender');
                $data['original_id_by'] = $this->input->post('original_id_by');
                $data['general_location'] = $this->input->post('general_location');
                // $data['profile_id'] = $this->input->post('dragon_profile');
                $data['age'] = $this->input->post('age');
                $data['notes'] = $this->input->post('notes');
                $data['sub_location'] = $this->input->post('sub_location');
                $data['date_extracted'] = $this->input->post('date_extracted');
                $data['date_genotyped'] = $this->input->post('date_genotyped');
                $data['date_tagged'] = $this->input->post('date_tagged');
                $data['date_dna_taken'] = $this->input->post('date_dna_taken');
                $data['genotyped_sample_no'] = $this->input->post('genotyped_sample_no');
                $data['created'] = date('Y-m-d H:i:s');

                $this->db->where('id', $id);
                $this->db->update('tbl_dragons', $data);
                // $this->db->update('tbl_contact_dragon', $data);
                $this->Log_model->set_log($this->session->userdata('admin_user_id'), date("Y-m-d"), "Updated Dragon Details(".$data['name'] .")");

                 
                $this->session->set_flashdata('message', 'Dragon details updated successfully.');
                redirect(admin_url('dragon_management'));
            }
        }
    }

    function delete($id) {
        $data=array('status'=>0);
        // $this->db->set('last_login','current_login',false);
        $this->db->where('id',$id);
        $this->db->update('tbl_dragons',$data);



        $data=array('status'=>0);
        // $this->db->set('last_login','current_login',false);
        $this->db->where('dragon_id',$id);
        $this->db->update('tbl_contact_dragon',$data);
        
        // echo $id; exit;
        $this->db->where('dragon_id', $id);
        // $this->db->group_by('dragon_id');
        $contact_id = $this->db->get('tbl_contact_dragon')->result();
        foreach ($contact_id as $key => $value) {
            # code...
            $this->db->where('contact_id', $value->id);
            $this->db->set('status', 0);
            $this->db->update('tbl_catchings_dragon');


            $this->db->where('contact_id', $value->id);
            $this->db->set('status', 0);
            $this->db->update('tbl_sightings_dragon');

            
        }

        
        // debug($contact_id); exit;


    // echo $this->db->last_query(); exit;

        $name = $this->db->where('id', $id)->get('tbl_dragons')->row()->name;
        $this->Log_model->set_log($this->session->userdata('admin_user_id'), date("Y-m-d H:i:s"), "Deleted Dragon. ID = (".$id .")");


        
        $this->session->set_flashdata('message', 'Dragon details deleted successfully.');
        redirect(admin_url('dragon_management'));
    }

    function view($id, $limit = 0){
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();  
        $data['detail'] = $this->Dragon_model->get_dragon_details($id);
        $data['contacts'] = $this->Dragon_model->get_individual_dragon_contacts($limit, $id);
        // debug($data); exit;

        $config['base_url'] = admin_url('dragon_management/view/');
        $config['total_rows'] = $this->db->count_all('tbl_contact_dragon');
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['count'] = $config['total_rows'];

        $data['title'] = 'Individual Dragon Management';
        $data['sub_title'] = 'View Details';
        $data['sub_link'] = 'dragon_management';


        $data['main'] = ('dragons/view');
        $this->load->view('admin/index', $data);

    }

    function filter($limit = 0){
        if(isset($_POST['download'])){
            // echo 1; exit;
            $this->Dragon_model->createExcel($_POST);

        }else{
            // debug($_POST); exit;
            $user_id = $this->session->userdata('admin_user_id');
            $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();  

            $results = $this->Dragon_model->filter($_POST, $limit);
            $data['dragons'] = $results['results'];

            // $data['dragons'] = $this->Dragon_model->get_dragons($limit);
            $config['base_url'] = admin_url('dragon_management/filter/');
            $config['total_rows'] = $results['total'];
            $config['per_page'] = 50;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['count'] = $config['total_rows'];



            $data['title'] = 'Dashboard';
            $data['sub_title'] = 'Search Result';
            $data['sub_link'] = 'dashboard';

            $data['main'] = ('dashboard');
            $this->load->view('admin/index', $data);
        }
        


    }







    

   

}
