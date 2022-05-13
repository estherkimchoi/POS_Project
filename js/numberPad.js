$('.btn-number1Btn').on('click',function(){
   
    var clickedNum = $(this).text();
    var currtBtnVale = $(this).attr('id');
    
    if(clickedNum==currtBtnVale){
      $('#pressedNumDisplay').text("€");

    }
    else{
      $('#pressedNumDisplay').text($('#pressedNumDisplay').text()+(clickedNum));
    }
   
  })


