<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    function __destruct()
    {
        $this->db->close();
    }

	
	public function index()
	{
		$this->load->view('registration');
	}
	public function registration(){
		$this->load->model("registration");
		 $reg['name'] = $this->security->xss_clean($this->input->post('name'));
		$reg['password'] = $this->security->xss_clean($this->input->post('password'));
		$reg['email'] = $this->security->xss_clean($this->input->post('email'));
        echo json_encode( $this->registration->insert($reg));
	}
	public function login(){
		$this->load->view('login');
	}
}
