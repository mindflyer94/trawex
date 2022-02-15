<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/CreatorJwt.php';
class Authentication extends CI_Controller {

	function __construct()
    {
        parent:: __construct();
        $this->load->database();
        $this->load->model("registration");
        $this->objOfJwt = new CreatorJwt();
        header('Content-Type: application/json');
        $this->load->helper(array('cookie'));
    }

    function __destruct()
    {
        $this->db->close();
    }

	
	public function index()
	{
        $reg['email'] = $this->security->xss_clean($this->input->post('email'));
		$reg['password'] = $this->security->xss_clean($this->input->post('password'));
        $result = $this->registration->login($reg);
        if($result){

            $tokenData['empid'] = $result;
            $tokenData['timeStamp'] = Date('Y-m-d h:i:s');
            $jwtToken = $this->objOfJwt->GenerateToken($tokenData);
           // set_cookie('Token',$jwtToken,'999600');
            $data['Token'] = $jwtToken;
            echo json_encode($data);
        }else{
           $data['error'] = 'Invalid credentials';
           echo json_encode($data);
        }
      
	}
    public function login_success(){
         $received_Token = $this->input->get_request_header('Authorization', TRUE);
        try
        { 
           // print_r($this->input->get_request_header('Authorization', TRUE));die();
           if($received_Token!=null){
            $jwtData = $this->objOfJwt->DecodeToken(explode(' ',$received_Token)[1]);
            $emp['id']=$jwtData['empid'];
            $data['employee']=$this->registration->get_emp($emp);
            echo json_encode($data['employee']);

           }else{
            http_response_code('401');
            echo json_encode(array( "status" => false, "message" => "Unauthorized"));exit;
           }
        }
        catch (Exception $e)
            {
            http_response_code('401');
            echo json_encode(array( "status" => false, "message" => $e->getMessage()));exit;
        }
    }
	
}
