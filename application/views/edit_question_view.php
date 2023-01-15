<body>
  <!-- Modal -->
  <div class="modal fade" id="editQuestionModal" tabindex="-1" role="dialog" aria-labelledby="editQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="top: 8%; width: 1000px;">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class=" modal-title w-100" id="addQuestionModalLabel">Edit Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <div class="alert alert-danger print-error-msg" style="display:none">
              </div>
              <form class="mx-1 mx-md-4" id="editQuestion-form">
                <div class="d-flex flex-row align-items-center justify-content-start mb-4">
                  <label class="form-label inline" for="title"><b>Question</b></label>
                  <div class="form-outline flex-fill mb-0">
                    <input type="text" id="editTitle" name="title" class="form-control ml-3" placeholder="Question Title" />
                  </div>
                </div>
                <div class="d-flex flex-row align-items-center justify-content-start mb-4">
                  <label for="dropdown1" class="category">
                    <b>Category</b>
                  </label>
                  <div class="col-sm-6">
                    <select class="form-control" id="editCategoryDropdown" name="category">
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
                    <select class="form-control" id="editTagDropdown" name="tag">
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
                    <textarea id="editDescription" name="question_description" class="form-control ml-2"></textarea>
                  </div>
                </div>
                <div class="text-right">
                  <input id="btnEditQuestion" type="button" value="Edit Question" class="btn btn-primary" />
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
    selector: 'textarea#editDescription',
    max_height: 300,
    max_width: 400
  });
</script>

</html>