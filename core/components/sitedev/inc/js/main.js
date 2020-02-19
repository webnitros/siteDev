$(document).ready(function() {
    // fade in #back-top
    $("#back-top").hide();
    $(function () {
        height = $('body').outerHeight(),
          $(window).scroll(function () {
              if ($(this).scrollTop() > height*0.1) {
                  $('#back-top').fadeIn();
              } else {
                  $('#back-top').fadeOut();
              }
          });

        // scroll body to 0px on click
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 300);
            return false;
        });
    });

});