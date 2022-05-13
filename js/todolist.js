//This- click remove and update status in database
$(document).ready(function(){
  $(".remove").click(function(){
    $(this).parent().remove();
    
    var isdone = 'true';
    var label = $(this).parent().find('label');
    var pname = label.attr('pname');
    var tableNum = label.attr('tableNum'); 
    var product_name = pname;
    var tableNum = tableNum;
         
    $.ajax({
        url: 'updateOrderStatus.php',
        method: 'POST',
        data: { 
          isdone: isdone,
          product_name:product_name,
          tableNum:tableNum
        }
      });
  });


});

//when checkbox is checked, the text in table box color is changed. 
$(document).ready(function(){
  $(".checkbox").click(function(){
     
   
      if ($(this).attr('checked')) {
        $(this).removeAttr('checked');

        //table status section
        var label = $(this).parent();
        var pname = label.attr('pname');
        var tableNum = label.attr('tableNum'); 
        var product_name = pname;
               
        var li_Items = $('div.popover-static-demo div');
        li_Items.each(function(i, div) {
          var li_Item = $(div);
          var tbTableNum = li_Item.find('h3.popover-header').attr('tableNum');
          
           if(tbTableNum == tableNum){

                var li_pname_items = li_Item.find('div.popover-body').find('li.pname')
                li_pname_items.each(function(i, li) {
                  
                    var li_pname_item = $(li);
                    var  tbPname = li_pname_item.attr('productName');
                    
                    if(tbPname == pname){
                      
                      li_pname_item.css( "color", "#737F8B" );
                      li_pname_item.css( "font-weight", "normal" );
                      return false; // breaks
                    }
                  
                });
            }//if
          
        });
        

      } 
      else {// if not checked
        $(this).attr('checked', 'checked');
        
         //table status section
          var label = $(this).parent();
          var pname = label.attr('pname');
          var tableNum = label.attr('tableNum'); 
          var product_name = pname;
         
          var li_Items = $('div.popover-static-demo div');
          li_Items.each(function(i, div) {
            var li_Item = $(div);
            var tbTableNum = li_Item.find('h3.popover-header').attr('tableNum');
            
             if(tbTableNum == tableNum){

                  var li_pname_items = li_Item.find('div.popover-body').find('li.pname')
                  li_pname_items.each(function(i, li) {
                    
                      var li_pname_item = $(li);
                      var  tbPname = li_pname_item.attr('productName');
                      
                      if(tbPname == pname){
                        
                        li_pname_item.css( "color", "#1E5631" );
                        li_pname_item.css( "font-weight", "bold" );
                        return false; // breaks
                      }
                    
                  });
              }//if
            
          });
          
      }
 
   
    $(this).closest("li").toggleClass('completed');
  
  });


});

