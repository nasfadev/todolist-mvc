$(document).ready(init);
function init() {}
function initEvent() {
  $("body").click(function (e) {
    e.preventDefault();
    eventHandler(e);
  });
}
function eventHandler(e) {
  console.log(e);
}
