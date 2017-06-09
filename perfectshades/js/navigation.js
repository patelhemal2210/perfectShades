/* makes same-page links scroll to the appropriate position instead of jumping. only for links in slider class */ 
$(function() {
  $('a[href*="#"]:not([href="#"]).slider').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 750);
        return false;
      }
    }
  });
});

// closes nav bar on mobile after a link is clicked (except for dropdown)
$(document).ready(function () {
  $(".slider").click(function(event) {
    $(".navbar-collapse").collapse('hide');
  });
});