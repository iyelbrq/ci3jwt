<?php

class AuthModel extends CI_Model
{

    function check_login($username, $password)
    {
        $query = $this->db->query("SELECT * FROM fs_login WHERE username='$username' AND password='$password' ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return "user not found";
        }
    }
}
