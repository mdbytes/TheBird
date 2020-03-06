$(document).ready(function() {
  function setHeight() {
    windowHeight = $(window).innerHeight();
    $('#left-column').css('min-height', windowHeight);
    $('#right-column').css('min-height', windowHeight);
  };
  setHeight();
  
  $(window).resize(function() {
    setHeight();
  });
});