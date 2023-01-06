<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Question_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function addQuestion($data)
  {
    $this->db->insert('questions', $data);
    return $this->db->insert_id();
  }
}
