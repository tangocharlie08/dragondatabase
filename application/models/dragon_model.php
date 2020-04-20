<?php


class Dragon_model extends CI_Model {


    function __construct() {
        parent::__construct();

        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('Excel');

    }

    function get_dragon_details($id) {
        $this->db->select('d.*, a.name as original_id_by_name');
        $this->db->from('tbl_dragons as d');
        $this->db->join('admin as a', 'd.original_id_by = a.id');
        // $this->db->join('tbl_location_dragon as l', 'l.id = d.general_location');
        $this->db->where('d.id', $id);
        $data = $this->db->get()->row();
        // debug($data); exit;
        return $data;

    }

  
    function get_dragons($limit){
        // echo 1;   exit;
        // $this->db->select('d.*');
        // $this->db->get('tbl_dragons');
        // $this->db->join('admin as a', 'd.original_id_by = a.id');
        // $this->db->join('tbl_location_dragon as l', 'l.id = d.general_location');
        $this->db->limit(50, $limit);
        $this->db->where('status', 1);
        $data =$this->db->get('tbl_dragons')->result();
        foreach ($data as $key => $value) {
            # code...
            $this->db->where('dragon_id',$value->id);
            $this->db->from("tbl_contact_dragon");
            // count($this->db->get()->result());
            $data[$key]->total_contacts = count($this->db->get()->result());
        }
        // debug($data); exit;

        return $data;

    }

    function get_contacts($limit){
        $this->db->select('c.*, d.id as dragon_id, d.status');
        $this->db->from('tbl_contact_dragon as c');
        
        $this->db->join('tbl_dragons as d', 'd.id = c.dragon_id');
        // $this->db->order_by("name", "asc");
        $this->db->where('d.status', 1);

        $this->db->limit(50, $limit);
        $data = $this->db->get()->result();
        return $data;
    }

    function get_catchings($limit){
        $this->db->select('c.*, co.id as contact_id, d.id as dragon_id, d.name as dragon_name');
        $this->db->from('tbl_catchings_dragon as c');
        $this->db->join('tbl_contact_dragon as co', 'co.id = c.contact_id');
        $this->db->join('tbl_dragons as d', 'co.dragon_id = d.id');
        $data = $this->db->limit(50, $limit)->get('tbl_catchings_dragon')->result();
        return $data;
    }

    function get_sightings($limit){
        $this->db->select('s.*, co.id as contact_id, d.id as dragon_id, d.name as dragon_name');
        $this->db->from('tbl_sightings_dragon as s');
        $this->db->join('tbl_contact_dragon as co', 'co.id = s.contact_id');
        $this->db->join('tbl_dragons as d', 'co.dragon_id = d.id');
         $data = $this->db->limit(50, $limit)->get('tbl_sightings_dragon')->result();
        return $data;
    }

    function get_contact($id){
        // print($id); exit;
        $this->db->select('c.*, d.name as dragon_name, a.name as field_recorded_by, u.name as data_entred_by, h.type as habitat');
        $this->db->from('tbl_contact_dragon as c');
        $this->db->join('tbl_dragons as d', 'd.id = c.dragon_id');
        $this->db->join('admin as a', 'a.id = c.field_record_by');
        $this->db->join('admin as u', 'u.id = c.data_entry_by');
        $this->db->join('tbl_habitat_type as h', 'h.id = c.habitat_type');
        $this->db->where('c.id', $id);
        $data = $this->db->get()->row();
       
        return $data;
    }

