<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

class UserController extends RestController
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->has_userdata('authenticated')) {

      $this->session->set_flashdata('status', 'You are already Loggedin!');
      // echo json_encode(['You are already Loggedin!']);
      // redirect(base_url('register'));
    }
    $this->load->model('user_model');
    $this->load->helper('form');
    $this->load->library('form_validation');
  }

  public function index_get()
  {
    $count = $this->user_model->getUserCount();
    $count = json_encode($count);
    $data = array('count' => $count);
    $this->load->view('navbar', $data);
  }

  public function login_post()
  {
    $this->form_validation->set_rules('login_email', 'Email', 'required');
    $this->form_validation->set_rules('login_password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
      $errors = validation_errors();
      echo json_encode(['error' => $errors]);
    } else {
      $data = [
        'login_email' => $this->input->post('login_email'),
        'login_password' => $this->input->post('login_password')
      ];
      $result = $this->user_model->login($data);
      if ($result != FALSE) {
        $authentication = [
          'login_name' => $result->name,
          'login_email' => $result->email,
          'login_password' => $result->email
        ];
        $response = array(
          "success" => true
        );
        $this->session->set_userdata('authenticated', '1');
        $this->session->set_userdata('auth_user', $authentication);
        $this->session->set_flashdata('status', 'Loggedin Successfully');
        echo json_encode($response);
      } else {
        $response = array(
          "success" => false,
          "error" => "Invalid Credentials. Please Try Again."
        );
        $this->session->set_flashdata('status', 'Invalid Credentials. Please Try Again.');
        echo json_encode($response);
      }
    }
  }

  public function logout_get()
  {
    $this->session->unset_userdata('authenticated');
    $this->session->unset_userdata('auth_user');
    $this->session->set_flashdata('status', 'You are logged out successfully');
    $response = array(
      "success" => true,
      "error" => "You are logged out successfully"
    );
    echo json_encode($response);
  }

  public function register_post()
  {
    $this->form_validation->set_rules('email', 'email', 'required|is_unique[users.email]', array('is_unique' => 'The %s is already in use. Please try with another email.'));
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');

    if ($this->form_validation->run() == FALSE) {
      log_message('debug', validation_errors());
      $errors = validation_errors();
      echo json_encode(['error' => $errors]);
    } else {
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        'confirm_password' => $this->input->post('confirm_password')
      );

      $checking = $this->user_model->register($data);
      log_message('debug', 'entered');
      if ($checking) {
        $this->session->set_flashdata('status', 'Registered Successfully.! Go to Login');
        echo json_encode(['success' => 'Record added successfully.']);
        // redirect(base_url('login'));
      } else {
        $this->session->set_flashdata('status', 'Something Went Wrong.!');
        // redirect(base_url('register'));
      }
    }
  }

  public function userDetails_get()
  {
    $userId = $this->input->get('userId');
    $result = $this->user_model->getUserDetails($userId);
    echo json_encode($result);
    log_message('debug', 'after endcoded output');
  }
}
