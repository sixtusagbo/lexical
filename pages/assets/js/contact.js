var LexicalPay = (function () {
  'use strict';

  var lexical = {};

  function form_submit(thisForm, action, formData) {
    fetch(action, {
      method: 'POST',
      body: formData,
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
    }).then((data) => {
      if (data.status == 200) {
        $('#cover-spin').hide();
        Swal.fire('Message sent', '', 'success');
        thisForm.trigger('reset');
      } else if (data.status == 500) {
        data.json().then((data) => {
          if (data.nullError) {
            $('#cover-spin').hide();
            Swal.fire(data.nullError, '', 'error');
          } else if (data.networkError) {
            $('#cover-spin').hide();
            Swal.fire(data.networkError, '', 'error');
          }
        });
      }
    });
  }

  function validateEmail(email) {
    var input = document.createElement('input');
    input.type = 'email';
    input.value = email;

    if (input.checkValidity()) {
      return true;
    } else {
      return false;
    }
  }

  $('#contactFormSubmitButton').click(function (e) {
    e.preventDefault();

    $('#cover-spin').show();

    let thisForm = $('#contact-form');

    let action = thisForm.attr('action');
    let mail = $('#email').val();

    if (mail != '') {
      if (!validateEmail(mail)) {
        $('#cover-spin').hide();
        Swal.fire('Invalid Email address', '', 'info');
        return;
      }
    }

    let formData = new FormData(document.getElementById('contact-form'));

    form_submit(thisForm, action, formData);
  });

  return lexical;
})();