    function get_dragon_contact($id){
        $data['contact'] = $this->db->get_where('tbl_contact_dragon', array('id'=>$id))->row();
        $data['photos'] = $this->db->get_where('tbl_dragon_photos', array('contact_id'=>$id))->result();
        if($data['contact']->contact_type == 0){

            $data['sightings'] = $this->db->get_where('tbl_sightings_dragon', array('contact_id'=>$id))->row();
        }else{
           $data['catchings'] =  $this->db->get_where('tbl_catchings_dragon', array('contact_id'=>$id))->row();
        }


        //debug($data); exit;
        return $data;
    }

       
    function get_individual_dragon_contacts($limit, $id){

        $this->db->select('c.*, d.name as dragon_name, a.name as field_recorded_by');
        $this->db->from('tbl_contact_dragon as c');
        $this->db->join('tbl_dragons as d', 'd.id = c.dragon_id');
        $this->db->join('admin as a', 'a.id = c.field_record_by');
        $this->db->where('c.dragon_id', $id);
        $data = $this->db->limit(5, $limit)->get()->result();
        return $data;

    }


    function get_dragon_contacts($limit){
        $this->db->select('c.*, d.name as dragon_name, a.name as field_recorded_by, u.name as data_entred_by, h.type as habitat');
        $this->db->from('tbl_contact_dragon as c');
        $this->db->join('tbl_dragons as d', 'd.id = c.dragon_id');
        $this->db->join('admin as a', 'a.id = c.field_record_by');
        $this->db->join('admin as u', 'u.id = c.data_entry_by');
        $this->db->join('tbl_habitat_type as h', 'c.habitat_type = h.id');
        $data = $this->db->limit(5, $limit)->get('tbl_contact_dragon')->result();
        return $data;
    }

   


    function get_users(){
        $this->db->select('id, name, initials, user_type');
        $this->db->from('admin');
        $data = $this->db->get()->result();
        return $data;
    }


    function get_habitiat_types(){
        $data = $this->db->get('tbl_habitat_type')->result();
        return $data;
    }

    function get_dragon($id){
        $this->db->select('id, name, gender');
        $this->db->from('tbl_dragons');
        $this->db->where('id', $id);
        $data = $this->db->get()->row();
        return $data;
    }

    function get_sighting($id){
        $this->db->from('tbl_sightings_dragon as k');
        $this->db->where('k.id', $id);
        $data = $this->db->get()->row();
        //debug($data); exit;
        return $data;
    }

    function get_catching($id){
        //$data = $this->db->get_where('tbl_catchings_dragon', array('contact_id'=>$id))->row();
        $this->db->from('tbl_catchings_dragon as k');
        $this->db->where('k.id', $id);
        $data = $this->db->get()->row();
        //debug($data); exit;
        return $data;
    }
    function get_dragon_catching($limit, $id){

        
        $this->db->from('tbl_catchings_dragon as c');
        $this->db->where('c.id', $id);
        $data = $this->db->limit(5, $limit)->get()->result();
        return $data;

    }

