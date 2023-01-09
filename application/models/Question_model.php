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

  public function deleteQuestion($questionId)
  {
    return $this->db->delete('questions', ['questionId' => $questionId]);
  }

  public function getAllQuestions()
  {
    $query = $this->db->query('SELECT * FROM questions');
    return $query->result_array();
  }

  public function getQuestionsByUser($userId)
  {
    $this->db->select('userId');
    $this->db->where('userId', $userId);
    $this->db->from('questions');
    $query = $this->db->get();
    $result = $query->row();
    if ($result !== null) {
      return $result->userId;
    } else {
      return "";
    }
  }
}
