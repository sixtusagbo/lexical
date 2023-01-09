function processSignup() {
  // clear error message and red borders on signupButton click
  $('#error').html('');

  $.ajax({
    url: '../../../inc/process_signup.php',
    data: $('#registration-form').serialize(),
    type: 'POST',
    dataType: 'json',
    success: function (data) {
      if ('ok' == data.status) {
        window.location.href = '../../../auth/dashboard';
      } else if ('fail' == data.status) {
        $('#error').html(data.message);
        $(window).scrollTop(0);
      }
    },
  });
}

/* Behaviours */

$('#signupButton').on('click', function (e) {
  // onClick for signup button
  e.preventDefault();
  processSignup();
});

$('#registration-form input').keyup(function (e) {
  if (e.keyCode == 13) {
    // enter key
    processSignup();
  }
});
