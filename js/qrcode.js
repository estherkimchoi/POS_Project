$(document).on('click', '.div-toggle', function() {
    var target = $(this).data('target');
    var show =  $("button:focus", this).data('show');
    $(target).children().addClass('hide');
    $(show).removeClass('hide');
  });
  $(document).ready(function(){
    $('.div-toggle').trigger('click');
  });