let scrollData = 0,
  isSearchPageMode = false,
  menuBottomTemp,
  menuBigTemp;
$(document).ready(function () {
  init();
});
function init() {
  menuBottomTemp = $("#menu-bottom").find("#explore-btn");
  menuBigTemp = $("#menu").find("#explore-btn");
  initEvent();
}
function initEvent() {
  $(window).click(function (e) {
    e.preventDefault();
    eventHandler(e);
  });
  $(window).resize(function () {
    responsive();
  });
  $(window).scroll(function () {
    console.log($(document).scrollTop());
    if (isSearchPageMode) return;
    scrollData = $(document).scrollTop();
  });
}
function eventHandler(e) {
  console.log(e);
  const target = $(e.target).attr("id");

  if (target === "search-btn") {
    enableSearchPage();
    isSearchPageMode = true;
  } else if (target === "search-cls-btn") {
    disableSearchPage();
    $(document).scrollTop(scrollData);
    isSearchPageMode = false;
  } else if (target === "like-btn") {
    likeBtn(e.target);
  } else if (target === "explore-btn" || target === "user-btn") {
    const menuBottomBtn = $("#menu-bottom").find("#" + target);
    const menuBigBtn = $("#menu").find("#" + target);
    disableMenuBottom(menuBottomTemp);
    disableMenuBottom(menuBigTemp);
    enableMenuBottom(menuBottomBtn);
    enableMenuBottom(menuBigBtn);
    menuBottomTemp = menuBottomBtn;
    menuBigTemp = menuBigBtn;
  }
}
function responsive() {
  if ($(window).width() > 640 && isSearchPageMode) {
    disableSearchPage();
    isSearchPageMode = false;
  }
}
function likeBtn(target) {
  const btn = $(target).find("i")[0];
  $(target).toggleClass("text-pink-600");
  $(btn).toggleClass("fa-regular");
  $(btn).toggleClass("fa-solid");
}
function enableMenuBottom(target) {
  if (!target) return;

  const btn = $(target).find("i")[0];
  $(btn).removeClass("fa-regular");
  $(btn).addClass("fa-solid");
}
function disableMenuBottom(target) {
  if (!target) return;
  const btn = $(target).find("i")[0];
  $(btn).addClass("fa-regular");
  $(btn).removeClass("fa-solid");
}
function enableSearchPage() {
  $("#search-btn").parent().addClass("hidden");
  $("#search").removeClass("hidden");
  $("#search").addClass("sm:flex");
  $("#search").addClass("flex");
  $("#menu").addClass("hidden");
  $("#main-content").addClass("hidden");
  $("#menu-bottom").addClass("hidden");
  $("#search-result").removeClass("hidden");
}
function disableSearchPage() {
  $("#search-btn").parent().removeClass("hidden");
  $("#search").addClass("hidden");
  $("#search").removeClass("sm:flex");
  $("#search").removeClass("flex");
  $("#menu").removeClass("hidden");
  $("#main-content").removeClass("hidden");
  $("#menu-bottom").removeClass("hidden");
  $("#search-result").addClass("hidden");
}
