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
        $this->response(['status' => true, 'message' => 'Question Added Successfully.'], RestController::HTTP_OK);
        //echo json_encode(['success' => 'Question added successfully.']);
      } else {
        $this->session->set_flashdata('status', 'Something Went Wrong.!');
        $this->response(['status' => true, 'message' => 'Failed Adding Question'], RestController::HTTP_BAD_REQUEST);
      }
    }
  }

  public function modal_get()
  {
    $this->load->view('edit_question_view');
  }

  public function allQuestions_get()
  {
    $result = $this->question_model->getAllQuestions();
    echo json_encode($result);
  }

  public function editQuestion_put($questionId, $userId)
  {
    if ($this->session->userdata('auth_user')['userId'] == $userId) {
      $questionTitle = $this->put('questionTitle');
      $questionCategory = $this->put('questionCategory');
      $questionTag = $this->put('questionTag');
      $questionDescription = $this->put('questionDescription');
      $data = array(
        'title' => $questionTitle,
        'category' => $questionCategory,
        'tag' => $questionTag,
        'description' => $questionDescription
      );
      $result = $this->question_model->editQuestion($questionId, $data);
      if ($result) {
        $this->response(['status' => true, 'message' => 'Question Edited'], RestController::HTTP_OK);
      }
    } else {
      $this->response(['status' => false, 'message' => 'Question Editing Failed'], RestController::HTTP_OK);
    }
  }

  public function deleteQuestion_delete($questionId, $userId)
  {
    if ($this->session->userdata('auth_user')['userId'] == $userId) {
      $result = $this->question_model->deleteQuestion($questionId);
      if ($result) {
        $this->response(['status' => true, 'message' => 'Question Deleted'], RestController::HTTP_OK);
      }
    } else {
      $this->response(['status' => false, 'message' => 'Question Deletion Failed'], RestController::HTTP_OK);
    }
  }

  public function search_post()
  {
    $keyword = $this->input->post('keyword');
    if (empty($keyword)) {
      echo json_encode(['message' => 'Keyword is missing']);
      return;
    }
    $data = $this->question_model->get_question($keyword);
    //echo json_encode($data);
    if ($data) {
      $this->response(['status' => true, 'data' => $data, 'message' => 'Question Edited'], RestController::HTTP_OK);
    } else {
      $this->response(['status' => false, 'message' => 'Question Editing Failed'], RestController::HTTP_OK);
    }
  }
}
