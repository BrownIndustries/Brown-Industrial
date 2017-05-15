/**
 * Created by austinadams on 7/16/15.
 */
function ready(fn) {
  if (document.readyState != 'loading') {
    fn();
  }
  else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}

ready(function () {
  var animations = document.querySelectorAll('[data-fadein]');
  window.setTimeout(function () {
    for (var i = 0; i < animations.length; ++i) {
      var element = animations[i];
      window.setTimeout(function () {
        this.classList.add('shown');
      }.bind(element), 400 * i);
    }
  }, 800);
});
