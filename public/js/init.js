$(document).ready(function() {

  $('.dropdown-button').dropdown();
  $('.slider').slider({full_width: true});
  $('.parallax').parallax();
  $('.datepicker').pickadate({
    selectMonths: true,
    selectYears: 4,
    closeOnSelect: true
  });
  $('.item').matchHeight();
  // var rowGridOptions = { minMargin: 10, maxMargin: 35, itemSelector: ".item"};
  // $(".row-grid").rowGrid(rowGridOptions);

  $('.collapsible').collapsible();
        
});