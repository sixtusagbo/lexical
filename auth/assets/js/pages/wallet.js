var LexicalPay = (function ($) {
  'use strict';

  var lexical = {};

  Date.prototype.toDateInputValue = function () {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
  };
  function fallbackCopyTextToClipboard(text) {
    var textArea = document.createElement('textarea');
    textArea.value = text;

    // Avoid scrolling to bottom
    textArea.style.top = '0';
    textArea.style.left = '0';
    textArea.style.position = 'fixed';

    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'successful' : 'unsuccessful';
      document.getElementById('copyIcon').innerHTML = 'Copied';
    } catch (err) {
      console.error('Fallback: Oops, unable to copy', err);
    }

    document.body.removeChild(textArea);
  }
  lexical.copyTextToClipboard = function (text) {
    if (!navigator.clipboard) {
      fallbackCopyTextToClipboard(text);
      return;
    }
    navigator.clipboard.writeText(text).then(
      function () {
        document.getElementById('copyIcon').innerHTML = 'Copied';
      },
      function (err) {
        console.error('Async: Could not copy text: ', err);
      }
    );
  };
  function processCashout() { // cashout ajax
    // clear error message and red borders on signupButton click
    $('#error').html('');

    $.ajax({
      url: '../../../../inc/process_wallet.php',
      data: $('#cashOutForm').serialize(),
      type: 'POST',
      dataType: 'json',
      success: function (data) {
        if ('ok' == data.status) {
          document.getElementById('cashOutForm').reset();
          alert('Cash Out Placed Successfully!');
          location.reload();
        } else if ('fail' == data.status) {
          $('#error').html(data.message);
          $(window).scrollTop(0);
        }
      },
    });
  }

  /* Behaviours */
  $(document).ready(function () {
    $('#cashOutSection').hide();

    $('#initCashOut').click(function (e) {
      e.preventDefault();
      $('#cashOutSection').show();
    });

    $('#dateInputElement').val(new Date().toDateInputValue());

    $('#cashOutButton').on('click', function (e) {
      // onClick for cashout button
      e.preventDefault();
      processCashout();
    });

    $('#cashOutForm input').keyup(function (e) {
      if (e.keyCode == 13) {
        // enter key
        processCashout();
      }
    });
  });

  return lexical;
})(jQuery);
