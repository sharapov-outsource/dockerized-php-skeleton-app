(function () {
  var __AppModals = {},
      __AppModalsClose = {},
      __AppModalsClass = 'l--modal',
      __Body = '';

  function __bindClick(elems, callback) {
    for (i = 0, l = elems.length; i < l; i++) {
      elems[i].onclick = callback;
    }
  }

  function __findClosest(el, sel) {
    while ((el = el.parentElement) && !((el.matches || el.matchesSelector).call(el, sel))) ;
    return el;
  }

  function __countOpenedModals() {
    _m = document.querySelectorAll('.' + __AppModalsClass);
    _v = 0;
    if (_m) {
      for (i = 0, l = _m.length; i < l; i++) if (__visible(_m[i])) _v++;
    }
    return _v;
  }

  function __visible(e) {
    return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length);
  }

  function __initModals() {
    __AppModals = document.querySelectorAll('[data-toggle="modal"]');
    __AppModalsClose = document.querySelectorAll('.' + __AppModalsClass + '-close');
    __Body = document.getElementsByTagName('body')[0];
    // Modals
    if (__AppModals.length > 0) {
      __bindClick(__AppModals, function (event) {
        $__c = __countOpenedModals();
        if (typeof event.target.dataset.target == "undefined") {
          console.error("No target popup defined");
        } else {
          $__mid = event.target.dataset.target;
          if ($__mid.indexOf('#') === 0) {
            $__mid = $__mid.slice(1);
          }
          $__m = document.getElementById($__mid);
          if (!$__m) {
            console.error("No target popup defined");
          } else {
            $__m.classList.add('open');
            $__m.style.zIndex = (($__c * 5) + 50);
            __Body.classList.add(__AppModalsClass + '-open');
          }
        }
      });
    }
    // Binding close modal buttons
    if (__AppModalsClose.length > 0) {
      __bindClick(__AppModalsClose, function (event) {
        $__p = __findClosest(event.target, '.' + __AppModalsClass);
        if (!$__p) {
          console.error("No target popup defined");
        } else {
          $__p.classList.remove('open');
          __Body.classList.remove(__AppModalsClass + '-open');
          $__m.style.zIndex = '';
        }
      });
    }
  }

  document.addEventListener("DOMContentLoaded", function (event) {
    __initModals();
  });


}());


