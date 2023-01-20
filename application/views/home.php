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

<body style="background-color: white;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-md p-2 mb-3 bg-white rounded" style=" border-bottom: 2px solid #ccc;">
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
            <button class="btn btn-secondary" type="button" style="border: none;"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
      <?php if ($this->session->has_userdata('authenticated') == TRUE) { ?>
        <?php include "add_question_view.php"; ?>
        <form class="form-inline my-2 my-lg-0">
          <button type="button" class="btn" style="color:black; background-color:#F98080" data-toggle="modal" data-target="#addQuestionModal"><b> + Add Question </b></button>
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
          <a class="btn dropdown-toggle" style="background-color: #D6F3E8;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> <?= $this->session->userdata('auth_user')['login_name']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <button type="button" id="btnLogout" class="btn"> <i class=" fas fa-sign-out-alt">Logout</i> </button>
          </div>
        </div>
      <?php } ?>
    </div>
  </nav>
  <div class="row mt-4 mr-4 ml-4">
    <div class="col-md-8" style=" border-right: 2px solid #ccc;">
      <img src="https://drive.google.com/uc?id=1HPhMZKMRU6ex8yMryCKNCkE9AyZt7szw" class="img-fluid" alt="logo" height="100">
    </div>
    <div class="col-md-4 d-flex flex-column">
      <h2><b>Our Statistics</b></h2>
      <div class="card mb-3" style="background-color:#6BADF1; border:none">
        <div class="card-body rounded" style="display: inline-block;">
          <h4>Questions <?php echo $count ?></h4>
        </div>
      </div>
      <div class="card mb-3 mt-4" style="background-color:#6BADF1; border:none">
        <div class=" card-body rounded" style="background-color:none">
          <h4>Answeres</h4>
        </div>
      </div>
      <div class="card mb-3 mt-4" style="background-color:#6BADF1; border:none">
        <div class=" card-body rounded" style="background-color:none">
          <h4>Users</h4>
        </div>
      </div>

    </div>
  </div>
  <div id="modal-container">
    <?php include "edit_question_view.php"; ?>
  </div>
  <div class="items" id="items">
  </div>
</body>
<script>
  // AJAX call to logout functionality
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
<script>
  // AJAX call to retrieve all the questions from the database when page is loading
  $(document).ready(function() {
    var array = [];
    $.ajax({
      url: 'allQuestions',
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        for (var i = 0; i < response.length; i++) {
          $.ajax({
            url: 'userDetails',
            method: 'GET',
            dataType: 'json',
            data: {
              userId: response[i]['userId']
            },
            success: function(data) {
              array.push(data[0]);
            }
          });
        }
        var html = '';
        var responses = array;
        for (var i = 0; i < response.length; i++) {
          html +=
            '<div class = "card mt-2 mb-3 ml-4 mr-4 bg-white" id="card-' + response[i]['questionId'] + '" style=" border: 2px solid #ccc;">' +
            '<div class = "test' + response[i]['questionId'] + ' card-body" style="margin-top: -40px" id="' + response[i]['userId'] + '">' +
            '<div class = "card-body mt-0 d-inline-block text-left" >' +
            '<p class = "card-text" >' +
            '<p> Created By:<b>' + '' + '</b></p> </div>' +
            '<div class = "card-body d-inline-block text-left" >' +
            '<p class = "card-text" >' +
            '<i class = "far fa-calendar-alt" > </i> Date Created: <b>' + response[i]['createdAt'] + '</b> </p> </div>' +
            '<div class = "card-body d-inline-block text-left" >' +
            '<p class = "card-text" >' +
            '<i class = "fas fa-random" > </i> Question Tags: <b>' + response[i]['tag'] + ', ' + response[i]['category'] + '</b >' +
            '</p> </div>' +
            '<div class = "card mt-2 mb-3 ml-3 mr-3" >' +
            '<div class = "card-body" style="margin-top:-15px">' +
            '<h5 class = "card-title float-left" >' + response[i]['title'] + '</h5>' +
            '<h5 class = "card-title float-right" >' +
            '<?php if ($this->session->has_userdata('authenticated') == TRUE) { ?>' +
            '<button class="btnEdit" style = "background:none; border:none; outline: none;" data-questiontitle=' + response[i]['title'] + ' data-questioncategory= ' + response[i]['category'] + ' data-questiontag= ' + response[i]['tag'] + ' data-questiondescription= ' + response[i]['description'] + ' data-questionid= ' + response[i]['questionId'] + '> <i class = "fas fa-edit mr-2" > </i></button >' +
            '<button class="btnDelete"' + 'data-id="' + response[i]['questionId'] + '"' + 'style ="background:none; border:none; outline: none;" > <i class = "fas fa-trash-alt" > </i></button >' +
            '<?php } ?>' +
            '</h5></div> <p class = "card-text ml-3 mt-0" > ' + response[i]['description'] + ' </p> </div> <div class = "float-right mt-3 mr-3 mb-3" >' +
            '<button type = "button" class = "btn btn-outline-secondary mr-2" > Add Answer </button>' +
            '<button type = "button" class = "btn btn-outline-secondary" > Answers </button>' +
            '</div> </div> </div>'
        }
        $('#items').html(html);
        // console.log(responses)
      }
    });
  })
