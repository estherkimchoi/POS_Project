$(document).ready(function(){
    $("#orderNow").click(function(){
      
      var tableNum = $(this).attr('tableNum'); 
     
            $.ajax({
              url: 'mobileOrderToDatabase.php',
              method: 'POST',
              data: { 
                tableNum:tableNum
               
              },
              success:function(data){
                nextAction(tableNum);
  
              }
            });
      });
    
    
    });
  
    
    function nextAction(tableNum){
      var tableNumber = tableNum;
     window.location.href = "mobileConfirm.php?tableNum="+tableNumber;
  
  }