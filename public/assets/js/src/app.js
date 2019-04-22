(function () {
  var __AppModals = {};
  var __Body = '';

  function __bindClick(elems, callback) {
    for (i = 0, l = elems.length; i < l; i++) {
      elems[i].onclick = callback;
    }
  }

  document.addEventListener("DOMContentLoaded", function (event) {
    __AppModals = document.querySelectorAll('[data-toggle="modal"]');
    __Body = document.getElementsByTagName('body')[0];
    // Modals
    if (__AppModals.length > 0) {
      __bindClick(__AppModals, function (event) {
        if (typeof event.target.dataset.target == "undefined") {
          console.warn("No target popup defined");
        } else {
          $__mid = event.target.dataset.target;
          if ($__mid.indexOf('#') === 0) {
            $__mid = $__mid.slice(1);
          }
          $__m = document.getElementById($__mid);
          if (!$__m) {
            console.warn("No target popup defined");
          } else {
            $__m.classList.add('open');
            __Body.classList.add('l--modal-open');
          }
          /*__bindClick(event.target.getElementsByClassName('.l--modal-close'), function (event) {
            console.log($__m);
            $__m.classList.remove('open');
          });*/
        }
      });
    }
  });


}());


