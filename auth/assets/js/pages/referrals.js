var LexicalPay = (function () {
  'use strict';

  var lexical = {};
  
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
    );;
  };

  return lexical;
})();
