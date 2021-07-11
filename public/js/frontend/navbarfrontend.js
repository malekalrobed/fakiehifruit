$(document).ready(function() {
  $(".js-menu-icon").on("click", function() {
    $(this).toggleClass("fa-times fa-bars");
    $(".menu .boxing").removeClass("boxing--is-visible");
    $(".menu li").removeClass("is-selected");
    $(".js-navbar").toggleClass("navbar--is-visible");
  });

  $(".menu li").on("click", function(e) {
    // e.preventDefault();
    var $this = $(this);
    $this.toggleClass("is-selected");

    var $currentboxing = $(this).find(".boxing");
    $currentboxing.toggleClass("boxing--is-visible");

    $(".menu .boxing")
      .not($currentboxing)
      .removeClass("boxing--is-visible");
    $(".menu li").not($this).removeClass("is-selected");
  });
});