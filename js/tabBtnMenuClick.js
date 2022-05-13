$(document).ready(function(){
    $(".btn-menuTapBtn").click(function(){
    var productId = $(this).attr('id');
       var tableNum = $(this).attr('tableNum'); 
       var pname = $(this).attr('value');

        $.ajax({
            url:'oneTableOrderList.php',
            method:'POST',
            data:{
                productId:productId,
                pname:pname,
                tableNum:tableNum
            },
            success:function(data){
                 $('#displayContainer').append(data);
            }
        
        });
        
  
    });


});


// fetch data and display to the list(orderPayment.php page)
function displayList(){
    $.ajax({
         type:'GET',
         url:'oneTableOrderList.php',
         dataType:'html',
         success:function(data){
            $('#displayContainer').append(data);
        }
     });
}


function reload(tableNumber){
    var tableNumber = tableNumber;
    window.location.href = "orderPayment.php?tableNum="+tableNumber;

}
