$(function() {  
    $('.btn-6')
      .on('mouseenter', function(e) {
          console.log('mouse in');
              var parentOffset = $(this).offset(),
              relX = e.pageX - parentOffset.left,
              relY = e.pageY - parentOffset.top;
              $(this).find('span').css({top:relY, left:relX})
      })
      .on('mouseout', function(e) {
        console.log('mouse out');
              var parentOffset = $(this).offset(),
              relX = e.pageX - parentOffset.left,
              relY = e.pageY - parentOffset.top;
          $(this).find('span').css({top:relY, left:relX})
      });
    // $(`[href=#]`).click(function(){return false});
  });