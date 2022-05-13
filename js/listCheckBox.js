//This page is for order list deletion on OrderPayment.php page when checkbox is checked

$(document).ready(function(){
  $(".btn-cancelBtn").click(function(){
    
    var tableNum = $(".btn-menuTapBtn").attr('tableNum'); 
    var parents = $('tbody#displayContainer tr');
    parents.each(function(i, tr) {
      var parent = $(tr);
      var input = parent.find('input');  

        if(input.attr('checked')=='checked'){ 
          var indexId = input.attr('indexId');

          $.ajax({
            url: 'deleteMenuList.php',
            method: 'POST',
            data: { 
              indexId:indexId
             
            },
            success:function(data){
              parent.remove();
              reload(tableNum);

            }
          });
        }

    });

});
  
  
  });

  $(document).ready(function(){
    $(".checkbox").click(function(){
  
      $(this).attr('checked', 'checked');
       
    });
    
    
  });
  
  function reload(tableNumber){
    var tableNumber = tableNumber;
   window.location.href = "orderPayment.php?tableNum="+tableNumber;

}