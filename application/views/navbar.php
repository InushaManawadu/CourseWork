<!DOCTYPE html>

<head>
  <title>TechQ - Where Developers Learn, Share and Shine</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/j3e8tidbd0lubesziq2io8ww6bulkv8w2125ip5dbqxj0ncf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<style>
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg p-2 mb-3 bg-white rounded">
    <a class="navbar-brand" href="#">
      <img src="https://drive.google.com/uc?id=1HPhMZKMRU6ex8yMryCKNCkE9AyZt7szw" alt="logo" height="42" width="110" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0">
        <div class="input-group" style="margin-left: 150px;">
          <input type="text" class="form-control" placeholder="Search">
          <div class="input-group-append">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
      <?php if ($this->session->has_userdata('authenticated') == TRUE) { ?>
        <?php include "add_question_view.php"; ?>
        <form class="form-inline my-2 my-lg-0">
          <button type="button" class="btn" style="color:black; background-color:#FF5858" data-toggle="modal" data-target="#addQuestionModal"><b> + Add Question </b></button>
        </form>
      <?php } ?>
      <?php include "login_view.php"; ?>
      <?php if (!$this->session->has_userdata('authenticated')) { ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <?php include "register_view.php"; ?>
            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#registerModal"> Register </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-outline-primary btn-sm ml-3" data-toggle="modal" data-target="#loginModal"> Login </button>
          </li>
        </ul>
      <?php } ?>
      <?php if ($this->session->has_userdata('authenticated') == TRUE) { ?>
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> <?= $this->session->userdata('auth_user')['login_name']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <button type="button" id="btnLogout" class="btn btn-primary"> <i class="fas fa-sign-out-alt">Logout</i> </button>
          </div>
        </div>
      <?php } ?>
    </div>
  </nav>
  <div class="row mt-4 mr-4 ml-4">
    <div class="col-md-8">
      <img src="https://drive.google.com/uc?id=1HPhMZKMRU6ex8yMryCKNCkE9AyZt7szw" class="img-fluid" alt="your image alt text here">
    </div>
    <div class="col-md-4 d-flex flex-column">
      <h3 class="my-3">Our Statistics</h3>
      <div class="card mb-3 border-success" style="background-color:none">
        <div class="card-body rounded">
          <b>Questions</b>
        </div>
      </div>
      <div class="card mb-3 border-success">
        <div class="card-body rounded" style="background-color:none">
          <b>Answered</b>
        </div>
      </div>
      <div class="card mb-3 border-success">
        <div class="card-body rounded" style="background-color:none">
          <b>Not Answered</b>
        </div>
      </div>
      <div class="card mb-3 border-success">
        <div class="card-body rounded" style="background-color:none">
          <b>Users</b>
          <b><?php echo $count; ?></b>
        </div>
      </div>
    </div>
  </div>

  <div class="card mt-3 mb-3 ml-4 mr-4 bg-light">
    <div class=" card-body">

      <div class="card-body mt-0 d-inline-block text-left">
        <p class="card-text">
          <i class="fas fa-user-circle"></i> User Name
        </p>
      </div>
      <div class="card-body d-inline-block text-left">
        <p class="card-text">
          <i class="far fa-calendar-alt"></i> Date Created: <b>MM/DD/YYYY</b>
        </p>
      </div>
      <div class="card-body d-inline-block text-left">
        <p class="card-text">
          <i class="fas fa-random"></i> Random Word: <b>lorem</b>
        </p>
      </div>
      <div class="card mt-3 mb-3 ml-3 mr-3">
        <div class="card-body">
          <h5 class="card-title float-left"> Child card Title </h5>
          <h5 class="card-title float-right">
            <button style="background:none; border:none; outline: none;"><i class="fas fa-edit mr-2"></i></button>
            <button style="background:none; border:none; outline: none;"><i class="fas fa-trash-alt"></i></button>
          </h5>
        </div>
        <p class="card-text ml-3 mt-0">Child card content goes here...</p>
      </div>
      <div class="float-right mt-3 mr-3 mb-3">
        <button type="button" class="btn btn-outline-secondary mr-2">Add Answer</button>
        <button type="button" class="btn btn-outline-secondary">Answers</button>
      </div>
    </div>
  </div>
  </div>
  </div>

</body>
<script>
  $('#btnLogout').click(function() {
    $.ajax({
      url: 'logout',
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        location.reload();
      }
    });
  });
</script>

</html>