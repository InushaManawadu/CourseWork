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
  <div class="items" id="items">

  </div>
</body>

<script>
  $(document).ready(function() {
    $.ajax({
      url: '<?php echo base_url('allQuestions'); ?>',
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        var result = data.result;
        var html = '';
        var i;
        for (i = 0; i < result.length; i++) {
          html +=
            '<div class = "card mt-3 mb-3 ml-4 mr-4 bg-light" >' +
            '<div class = " card-body">' +
            '<div class = "card-body mt-0 d-inline-block text-left" >' +
            '<p class = "card-text" >' +
            '<i class = "fas fa-user-circle" > </i> User Name </p> </div>' +
            '<div class = "card-body d-inline-block text-left" >' +
            '<p class = "card-text" >' +
            '<i class = "far fa-calendar-alt" > </i> Date Created: <b>MM/DD / YYYY </b> </p> </div>' +
            '<div class = "card-body d-inline-block text-left" >' +
            '<p class = "card-text" >' +
            '<i class = "fas fa-random" > </i> Random Word: <b> lorem </b >' +
            '</p> </div>' +
            '<div class = "card mt-3 mb-3 ml-3 mr-3" >' +
            '<div class = "card-body" >' +
            '<h5 class = "card-title float-left" > Child card Title </h5>' +
            '<h5 class = "card-title float-right" >' +
            '<button style = "background:none; border:none; outline: none;" > <i class = "fas fa-edit mr-2" > </i></button >' +
            '<button style = "background:none; border:none; outline: none;" > <i class = "fas fa-trash-alt" > </i></button >' +
            '</h5> </div> <p class = "card-text ml-3 mt-0" > Child card content goes here... </p> </div> <div class = "float-right mt-3 mr-3 mb-3" >' +
            '<button type = "button" class = "btn btn-outline-secondary mr-2" > Add Answer </button>' +
            '<button type = "button" class = "btn btn-outline-secondary" > Answers </button> </div> </div> </div>'
        }
        $('#items').html(html);
      }
    });
  })
</script>

</html>