    function filter($search_data, $limit){
        // debug($search_data); exit;
            $res = [];
            $response['results'] = [];

            if(isset($search_data['no_of_contacts'])){
                $this->session->set_userdata('no_of_contacts', $search_data['no_of_contacts']);
            }else{
                $this->session->unset_userdata('no_of_contacts');
            }

       
            if ($search_data) {
                $search = $search_data['search'];
                $this->session->set_userdata('search', $search);
            } else {
                $search = '';
                $this->session->unset_userdata('search', '');
            }

            $this->db->select('d.*, c.id as contact_id, c.time, c.diseased, c.gravid');
            $this->db->where("d.name LIKE '%$search%'");
            $this->db->from('tbl_dragons as d');
            $this->db->join('tbl_contact_dragon as c', 'c.dragon_id = d.id');

            if(isset($search_data['diseased'])){
                $this->session->set_userdata('diseased', $search_data['diseased']);
                $diseased = $search_data['diseased'];
                $this->db->where('c.diseased', $search_data['diseased']);

            }else{
                // $diseased = 0;
                $this->session->unset_userdata('diseased');

            }


            if(isset($search_data['gender'])){
                $this->session->set_userdata('gender', $search_data['gender']);
                $this->db->where('d.gender', $search_data['gender']);
                // $gender = $search_data['gender'];

            }else{
                 $this->session->unset_userdata('gender');

            }

            if(isset($search_data['gravid'])){
                $this->session->set_userdata('gravid', $search_data['gravid']);
                // $gravid = $search_data['gravid'];

                $this->db->where('c.gravid', $search_data['gravid']);

            }else{
                 $this->session->unset_userdata('gravid');

            }

            

            $this->db->where('d.status', 1);
            $this->db->group_by('d.name');
            $result = $this->db->get()->result();
            // debug($result); exit;
            foreach ($result as $key => $value) {

                if($value->diseased == 1){
                    $sighted_date = $this->db->get_where('tbl_contact_dragon', array('id'=>$value->contact_id))->row()->survey_date;
                    $result[$key]->date_diseased_sighted = $sighted_date;
                }else{
                    $result[$key]->date_diseased_sighted = '';
                }

                if($value->gravid == 1){
                    $sighted_date = $this->db->get_where('tbl_contact_dragon', array('id'=>$value->contact_id))->row()->survey_date;
                    $result[$key]->date_gravid_sighted = $sighted_date;
                }else{
                    $result[$key]->date_gravid_sighted = '';
                }
                $total_contacts = count($this->db->get_where('tbl_contact_dragon', array('dragon_id' => $value->id ))->result());
                $result[$key]->total_contacts = $total_contacts;
                
                $total_catches = count($this->db->get_where('tbl_contact_dragon', array('dragon_id' => $value->id, 'contact_type'=>1))->result());
                $result[$key]->total_catches = $total_catches;
                if(isset($search_data['no_of_contacts'])){
                    // $this->session->set_userdata('no_of_contacts') = $search_data['no_of_contacts'];
                    if($search_data['no_of_contacts'] == 1){
                        if($total_contacts <=10){
                            $res[] = $value;

                        }

                        
                    }else if($search_data['no_of_contacts'] == 10){
                        if($total_contacts>10 && $total_contacts <= 20){
                            $res[] = $value;

                        }

                    }else if($search_data['no_of_contacts'] == 20){
                        if($total_contacts>=20){
                            $res[] = $value;

                        }

                    }else{
                        $res[] = $value;
                    }
                    

                }else{
                    $res[] = $value;
                }
            }

            $response['total'] = count($res);

            // debug($response); exit;




            $this->db->select('d.*, c.id as contact_id, c.time, c.diseased, c.gravid');
            $this->db->where("d.name LIKE '%$search%'");
            $this->db->from('tbl_dragons as d');
            $this->db->join('tbl_contact_dragon as c', 'c.dragon_id = d.id');

            if(isset($search_data['diseased'])){
                $this->session->set_userdata('diseased', $search_data['diseased']);
                $this->db->where('c.diseased', $search_data['diseased']);

            }else{
                 $this->session->unset_userdata('diseased');

            }


            if(isset($search_data['gender'])){
                $this->session->set_userdata('gender', $search_data['gender']);
                $this->db->where('d.gender', $search_data['gender']);

            }else{
                 $this->session->unset_userdata('gender');

            }

            if(isset($search_data['gravid'])){
                $this->session->set_userdata('gravid', $search_data['gravid']);
                $this->db->where('c.gravid', $search_data['gravid']);

            }else{
                 $this->session->unset_userdata('gravid');

            }

            if(isset($search_data['sort_by'])){
                $this->session->set_userdata('sort_by', $search_data['sort_by']);
                // $order_by = $search_data['order_by'];

                if($search_data['sort_by'] == 1){
                    $this->db->order_by('d.name', 'ASC');
                }else{
                     $this->db->order_by('d.id', 'ASC');
                }

            }else{
                 $this->session->unset_userdata('sort_by');

            }

            
            $this->db->where('d.status', 1);

            $this->db->group_by('d.name');

            $result = $this->db->limit(50, $limit)->get()->result();

            // echo $result['total'];


            foreach ($result as $key => $value) {

                if($value->diseased == 1){
                    $sighted_date = $this->db->get_where('tbl_contact_dragon', array('id'=>$value->contact_id))->row()->survey_date;
                    $result[$key]->date_diseased_sighted = $sighted_date;
                }else{
                    $result[$key]->date_diseased_sighted = '';
                }

                if($value->gravid == 1){
                    $sighted_date = $this->db->get_where('tbl_contact_dragon', array('id'=>$value->contact_id))->row()->survey_date;
                    $result[$key]->date_gravid_sighted = $sighted_date;
                }else{
                    $result[$key]->date_gravid_sighted = '';
                }
                $total_contacts = count($this->db->get_where('tbl_contact_dragon', array('dragon_id' => $value->id ))->result());
                $result[$key]->total_contacts = $total_contacts;

                $total_catches = count($this->db->get_where('tbl_contact_dragon', array('dragon_id' => $value->id, 'contact_type'=>1))->result());
                $result[$key]->total_catches = $total_catches;
                
                
                if(isset($search_data['no_of_contacts'])){
                    // $this->session->set_userdata('no_of_contacts') = $search_data['no_of_contacts'];
                    if($search_data['no_of_contacts'] == 1){
                        if($total_contacts <=10){
                            $response['results'][] = $value;

                        }

                        
                    }else if($search_data['no_of_contacts'] == 10){
                        if($total_contacts>10 && $total_contacts <= 20){
                            $response['results'][] = $value;

                        }

                    }else if($search_data['no_of_contacts'] == 20){
                        if($total_contacts>=20){
                            $response['results'][] = $value;

                        }

                    }else{
                        $response['results'][] = $value;
                    }
                    

                }else{
                    $response['results'][] = $value;
                }
            }

            // debug($response); exit;
            
            return $response;

        

        
        // $this->db->join('');

        // debug($result); exit;
    }

