<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

class QuestionController extends RestController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('question_model');
    $this->load->model('user_model');
    $this->load->helper('form');
    $this->load->library('form_validation');
  }

  public function addQuestion_post()
  {
    $this->form_validation->set_rules('title', 'Question Title', 'required', array('required' => 'Question Title is Mandotory.'));
    $this->form_validation->set_rules('category', 'Category', 'required', array('required' => 'Please Select a Question Category.'));
    $this->form_validation->set_rules('tag', 'Tag', 'required', array('required' => 'Please Select a Question Tag.'));
    $this->form_validation->set_rules('description', 'Description', 'required', array('required' => 'Question Description is Mandatory.'));

    if ($this->form_validation->run() == FALSE) {
      log_message('debug', validation_errors());
      $errors = validation_errors();
      echo json_encode(['error' => $errors]);
    } else {
      $userEmail = $this->session->userdata('auth_user')['login_email'];
      $userId = $this->user_model->getUserId($userEmail);
      $data = array(
        'title' => $this->input->post('title'),
        'category' => $this->input->post('category'),
        'tag' => $this->input->post('tag'),
        'description' => $this->input->post('description'),
        'userId' => $userId
      );

      $checking = $this->question_model->addQuestion($data);
      if ($checking) {
        $this->session->set_flashdata('status', 'Question Added Successfully.!');
        echo json_encode(['success' => 'Question added successfully.']);
      } else {
        $this->session->set_flashdata('status', 'Something Went Wrong.!');
      }
    }
  }
}