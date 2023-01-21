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
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-md p-2 mb-3 bg-white rounded" style=" border-bottom: 2px solid black;">
    <a class="navbar-brand" href="#">
      <img src="https://drive.google.com/uc?id=1HPhMZKMRU6ex8yMryCKNCkE9AyZt7szw" alt="logo" height="50" width="110" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <?php include "search_result_view.php"; ?>
      <form class="form-inline my-2 my-lg-0">
        <div class="input-group" style="margin-left: 150px;">
          <input type="text" class="form-control" id="search" placeholder="Search">
          <div class="input-group-append">
            <button class="btn btn-secondary" id="btnSearch" type="button" style="border: none;"><i class="fa fa-search"></i></button>
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
    <div class="col-md-8" style=" border-right: 2px solid black;">
      <img src="https://drive.google.com/uc?id=1HPhMZKMRU6ex8yMryCKNCkE9AyZt7szw" class="img-fluid" alt="logo">
    </div>
    <div class="col-md-4 d-flex flex-column">
      <h2><b>Statistics</b></h2>
      <div class="card mb-3" style="background-color:#87A2FB; border:none">
      </div>
      <div class="card mb-3" style="background-color:#9CC094; border:none">
        <div class="card-body rounded" style="display: inline-block;">
          <h4>Questions Posted <?php echo $questionCount ?></h4>
        </div>
      </div>
      <div class="card mb-3 mt-4" style="background-color:#719FB0; border:none">
        <div class=" card-body rounded" style="background-color:none">
          <h4>Questions Answered</h4>
        </div>
      </div>
      <div class="card mb-3 mt-4" style="background-color:#A3D2CA; border:none">
        <div class=" card-body rounded" style="background-color:none">
          <h4>Registered Users <?php echo $userCount ?></h4>
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
            '<div class = "card mt-2 mb-3 ml-4 mr-4 " id="card-' + response[i]['questionId'] + '" style=" border: 2px solid black; background-color:#FDEFEF;">' +
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
            '<div class = "card mb-3 ml-3 mr-3" style=" border: 1px solid black; background-color: #FDF6F0; margin-top:-15px" >' +
            '<div class = "card-body" style="margin-top:-15px;">' +
            '<h5 class = "card-title float-left">' + response[i]['title'] + '</h5>' +
            '<h5 class = "card-title float-right" >' +
            '<?php if ($this->session->has_userdata('authenticated') == TRUE) { ?>' +
            '<button class="btnEdit" style = "background:none; border:none; outline: none;" data-questiontitle=' + response[i]['title'] + ' data-questioncategory= ' + response[i]['category'] + ' data-questiontag= ' + response[i]['tag'] + ' data-questiondescription= ' + response[i]['description'] + ' data-questionid= ' + response[i]['questionId'] + '> <i class = "fas fa-edit mr-2" > </i></button >' +
            '<button class="btnDelete"' + 'data-id="' + response[i]['questionId'] + '"' + 'style ="background:none; border:none; outline: none;" > <i class = "fas fa-trash-alt" > </i></button >' +
            '<?php } ?>' +
            '</h5></div> <p class = "card-text ml-3 mt-0" > ' + response[i]['description'] + ' </p> </div>' +
            '<div class = "float-left mt-1 ml-3">' +
            '<button type = "button" class = "btn mr-2" id="btnUpVote" style="background-color: #1C6DD0; color: white;" data-id="' + response[i]['questionId'] + '">' + '<i class="fas fa-arrow-up"></i>' + response[i]['upVote'] + '</button>' +
            '<button type = "button" class = "btn" id="btnDownVote" style="background-color: #F05454; color: white;" data-id="' + response[i]['questionId'] + '">' + '<i class="fas fa-arrow-down"></i>' + response[i]['downVote'] + '</button>' +
            '</div>' +
            '<div class = "float-right mt-1 mr-3 mb-1" >' +
            '<?php if ($this->session->has_userdata('authenticated') == TRUE) { ?>' +
            '<button type = "button" class = "btn mr-2" style="background-color: #1746A2; color: white;"> Add Answer </button>' +
            '<?php } ?>' +
            '<button type = "button" class = "btn" style="background-color: #1746A2; color: white;"> Answers </button>' +
            '</div>' +
            '</div>' +
            '</div>'
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

  $(document).on('click', '#btnUpVote', function() {
    var questionId = $(this).data('id');
    var button = $(this);
    $.ajax({
      url: 'upVote/' + questionId,
      method: 'PUT',
      dataType: 'json',
      success: function(data) {
        button.html('<i class="fas fa-arrow-up"></i> ' + data);
      }
    })
  });

  $(document).on('click', '#btnDownVote', function() {
    var questionId = $(this).data('id');
    var button = $(this);
    $.ajax({
      url: 'downVote/' + questionId,
      method: 'PUT',
      dataType: 'json',
      success: function(data) {
        button.html('<i class="fas fa-arrow-up"></i> ' + data);
      }
    })
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js" integrity="sha512-7fNh7OUGa7bdpmSQ81iNxgBywspNTxVxBxfbT1gSnQ124VGfksj3AR/QGhdYaO8ZLHBLSoaa+VsVDgw795eBaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js" integrity="sha512-2iFkil35hkKA78DUZ8CwBt3lvbJndUGmCqTQfPqNoFT0RgDMmPGG7jCoVq9OUTGKY7THczZwBh4sUd0QyQiJrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  var SearchView = Backbone.View.extend({
    events: {
      'click #btnSearch': 'search'
    },

    initialize: function() {
      this.input = this.$("#search");
    },

    search: function() {
      var keyword = this.input.val();
      if (keyword) {
        $.ajax({
          url: "search",
          method: "POST",
          dataType: 'json',
          data: {
            keyword: keyword
          },
          success: function(response) {
            if (response.status) {
              this.render(response.data);
            } else {
              alert("No Results Found.")
            }
          }.bind(this)
        });
      } else {
        alert("Search field is empty.");
      }
    },

    render: function(data) {
      var modalBody = $("#search-modal .modal-body");
      modalBody.empty();
      for (var i = 0; i < data.length; i++) {
        var question = data[i];
        var html = '<div class="card mb-3">' +
          '<div class="card-body">' +
          '<h5 class="card-title">' + question.title + '</h5>' +
          '<p class="card-text"><b>Description:</b> ' + question.description + '</p>' +
          '<p class="card-text"><b>Category:</b> ' + question.category + '</p>' +
          '</div>' +
          '</div>';
        modalBody.append(html);
      }
      $("#search-modal").modal("show");
    }
  });

  var searchView = new SearchView({
    el: 'form'
  });
</script>

</html>