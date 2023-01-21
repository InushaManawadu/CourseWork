<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

/* 
  This rest contoller defines the functions need to implement the activities related to question.
  The following methods are presented in this controller.
    1. addQuestion       Type - POST     Main purpose - to add a new question to the database.
    2. modal             Type - GET      Main purpose - to add load the modal.
    3. allQuestions      Type - GET      Main purpose - get all questions from the database.
    4. editQuestion      Type - PUT      Main purpose - to update a question in the database.
    5. deleteQuestion    Type - DELETE   Main purpose - to delete a question in the database.
    6. addQuestion       Type - POST     Main purpose - to add a new question to the database.
*/

class AnswerController extends RestController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('answer_model');
    $this->load->model('user_model');
  }

  public function modal_get()
  {
    $this->load->view('add_answer_view');
  }

  public function addAnswer_post()
  {
    $userEmail = $this->session->userdata('auth_user')['login_email'];
    $userId = $this->user_model->getUserId($userEmail);
    $data = array(
      //pass question Id
      'description' => $this->input->post('description'),
      'questionId' => $this->input->post('questionId'),
      'userId' => $userId
    );

    $checking = $this->answer_model->addAnswer($data);
    if ($checking) {
      $this->session->set_flashdata('status', 'Answer Added Successfully.!');
      $this->response(['status' => true, 'message' => 'Answer Added Successfully.'], RestController::HTTP_OK);
    } else {
      $this->session->set_flashdata('status', 'Something Went Wrong.!');
      $this->response(['status' => true, 'message' => 'Failed Adding Answer'], RestController::HTTP_BAD_REQUEST);
    }
  }

  public function allAnswers_get($questionId)
  {
    $result = $this->answer_model->getAllAnswers($questionId);
    echo json_encode($result);
  }
}
