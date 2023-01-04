<!DOCTYPE html>
<html>

<head>
  <title>Add New Question</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="addQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="top: 8%; width: 1000px;">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class=" modal-title w-100" id="addQuestionModalLabel">Add Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <div class="alert alert-danger print-error-msg" style="display:none">
              </div>
              <form class="mx-1 mx-md-4" id="addQuestion-form">
                <div class="d-flex flex-row align-items-center justify-content-start mb-4">
                  <label class="form-label inline" for="title"><b>Question</b></label>
                  <div class="form-outline flex-fill mb-0">
                    <input type="text" id="title" name="title" class="form-control ml-3" />
                  </div>
                </div>
                <div class="d-flex flex-row align-items-center justify-content-start mb-4">
                  <label for="dropdown1" class="category">
                    <b>Category</b>
                  </label>
                  <div class="col-sm-6">
                    <select class="form-control" id="categoryDropdown">
                      <option>Programming</option>
                      <option>Database Systems</option>
                      <option>Object Oriented Programming (OOP)</option>
                      <option>Algorithms</option>
                      <option>Data Structures</option>
                      <option>Machine Learning</option>
                    </select>
                  </div>
                  <label for="dropdown1" class="tags">
                    <b>Tags</b>
                  </label>
                  <div class="col-sm-4">
                    <select class="form-control" id="tagsDropdown">
                      <option>Java</option>
                      <option>Python</option>
                      <option>My SQL</option>
                      <option>DBMS</option>
                      <option>ML</option>
                      <option>C#</option>
                      <option>C++</option>
                    </select>
                  </div>
                </div>
                <div class="d-flex flex-row align-items-center justify-content-start mb-4">
                  <label class="form-label" for="description"><b>Description</b></label>
                  <div class="form-outline flex-fill mb-0 ml-1">
                    <textarea id="description" name="description" class="form-control ml-2"></textarea>
                  </div>
                </div>
                <div class="text-right">
                  <input id="btnAddQuestion" type="button" value="Add Question" class="btn btn-primary" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  tinymce.init({
    selector: 'textarea#description',
    max_height: 300,
    max_width: 400

  });
</script>
<script>
  $('#btnAddQuestion').click(function() {
    $.ajax({
      url: 'addQuesion',
      method: 'POST',
      dataType: 'json',
      data: {
        name: $('#name').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        confirm_password: $('#confirm_password').val()
      },
      success: function(data) {
        if ($.isEmptyObject(data.error)) {
          $(".print-error-msg").css('display', 'none');
          $('#registerModal').modal('hide');
          $('.modal-backdrop').remove();
          location.reload();
        } else {
          $(".print-error-msg").css('display', 'block');
          $(".print-error-msg").html(data.error);
        }
      }
    });
  })
</script>

</html>