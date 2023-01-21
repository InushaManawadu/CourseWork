<!DOCTYPE html>
<html>

<body>
  <!-- Modal -->
  <div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="addQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="top: 8%; width: 1000px;">
      <div class="modal-content">
        <div class="modal-header text-center" style="border-bottom: 2px solid #ccc;">
          <h5 class=" modal-title w-100" id="addQuestionModalLabel">Add Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body" style="border: 2px solid #ccc;">
              <div class="alert alert-danger print-error-msg" style="display:none">
              </div>
              <form class="mx-1 mx-md-4" id="addQuestion-form">
                <div class="d-flex flex-row align-items-center justify-content-start mb-4">
                  <label class="form-label inline" for="title"><b>Question</b></label>
                  <div class="form-outline flex-fill mb-0">
                    <input type="text" id="title" name="title" class="form-control ml-3" style="border: 2px solid #ccc;" />
                  </div>
                </div>
                <div class="d-flex flex-row align-items-center justify-content-start mb-4">
                  <label for="dropdown1" class="category">
                    <b>Category</b>
                  </label>
                  <div class="col-sm-6">
                    <select class="form-control" id="categoryDropdown" name="category" style="border: 2px solid #ccc;">
                      <option style="display:none"></option>
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
                    <select class="form-control" id="tagDropdown" name="tag" style="border: 2px solid #ccc;">
                      <option style="display:none"></option>
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
                    <textarea id="description" name="question_description" class="form-control ml-2" style="border: 2px solid #ccc;"></textarea>
                  </div>
                </div>
                <div class="text-right">
                  <input id="btnAddQuestion" type="button" value="Add Question" class="btn" style="background-color:#1746A2; color:white" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<script>
  tinymce.init({
    selector: 'textarea#description',
    max_height: 300,
    max_width: 400
  });
</script>
<script>
  /* Script to handle the click event of the "Add Question" button, including an AJAX call 
    to add the question to the database.
  */
  $('#btnAddQuestion').click(function() {
    $.ajax({
      url: 'addQuestion',
      method: 'POST',
      dataType: 'json',
      data: {
        title: $('#title').val(),
        category: $('#categoryDropdown').val(),
        tag: $('#tagDropdown').val(),
        description: (((tinyMCE.get('description').getContent()).replace(/(&nbsp;)*/g, "")).replace(/(<p>)*/g, "")).replace(/<(\/)?p[^>]*>/g, "")
      },
      success: function(data) {
        if ($.isEmptyObject(data.error)) {
          // $(".print-error-msg").css('display', 'none');
          $('#addQuestionModal').modal('hide');
          $('.modal-backdrop').remove();
          location.reload();
        } else {
          // console.log('ree')
          $(".print-error-msg").css('display', 'block');
          $(".print-error-msg").html(data.error);
        }
      }
    });
  })
</script>

</html>