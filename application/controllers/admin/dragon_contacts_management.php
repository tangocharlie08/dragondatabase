<?php
class Dragon_contacts_management extends Admin_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model("Dragon_model");
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
        

        $data['contact_dragon'] = $this->Dragon_model->get_contacts($limit);
        $config['base_url'] = admin_url('dragon_contacts_management/lists/');
        $config['total_rows'] = $this->db->count_all('tbl_contact_dragon');
        $config['per_page'] = 40;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['count'] = $config['total_rows'];
        // debug($data); exit;

        $data['title'] = "Dragon Contacts Management";
        $data['main'] = ("dragon_contacts/list");
        $this->load->view('admin/index', $data);
    }


       

    function add($id) {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['edit'] = $this->Dragon_model->get_dragon_contact($id);

        //$data['dragon'] = $this->Dragon_model->get_dragon($id);
        $data['dragon'] = $this->db->get_where('tbl_dragons', array('id'=>$id))->row();
        $data['habitat_types'] = $this->Dragon_model->get_habitiat_types();
        // debug($data); exit;
        $data['users'] = $this->Dragon_model->get_users();
        $data['title'] = 'Dragon Contacts Management';
        $data['main'] = ('dragon_contacts/form');
        $this->load->view('admin/index', $data);
    }

    function save() {
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('dragon_contacts_management'));
        } else {
            // debug($_POST); exit;
             $this->form_validation->set_rules('survey_date', 'Survey Date', 'required');
            $this->form_validation->set_rules('lat', 'Latitude', 'required');
            $this->form_validation->set_rules('lon', 'Longitude', 'required');
            $this->form_validation->set_rules('sub_location', 'Sub Location', '');
            $this->form_validation->set_rules('habitat_type', 'Habitat Type', '');
            $this->form_validation->set_rules('field_record_by', 'Field Record By', 'required');
            $this->form_validation->set_rules('data_entry_by', 'Data Entry By', '');
            $this->form_validation->set_rules('diseased', 'Diseased', 'required');
            $this->form_validation->set_rules('gravid', 'Gravid', '');
            $this->form_validation->set_rules('notes', 'Notes', '');
            $this->form_validation->set_rules('dominance', 'Dominance', '');
            $this->form_validation->set_rules('head_bob', 'Head Bob', '');
            $this->form_validation->set_rules('arm_wave', 'Arm Wave', '');
            $this->form_validation->set_rules('tail_slap', 'Tail Slap', '');
            $this->form_validation->set_rules('ch', 'CH', '');
            $this->form_validation->set_rules('fighting', 'Fighting', '');
            $this->form_validation->set_rules('eating', 'Eating', '');
            $this->form_validation->set_rules('hb_fast', 'Head Bob Fast', '');
            $this->form_validation->set_rules('hb_slow', 'Head Bob Slow', '');
            $this->form_validation->set_rules('aw_left', 'Arm Wave Left', '');
            $this->form_validation->set_rules('aw_right', 'Arm Wave Right', '');
            $this->form_validation->set_rules('fighting_with_contact', 'Fighting With Contact', '');
            $this->form_validation->set_rules('fightiing_with_no_contact', 'Fighting With No Contact', '');
            $this->form_validation->set_rules('nesting', 'Neasting', '');
            $this->form_validation->set_rules('laying', 'Laying', '');
            $this->form_validation->set_rules('tasting', 'Tasting', '');
            $this->form_validation->set_rules('resting', 'Resting', '');
            $this->form_validation->set_rules('Dew_lap', 'Dew lap', '');
            $this->form_validation->set_rules('body_temp', 'Body Temperature', '');
            $this->form_validation->set_rules('torso', 'Torso', '');
            $this->form_validation->set_rules('jaw_width', 'Jaw Width', '');
            $this->form_validation->set_rules('tail_girth', 'Tail Girth', '');
            $this->form_validation->set_rules('lower_fore_leg', 'Lower Fore Leg', '');
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

                $this->add($this->input->post('dragon_id'));
            } else {

                $data['survey_date'] = $this->input->post('survey_date');
                $data['dragon_id'] = $this->input->post('dragon_id');
                $data['lat'] = $this->input->post('lat');
                $data['lon'] = $this->input->post('lon');
                $data['sub_location'] = $this->input->post('sub_location');
                $data['contact_type'] = $this->input->post('contact_type');
                $data['habitat_type'] = $this->input->post('habitat_type');
                $data['notes'] = $this->input->post('notes');
                $data['data_entry_by'] = $this->session->userdata('admin_user_id');
                $data['field_record_by'] = $this->input->post('field_record_by');

                $this->db->insert('tbl_contact_dragon', $data);
                $contact_id = $this->db->insert_id();
                $this->Log_model->set_log($this->session->userdata('admin_user_id'), date("Y-m-d"), "Added New Dragon Contacts");


                if($data["contact_type"] == 0){
                    $sight['dominance'] = $this->input->post('dominance');
                    $sight['head_bob'] = $this->input->post('head_bob');
                    $sight['arm_wave'] = $this->input->post('arm_wave');
                    $sight['tail_slap'] = $this->input->post('tail_slap');
                    $sight['ch'] = $this->input->post('ch');
                    $sight['fighting'] = $this->input->post('fighting');
                    $sight['eating'] = $this->input->post('eating');
                    $sight['hb_fast'] = $this->input->post('hb_fast');
                    $sight['hb_slow'] = $this->input->post('hb_slow');
                    $sight['aw_left'] = $this->input->post('aw_left');
                    $sight['aw_right'] = $this->input->post('aw_right');
                    $sight['fighting_with_contact'] = $this->input->post('fighting_with_contact');
                    $sight['fighting_with_no_contact'] = $this->input->post('fighting_with_no_contact');
                    $sight['nesting'] = $this->input->post('nesting');
                    $sight['laying'] = $this->input->post('laying');
                    $sight['tasting'] = $this->input->post('tasting');
                    $sight['resting'] = $this->input->post('resting');
                    $sight['dew_lap'] = $this->input->post('dew_lap');
                    $sight['body_temp'] = $this->input->post('body_temp');
                    $sight['contact_id'] = $contact_id;
                    $this->db->insert('tbl_sightings_dragon',$sight);


                }else{

                    $catch['torso'] = $this->input->post('torso');
                    $catch['jaw_width'] = $this->input->post('jaw_width');
                    $catch['tail_girth'] = $this->input->post('tail_girth');
                    $catch['lower_fore_leg'] = $this->input->post('lower_fore_leg');
                    $catch['upper_hind_leg'] = $this->input->post('upper_hind_leg');
                    $catch['upper_fore_leg'] = $this->input->post('upper_fore_leg');
                    $catch['lower_hind_leg'] = $this->input->post('lower_hind_leg');
                    $catch['tail_length'] = $this->input->post('tail_length');
                    $catch['jaw_length'] = $this->input->post('jaw_length');
                    $catch['tail'] = $this->input->post('tail');
                    $catch['blood'] = $this->input->post('blood');
                    $catch['faeces'] = $this->input->post('faeces');
                    $catch['skin'] = $this->input->post('skin');
                    $catch['heamatology'] = $this->input->post('heamatology');
                    $catch['swab_skin'] = $this->input->post('swab_skin');
                    $catch['swab_oral'] = $this->input->post('swab_oral');
                    $catch['swab_cloacal'] = $this->input->post('swab_cloacal');
                    $catch['contact_id'] = $contact_id;
                    $this->db->insert('tbl_catchings_dragon',$catch);



                }

                
                
                $this->session->set_flashdata('message', 'Dragon Contact Added Successfully.');
                redirect(admin_url('dragon_contacts_management'));
            }
        }
    }

    function delete($id) {
        $data=array('status'=>0);
        // $this->db->set('last_login','current_login',false);
        $this->db->where('id',$id);
        $this->db->update('tbl_contact_dragon',$data);

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
        

        $this->Log_model->set_log($this->session->userdata('admin_user_id'), date("Y-m-d H:i:s"), "Deleted Dragon Contacts of ID".$id);
        redirect(admin_url('dragon_contacts_management'));
    }

    //function edit($id, $dragon_id) {
       // $user_id = $this->session->userdata('admin_user_id');
        //$data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        //$data['edit'] = $this->db->where('id', $id)->get('tbl_contact_dragon')->row();
        //$data['dragon'] = $this->Dragon_model->get_dragon($dragon_id);
        //$data['habitat_types'] = $this->Dragon_model->get_habitiat_types();
        // debug($data); exit;
        //$data['users'] = $this->Dragon_model->get_users();
        //$data['title'] = 'Dragon Contact Management';
        //$data['main'] = ('dragon_contacts/form');
        //$this->load->view('admin/index', $data);
    //}

     function edit($id, $dragon_id) {
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();
        $data['edit'] = $this->Dragon_model->get_dragon_contact($id);
        // debug($data); exit;

        // $data['dragon'] = $this->db->get_where('tbl_dragons', array('id'=>$dragon_id))->row();
        // $data['habitat_types'] = $this->Dragon_model->get_habitiat_types();
    

        // debug($data); exit;
        $data['users'] = $this->Dragon_model->get_users();
        $data['title'] = 'Dragon Contacts Management';
        $data['main'] = ('dragon_contacts/form');
        $data['title'] = 'Dragon contacts Management';
        $data['main'] = 'dragon_contacts/form';
        $this->load->view('admin/index', $data);
    }


    function update($id) {
       // debug($_POST); exit;
        $formSubmit = $this->input->post('submitForm');
        if ($formSubmit == 'Cancel') {
            redirect(admin_url('dragon_contacts_management'));
        } else {
            $this->form_validation->set_rules('survey_date', 'Survey Date', 'required');
            $this->form_validation->set_rules('lat', 'Latitude', 'required');
            $this->form_validation->set_rules('lon', 'Longitude', 'required');
            $this->form_validation->set_rules('sub_location', 'Sub Location', '');
            $this->form_validation->set_rules('habitat_type', 'Habitat Type', '');
            $this->form_validation->set_rules('field_record_by', 'Field Record By', 'required');
            $this->form_validation->set_rules('data_entry_by', 'Data Entry By', '');
            $this->form_validation->set_rules('diseased', 'Diseased', 'required');
            $this->form_validation->set_rules('gravid', 'Gravid', '');
            $this->form_validation->set_rules('notes', 'Notes', '');
            $this->form_validation->set_rules('dominance', 'Dominance', '');
            $this->form_validation->set_rules('head_bob', 'Head Bob', '');
            $this->form_validation->set_rules('arm_wave', 'Arm Wave', '');
            $this->form_validation->set_rules('tail_slap', 'Tail Slap', '');
            $this->form_validation->set_rules('ch', 'CH', '');
            $this->form_validation->set_rules('fighting', 'Fighting', '');
            $this->form_validation->set_rules('eating', 'Eating', '');
            $this->form_validation->set_rules('hb_fast', 'Head Bob Fast', '');
            $this->form_validation->set_rules('hb_slow', 'Head Bob Slow', '');
            $this->form_validation->set_rules('aw_left', 'Arm Wave Left', '');
            $this->form_validation->set_rules('aw_right', 'Arm Wave Right', '');
            $this->form_validation->set_rules('fighting_with_contact', 'Fighting With Contact', '');
            $this->form_validation->set_rules('fightiing_with_no_contact', 'Fighting With No Contact', '');
            $this->form_validation->set_rules('nesting', 'Neasting', '');
            $this->form_validation->set_rules('laying', 'Laying', '');
            $this->form_validation->set_rules('tasting', 'Tasting', '');
            $this->form_validation->set_rules('resting', 'Resting', '');
            $this->form_validation->set_rules('Dew_lap', 'Dew lap', '');
            $this->form_validation->set_rules('body_temp', 'Body Temperature', '');
            $this->form_validation->set_rules('torso', 'Torso', '');
            $this->form_validation->set_rules('jaw_width', 'Jaw Width', '');
            $this->form_validation->set_rules('tail_girth', 'Tail Girth', '');
            $this->form_validation->set_rules('lower_fore_leg', 'Lower Fore Leg', '');
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
                $this->edit($id, $this->input->post('dragon_id'));
            } else {

                $data['survey_date'] = $this->input->post('survey_date');
                $data['dragon_id'] = $this->input->post('dragon_id');
                $data['lat'] = $this->input->post('lat');
                $data['lon'] = $this->input->post('lon');
                $data['sub_location'] = $this->input->post('sub_location');
                // $data['contact_type'] = $this->input->post('contact_type');
                $data['habitat_type'] = $this->input->post('habitat_type');
                $data['notes'] = $this->input->post('notes');
                $data['data_entry_by'] = $this->session->userdata('admin_user_id');
                $data['field_record_by'] = $this->input->post('field_record_by');

                $this->db->where('id', $id);
                $this->db->update('tbl_contact_dragon', $data);
                $this->Log_model->set_log($this->session->userdata('admin_user_id'), date("Y-m-d"), "Updated Dragon Contacts");

                if($this->input->post('contact_type') == 0){
                    $sight['dominance'] = $this->input->post('dominance');
                    $sight['head_bob'] = $this->input->post('head_bob');
                    $sight['arm_wave'] = $this->input->post('arm_wave');
                    $sight['tail_slap'] = $this->input->post('tail_slap');
                    $sight['ch'] = $this->input->post('ch');
                    $sight['fighting'] = $this->input->post('fighting');
                    $sight['eating'] = $this->input->post('eating');
                    $sight['hb_fast'] = $this->input->post('hb_fast');
                    $sight['hb_slow'] = $this->input->post('hb_slow');
                    $sight['aw_left'] = $this->input->post('aw_left');
                    $sight['aw_right'] = $this->input->post('aw_right');
                    $sight['fighting_with_contact'] = $this->input->post('fighting_with_contact');
                    $sight['fighting_with_no_contact'] = $this->input->post('fighting_with_no_contact');
                    $sight['nesting'] = $this->input->post('nesting');
                    $sight['laying'] = $this->input->post('laying');
                    $sight['tasting'] = $this->input->post('tasting');
                    $sight['resting'] = $this->input->post('resting');
                    $sight['Dew_lap'] = $this->input->post('Dew_lap');
                    $sight['body_temp'] = $this->input->post('body_temp');
                    $this->db->where('id', $this->input->post('sighting_id'));
                    $this->db->update('tbl_sightings_dragon', $sight);

                }else{
                    $catch['torso'] = $this->input->post('torso');
                    $catch['jaw_width'] = $this->input->post('jaw_width');
                    $catch['tail_girth'] = $this->input->post('tail_girth');
                    $catch['lower_fore_leg'] = $this->input->post('lower_fore_leg');
                    $catch['upper_hind_leg'] = $this->input->post('upper_hind_leg');
                    $catch['upper_fore_leg'] = $this->input->post('upper_fore_leg');
                    $catch['lower_hind_leg'] = $this->input->post('lower_hind_leg');
                    $catch['tail_length'] = $this->input->post('tail_length');
                    $catch['jaw_length'] = $this->input->post('jaw_length');
                    $catch['tail'] = $this->input->post('tail');
                    $catch['blood'] = $this->input->post('blood');
                    $catch['faeces'] = $this->input->post('faeces');
                    $catch['skin'] = $this->input->post('skin');
                    $catch['heamatology'] = $this->input->post('heamatology');
                    $catch['swab_skin'] = $this->input->post('swab_skin');
                    $catch['swab_oral'] = $this->input->post('swab_oral');
                    $catch['swab_cloacal'] = $this->input->post('swab_cloacal');
                    $this->db->where('id', $this->input->post('catching_id'));
                    $this->db->update('tbl_catchings_dragon', $catch);

                }



                $this->session->set_flashdata('message', 'Dragon Contact Updated successfully.');
                redirect(admin_url('dragon_contacts_management'));
            }
        }
    }

    function view($id, $limit = 0){
        // debug($data); exit;
        $user_id = $this->session->userdata('admin_user_id');
        $data['profile'] = $this->db->select('image')->from('admin')->where('id', $user_id)->get()->row();  
        $data['detail'] = $this->Dragon_model->get_dragon_contact($id);



        // debug($data); exit;

        $config['base_url'] = admin_url('dragon_contacts_management/view/');
        $config['total_rows'] = $this->db->where('id',5)->from("tbl_contact_dragon")->count_all_results();
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['count'] = $config['total_rows'];

        $data['title'] = 'Individual Dragon Contact Management';
        $data['sub_title'] = 'View Contacts Details';
        $data['sub_link'] = 'dragon_contacts_management';
        $data['main'] = ('dragon_contacts/view');
        $this->load->view('admin/index', $data);

    }
}


?>
