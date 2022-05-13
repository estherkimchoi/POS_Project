
//this is for sending order data to sales table in DB
$(document).ready(function(){
    $('#byCash,#byCard').click(function(){
        var tableNum = $(this).parent().attr('tableNum');

      $.ajax({
          url: 'moveToSaleTbl.php',
          method: 'POST',
          data: { 
            tableNum:tableNum
           
          }
        });
    });
  
  
  });
  
  