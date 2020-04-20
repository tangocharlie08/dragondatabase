<?php

class Log_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function set_log($logged_by, $date, $log_description) {
        $data['logged_by'] = $logged_by;
        $data['log_description'] = $log_description;
        $data['created'] = date('Y-m-d H:i:s');

        $this->db->insert('tbl_logs', $data);

    }


}


?>