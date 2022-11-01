<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $AuthModel = $this->load->model('AuthModel');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->AuthModel->check_login($username, $password);
        $jwt = new JWT();
        $JwtSecretKey = "MantapSumbagselfsadminin";
        $token = $jwt->encode($result, $JwtSecretKey, 'HS256');
        echo json_encode($token);
    }

    // public function index()
    // {
    //     echo 'Auth Controller';
    // }

    // public function token()
    // {
    //     $jwt = new JWT();

    //     $JwtSecretKey = "secret";
    //     $data = array(
    //         'userId' => 145,
    //         'email' => 'iyel@gmail.com',
    //         'userType' => 'admin'
    //     );

    //     $token = $jwt->encode($data, $JwtSecretKey, 'HS256');
    //     echo $token;
    // }

    // public function decode_token()
    // {
    //     $token = $this->uri->segment(3);
    //     // echo $token;
    //     $jwt = new JWT();

    //     $JwtSecretKey = "secret";

    //     $decoded_token = $jwt->decode($token, $JwtSecretKey, 'HS256');

    //     // echo '<pre>';
    //     // print_r($decoded_token);

    //     $token1 = $jwt->jsonEncode($decoded_token);
    //     echo $token1;
    // }
}