</script>
<Script>
  // AJAX call to delete a question from the database
  $(document).on('click', '.btnDelete', function() {
    var questionId = $(this).data('id');
    var id = '.test' + questionId;
    var userId = $(id).attr('id');
    $.ajax({
      url: 'delete/' + questionId + "/" + userId,
      method: 'DELETE',
      dataType: 'json',
      data: {
        questionId: questionId,
        userId: userId
      },
      success: function(result) {
        if (result.status) {
          $('#card-' + questionId).remove();
        } else(
          alert('You are not authotized to delete questions posted by the other users.')
        )
      }
    });
  });
  //Retrieves the data attribute from the clicked element
  $(document).on('click', '.btnEdit', function() {
    var questionId = $(this).data('questionid');
    var questionTitle = $(this).data('questiontitle');
    var questionCategory = $(this).data('questioncategory');
    var questionTag = $(this).data('questiontag');
    var questionDescription = $(this).data('questiondescription');
    console.log(questionTitle)
    var id = '.test' + questionId;
    var userId = $(id).attr('id');

    // AJAX call to get the modal window for editing a question
    $.ajax({
      url: 'modal',
      type: 'GET',
      success: function(response) {
        $('#modal-container').html(response);
        $('#editTitle').val(questionTitle);
        $('#editCategoryDropdown').val(questionCategory);
        $('#editTagDropdown').val(questionTag);
        $('#editDescription').val(questionDescription);
        // tinyMCE.get('editDescription').setContent(questionDescription);
        $('#editQuestionModal').modal('show');
      }
    });

    // Populate data in the input fields of edit view modal
    $(document).on('click', '#btnEditQuestion', function() {
      var questionTitleNew = $('#editTitle').val();
      var questionCategoryNew = $('#editCategoryDropdown').val();
      var questionTagNew = $('#editTagDropdown').val();
      var questionDescriptionNew = $('#editDescription').val();
      $.ajax({
        url: 'edit/' + questionId + "/" + userId,
        type: 'PUT',
        data: {
          userId: userId,
          questionTitle: questionTitleNew,
          questionCategory: questionCategoryNew,
          questionTag: questionTagNew,
          questionDescription: questionDescriptionNew
        },
        success: function(response) {
          if (response.status) {
            $('#editQuestionModal').modal('hide');
            $('.modal-backdrop').remove();
            location.reload();
          } else {
            alert('You are not authotized to edit questions posted by the other users.')
            $('#editQuestionModal').modal('hide');
            $('.modal-backdrop').remove();
          }
        }
      })
    })

  });
</script>

</html>