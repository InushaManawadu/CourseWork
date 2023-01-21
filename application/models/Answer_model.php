<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* 
  Defines the answer model. This makes connections with the database to add answers to the database.
*/

class Answer_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function addAnswer($data)
  {
    $insert = $this->db->insert('answers', $data);
    if ($insert) {
      return true;
    } else {
      return false;
    }
  }

  public function getAllAnswers($questionId)
  {
    $this->db->select('description');
    $this->db->where('questionId', $questionId);
    $this->db->from('answers');
    $query = $this->db->get();
    if ($query !== null) {
      return $query->result_array();
    } else {
      return "No Answers Found";
    }
  }
}
