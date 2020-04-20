<?php

class Client_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function username_exists($email) {
        $this->db->from('customers');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row()->id;
        }
    }

    function get_password_username($email) {
        return $this->db->get_where('customers', array('email' => $email))->row()->password;
    }

    function get_user_id($email, $password) {
        $this->db->from('customers');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>