let scrollData,
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
  window.addEventListener("popstate", function (e) {
    console.log(e);
  });
  $(window).on("popstate", function (e) {
    eventHandler(e);
  });
  $("a").click(function (e) {
    e.preventDefault();
    var d = this.href;
    window.history.pushState({ data: d }, d, d);
    console.log(d);
  });

  $(window).on("popstate", function (e) {
    var d = e.state || { data: "no state" };
    console.log("anjay" + d);
  });
  $(document).on("click", function (e) {
    eventHandler(e);
  });
  $(document).on("resize", function () {
    responsive();
  });
  addScrollEventListener();
}
function addScrollEventListener() {
  $(document).on("scroll", function (e) {
    initScrollTopDelta();
    searchPageModeScroll();
    navInteractiveScroll();
  });
}
function removeScrollEventListener() {
  $(document).off("scroll");
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
  scrollData = $(document).scrollTop();
}
function eventHandler(e) {
  console.log(e);
  const target = $(e.target).attr("id");

  if ($("#floating-menu").children().length > 0) {
    enableCardMoreMenu(e);
  }
  if (!isSearchResult(e.target)) {
    searchResultToogle(target);
  }

  if (!isDropDown(e, "filter", "filter-options")) {
    dropDownToogle(target, "filter", "filter-options");
  }
  // if (!isDropDown(e, "search-lg", "search-lg-result")) {
  //   dropDownToogle(target, "search-lg", "search-lg-result");
  // }
  if (target === "search-btn") {
    removeScrollEventListener();
    enableSearchPage();
  } else if (target === "search-cls-btn") {
    disableSearchPage();
    $(document).scrollTop(scrollData);
    addScrollEventListener();
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
    enableCardMoreMenu(e);
  } else if (target === "more-menu") {
    enableCardMoreMenu(e);
  } else if (target === "search-lg") {
    searchResultToogle(target);
  } else if (target === "filter") {
    dropDownToogle(target, "filter", "filter-options");
  }
}
function responsive() {
  if ($(window).width() > 640) {
    disableSearchPage();
  }
}
function isSearchResult(e) {
  if ($(e).parents("#search-lg-result").length > 0) {
    return true;
  }
  if ($(e).attr("id") == "search-lg") {
    return true;
  }
  return false;
}
function searchResultToogle(target) {
  if (target == "search-lg" && $("#search-lg-result").hasClass("hidden")) {
    $("#search-lg-result").removeClass("hidden");
  } else if (target != "search-lg") {
    $("#search-lg-result").addClass("hidden");
  }
}
function isDropDown(e, targetMatch, targetDropDown) {
  if ($(e).parents("#" + targetDropDown).length) {
    return true;
  }
  if ($(e).attr("id") == targetMatch) {
    return true;
  }
  return false;
}
function dropDownToogle(target, targetMatch, targetDropDown) {
  if (target == targetMatch && $("#" + targetDropDown).hasClass("hidden")) {
    $("#" + targetDropDown).removeClass("hidden");
  } else if (target != targetMatch) {
    $("#" + targetDropDown).addClass("hidden");
  }
}
function enableCardMoreMenu(target) {
  if (visualViewport.width > 640) {
    if ($("#floating-menu").children().length > 0) {
      $("#floating-menu").html("");
      return;
    }
    const pos = $(target.target).position();
    $("#floating-menu").html(`
    <div id="floating-menu-bg" class="relative size-full pointer-events-none ">
            <div style ="left : ${
              pos.left + target.target.clientWidth
            }px; top: ${pos.top}px"
                class="pointer-events-auto *:cursor-pointer drop-shadow-lg bg-white -translate-x-full *:px-6 *:py-2 text-xl absolute rounded-2xl overflow-hidden">
                <div class="hover:bg-slate-100 duration-200 active:bg-slate-200 flex space-x-2">
                    <span><i class="fa-solid fa-font-awesome"></i></span> <span class="text-lg">Report</span>
                </div>
                <div class="hover:bg-slate-100 duration-200 active:bg-slate-200 flex space-x-2">
                    <span><i class="fa-solid fa-ban"></i></span> <span class="text-lg">Block</span>
                </div>
            </div>
        </div>
    `);
    return;
  }
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
