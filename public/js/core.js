let scrollData,
  isSearchPageMode,
  menuBottomTemp,
  menuBigTemp,
  scrollTopTemp,
  scrollTopDelta,
  menuScroll,
  menuBottomScroll;
const menuHeight = 64;
const menuBottomHeight = 40;
$(document).ready(function () {
  init();
});
function init() {
  initVar();
  initEvent();
}
function initVar() {
  menuBottomTemp = $("#menu-bottom").find("#explore-btn");
  menuBigTemp = $("#menu").find("#explore-btn");
  scrollTopTemp = 0;
  menuScroll = 0;
  menuBottomScroll = 0;
}
function initEvent() {
  $(window).click(function (e) {
    e.preventDefault();
    eventHandler(e);
  });
  $(window).resize(function () {
    responsive();
  });
  $(window).scroll(function (e) {
    initScrollTopDelta();
    searchPageModeScroll();
    navInteractiveScroll();
  });
}
function initScrollTopDelta() {
  let scrollTop = $(document).scrollTop();
  scrollTopDelta = scrollTopTemp - scrollTop;
  scrollTopTemp = scrollTop;
}
function clamp(min, max, value) {
  if (value >= min && value <= max) return value;
  if (value < min) return min;
  return max;
}
function navInteractiveScroll() {
  menuScroll = clamp(-menuHeight, 0, menuScroll + scrollTopDelta);
  menuBottomScroll = clamp(
    -menuBottomHeight,
    0,
    menuBottomScroll + scrollTopDelta
  );
  $("#nav").css("top", menuScroll + "px");
  $("#menu-bottom").css("bottom", menuBottomScroll + "px");
}

function searchPageModeScroll() {
  if (isSearchPageMode) return;
  scrollData = $(document).scrollTop();
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
  } else if (target === "card-more-btn") {
    enableCardMoreMenu();
  } else if (target === "more-menu") {
    enableCardMoreMenu();
  }
}
function responsive() {
  if ($(window).width() > 640 && isSearchPageMode) {
    disableSearchPage();
    isSearchPageMode = false;
  }
}
function enableCardMoreMenu(target) {
  const $moreMenu = $("#more-menu");
  const $moreMenuList = $("#more-menu").children().first();
  if ($moreMenu.hasClass("hidden")) {
    $moreMenu.css("opacity", 0);
    $moreMenuList.css("bottom", "-30px");
    $moreMenu.toggleClass("hidden");
    $moreMenu.animate(
      {
        opacity: 1,
      },
      150
    );
    $moreMenuList.animate(
      {
        bottom: "0px",
      },
      150
    );
  } else {
    $moreMenu.animate(
      {
        opacity: 0,
      },
      150,
      () => $moreMenu.toggleClass("hidden")
    );
    $moreMenuList.animate(
      {
        bottom: "-30px",
      },
      150
    );
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
