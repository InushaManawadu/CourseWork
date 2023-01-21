<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* 
  Defines the question model. This makes connections with the database to add questions to the database,
  delete questions from the database, and edit questions in the database.
*/

class Question_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function addQuestion($data)
  {
    $insert = $this->db->insert('questions', $data);
    if ($insert) {
      return true;
    } else {
      return false;
    }
  }

  public function editQuestion($questionId, $data)
  {
    $this->db->where('questionId', $questionId);
    return $this->db->update('questions', $data);
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

  public function search($search_input)
  {
    $this->db->select('*');
    $this->db->from('questions');
    $this->db->like('title', $search_input);
    $this->db->or_like('description', $search_input);
    $this->db->or_like('category', $search_input);
    $this->db->or_like('tag', $search_input);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function upVote($questionId)
  {
    $this->db->set('upVote', 'upVote+1', FALSE);
    $this->db->where('questionId', $questionId);
    $this->db->update('questions');
    $query = $this->db->get_where('questions', array('questionId' => $questionId));
    return $query->row()->upVote;
  }

  public function downVote($questionId)
  {
    $this->db->set('downVote', 'downVote+1', FALSE);
    $this->db->where('questionId', $questionId);
    $this->db->update('questions');
    $query = $this->db->get_where('questions', array('questionId' => $questionId));
    return $query->row()->downVote;
  }
}
