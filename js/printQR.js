
$(document).ready(function(){
    $("#printQR").click(function(){
      
            $.ajax({
              url: 'printQRcode.php',
              method: 'GET',
              data: { 
                
              },
              success:function(data){
                window.print();
              }
            });
        
      });
    
    
    });
  
  