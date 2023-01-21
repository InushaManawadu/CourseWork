<!DOCTYPE html>
<html>

<body>
  <!-- Modal -->
  <div class="modal fade" id="addAnswerModal" tabindex="-1" role="dialog" aria-labelledby="addAnswerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="top: 8%; width: 1000px;">
      <div class="modal-content">
        <div class="modal-header text-center" style="border-bottom: 2px solid #ccc;">
          <h3 class="modal-title w-100" id="addAnswerModalLabel"><b>Add Answer</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body" style="border: 2px solid #ccc;">
              <form class="mx-1 mx-md-4" id="addAnswer-form">
                <div class="d-flex flex-row align-items-center justify-content-start mb-4">
                  <div class="form-outline flex-fill mt-2 mb-0 ml-1 mr-1" style="border: 2px solid #ccc">
                    <textarea id="answerdescription" name="answer_description" class="form-control mr-2" style="height: 300px;"></textarea>
                  </div>
                </div>
                <div class="text-right">
                  <input id="btnEnterAnswer" type="button" value="Add Answer" class="btn" style="background-color:#1746A2; color:white" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>