$(document).ready(function() {

  $('.dropdown-button').dropdown();
  $('.slider').slider({full_width: true});
  $('.parallax').parallax();
  $('.item').matchHeight();
  $('.datepicker').pickadate({
    selectMonths: true,
    selectYears: 4,
    closeOnSelect: true
  });
  $('.collapsible').collapsible();
        
});