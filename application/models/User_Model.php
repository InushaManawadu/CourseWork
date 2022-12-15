<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function register($data)
  {
    $this->db->insert('users', $data);
    return $this->db->insert_id();
  }

  public function login($data)
  {
    $this->db->select('*');
    $this->db->where('email', $data['login_email']);
    $this->db->where('password', $data['login_password']);
    $this->db->from('users');
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->row();
    } else {
      return false;
    }
  }
}
