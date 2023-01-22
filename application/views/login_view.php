<!DOCTYPE html>
<html>

<head>
  <title>My Web</title>
</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="top: 16%;">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class=" modal-title w-100" id="loginModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <div class="alert alert-danger print-error-msg" style="display:none">
              </div>
              <form class="mx-1 mx-md-4" id="login-form">
                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                  <!-- <label class="form-label inline" for="">login_email</label> -->
                  <div class="form-outline flex-fill mb-0">
                    <input type="email" id="login_email" name="login_email" class="form-control ml-2" value="<?php echo set_value('login_email') ?>" placeholder="Email" />
                  </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                  <!-- <label class="form-label" for="">login_password</label> -->
                  <div class="form-outline flex-fill mb-0">
                    <input type="password" id="login_password" name="login_password" class="form-control ml-2" placeholder="Password" />
                  </div>
                </div>
                <div class="text-center">
                  <input id="btnLogin" type="button" value="Login" class="btn btn-primary btn-lg btn-block" />
                  <br />
                  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#registerModal" data-dismiss="modal"> Don't Have an Account? Register Here </button>
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
  $('#btnLogin').click(function() {
    $.ajax({
      url: 'login',
      method: 'POST',
      dataType: 'json',
      data: {
        login_email: $('#login_email').val(),
        login_password: $('#login_password').val()
      },
      success: function(data) {
        if ($.isEmptyObject(data.error)) {
          $(".print-error-msg").css('display', 'none');
          $('#loginModal').modal('hide');
          $('.modal-backdrop').remove();
          location.reload();
        } else {
          $(".print-error-msg").css('display', 'block');
          $(".print-error-msg").html(data.error);
        }
      }
    })
  })
</script>

</html>