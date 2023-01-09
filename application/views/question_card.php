<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-md p-2 mb-3 bg-white rounded">
  <a class="navbar-brand" href="#">
    <img src="https://drive.google.com/uc?id=1HPhMZKMRU6ex8yMryCKNCkE9AyZt7szw" alt="logo" height="50" width="110" />
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
        <button type="button" class="btn" style="color:black; background-color:#6658FF" data-toggle="modal" data-target="#addQuestionModal"><b> + Add Question </b></button>
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