    function createExcel($search_data){

        // echo 1; exit;


       



        if(isset($search_data['no_of_contacts'])){
            $this->session->set_userdata('no_of_contacts', $search_data['no_of_contacts']);
        }else{
            $this->session->unset_userdata('no_of_contacts');
        }

   
        if ($search_data) {
            $search = $search_data['search'];
            $this->session->set_userdata('search', $search);
        } else {
            $search = '';
            $this->session->unset_userdata('search', '');
        }

        $this->db->select('d.*, c.id as contact_id, c.time, c.diseased, c.gravid');
        $this->db->where("d.name LIKE '%$search%'");
        $this->db->from('tbl_dragons as d');

        if(isset($search_data['diseased'])){
            $this->session->set_userdata('diseased', $search_data['diseased']);
            $diseased = $search_data['diseased'];
            $this->db->where('c.diseased', $search_data['diseased']);

        }else{
            $diseased = 0;
            $this->session->unset_userdata('diseased');

        }


        if(isset($search_data['gender'])){
            $this->session->set_userdata('gender', $search_data['gender']);
            $this->db->where('d.gender', $search_data['gender']);
            $gender = $search_data['gender'];

        }else{
             $this->session->unset_userdata('gender');

        }

        if(isset($search_data['gravid'])){
            $this->session->set_userdata('gravid', $search_data['gravid']);
            $gravid = $search_data['gravid'];

            $this->db->where('c.gravid', $search_data['gravid']);

        }else{
             $this->session->unset_userdata('gravid');

        }

        if(isset($search_data['sort_by'])){
            $this->session->set_userdata('sort_by', $search_data['sort_by']);
            // $order_by = $search_data['order_by'];

            if($search_data['sort_by'] == 1){
                $this->db->order_by('d.name', 'ASC');
            }else{
                 $this->db->order_by('d.id', 'ASC');
            }

        }else{
             $this->session->unset_userdata('sort_by');

        }

        $this->db->join('tbl_contact_dragon as c', 'c.dragon_id = d.id');
        
        $this->db->where('d.status', 1);
        $this->db->group_by('d.name');
        $result = $this->db->get()->result();
        // debug($result); exit;
        foreach ($result as $key => $value) {

            if($value->diseased == 1){
                $sighted_date = $this->db->get_where('tbl_contact_dragon', array('id'=>$value->contact_id))->row()->survey_date;
                $result[$key]->date_diseased_sighted = $sighted_date;
            }else{
                $result[$key]->date_diseased_sighted = '';
            }

            if($value->gravid == 1){
                $sighted_date = $this->db->get_where('tbl_contact_dragon', array('id'=>$value->contact_id))->row()->survey_date;
                $result[$key]->date_gravid_sighted = $sighted_date;
            }else{
                $result[$key]->date_gravid_sighted = '';
            }



            $total_contacts = count($this->db->get_where('tbl_contact_dragon', array('dragon_id' => $value->id ))->result());
            $result[$key]->total_contacts = $total_contacts;
            
            $total_catches = count($this->db->get_where('tbl_contact_dragon', array('dragon_id' => $value->id, 'contact_type'=>1))->result());
            $result[$key]->total_catches = $total_catches;
            if(isset($search_data['no_of_contacts'])){
                // $this->session->set_userdata('no_of_contacts') = $search_data['no_of_contacts'];
                if($search_data['no_of_contacts'] == 1){
                    if($total_contacts <=10){
                        $response['results'][] = $value;

                    }

                    
                }else if($search_data['no_of_contacts'] == 10){
                    if($total_contacts>10 && $total_contacts <= 20){
                        $response['results'][] = $value;

                    }

                }else if($search_data['no_of_contacts'] == 20){
                    if($total_contacts>=20){
                        $response['results'][] = $value;

                    }

                }else{
                    $response['results'][] = $value;
                }
                

            }else{
                    $response['results'][] = $value;
            }
        }

        $result = $response['results'];



        $fileName = 'search_result'.time().'.xlsx';  
        // load excel library
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Index');

        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Dragon Id');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Dragon Name');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Total Contacts');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Gender');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Original ID By');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'General Location');   
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Notes');       
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'DNA');       
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Diseased');       
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Gravid');       
        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'First Sighted With Disease'); 
        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'First Sighted With Gravid');  
        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'Total Catches');     

       
        // set Row
        $rows = 2;
        $i = 1;
        foreach ($result as $val) {
            // debug($val->original_id_by);

            $originalid_by = $this->db->get_where('admin', array('id'=>$val->original_id_by))->row();
            if(!empty($originalid_by)){
                $original_id_by = $originalid_by->name;

            }
            $generalLocation = $this->db->get_where('tbl_location_dragon', array('id'=>$val->general_location))->row();
            if(!empty($generalLocation)){
                $general_location = $generalLocation->location;
            }else{
                $general_location = "";

            }
            if($val->gender == 0){
                $gender =  "Female";
            }else{
                $gender = "Male";
            }
            if($val->diseased == 0){
                $diseased = "No";
            }else{
                $diseased = "Yes";
            }

            if($val->gravid == 0){$gravid = "No";}else{$gravid =  "Yes";}
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $rows, $i);


            $objPHPExcel->getActiveSheet()->setCellValue('B' . $rows, $val->id);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $rows, $val->name);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $rows, $val->total_contacts);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $rows, $gender);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $rows, $original_id_by);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $rows, $general_location);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $rows, $val->notes);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $rows, $val->dna);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $rows, $diseased);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $rows, $gravid);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $rows, $val->date_diseased_sighted);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $rows, $val->date_gravid_sighted);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $rows, $val->total_catches);


            
            $rows++;
            $i++;
        }

        $filename = "search_result_". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 



        
        // $this->session->set_flashdata('message', 'File downloaded.');
        // redirect(admin_url(''));


    }




}


?>