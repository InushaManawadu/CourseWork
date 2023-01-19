<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* 
  Defines the user model. This makes connections with the database to register a user, login a user
  and logout a user. Aparat from that addition functions like getUserDetails, getUserCount, getUserId
  are faciltates the functionality to get details of the currently logged in user, return the total number of
  registered users and returns the userId of the logged in user.
*/
class User_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function register($data)
  {
    $insert = $this->db->insert('users', $data);
    if ($insert) {
      return true;
    } else {
      return false;
    }
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

  public function getUserCount()
  {
    $query = $this->db->query('SELECT * FROM users');
    return $query->num_rows();
  }

  public function getUserId($email)
  {
    $this->db->select('userId');
    $this->db->where('email', $email);
    $this->db->from('users');
    $query = $this->db->get();
    $result = $query->row();
    if ($result) {
      return $result->userId;
    } else {
      return "";
    }
  }

  public function getUserDetails($userId)
  {
    $this->db->select('userId, name, email');
    $this->db->from('users');
    $this->db->where('userId', $userId);
    $query = $this->db->get();
    return $query->result_array();
  }
}
