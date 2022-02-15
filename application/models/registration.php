<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class registration extends CI_Model
{

    function insert($reg)
    {
        $data = array('name' => $reg['name'],
            'email' => $reg['email'],
            'password' => $reg['password'],
            );
       $query = $this->db->insert('employee', $data);
       if($query)
       return "success";
      
    }
    function login($reg){
        $this->db->select('id');
        $this->db->from('employee');
        $this->db->where('email',$reg['email']); 
         $this->db->where('password',$reg['password']);
        $query = $this->db->get('');
        if ($query->num_rows() > 0) {
        $ret = $query->row();
        return $ret->id;
    }
    return 0;
        
    }

    function get_emp($emp){
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('id',$emp['id']); 
        $query = $this->db->get('');
        if ($query->num_rows() > 0) {
            $ret = $query->row();
            return $ret;
    }
}


} ?>