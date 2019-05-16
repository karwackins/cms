<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: karwackid
 * Date: 2019-05-05
 * Time: 20:12
 */

class My_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loggedin()
    {
        return $this->session->userdata('logged');
    }

    public function logout()
    {
        session_destroy();
        redirect('http://cms.local/admin/cPanel/login');
    }
}