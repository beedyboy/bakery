// beedy-kaydee-popup Window

//#########################parameters##################################

		var scrollTop = '';
		var newHeight = '100';
		
		var overlay = true;
		
//#######################################################################

		$(window).bind('scroll', function() {
		   scrollTop = $( window ).scrollTop();
		   newHeight = scrollTop + 100;
		});
		
		$('.beedy-kaydee-popup-trigger').click(function(e) {
  		 e.stopPropagation();
		 
		/* if(jQuery(window).width() < 767) {
		   $(this).after( $( ".beedy-kaydee-popup" ) );
		   $('.beedy-kaydee-popup').show().addClass('beedy-kaydee-popup-mobile').css('top', 0);
		   $('html, body').animate({
				scrollTop: $('.beedy-kaydee-popup').offset().top
			}, 500);   
		 } else {
		   $('.beedy-kaydee-popup').removeClass('beedy-kaydee-popup-mobile').css('top', newHeight).toggle();
		 }*/
		showMod();
		  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
		});
	
	
//allow screen hide
if(overlay == false){
	$('html').click(function() {
		 $('.beedy-kaydee-popup').hide();
		});

}	
		
		
		// close button
		$('.beedy-kaydee-popup-btn-close').click(function(){
		  $('.beedy-kaydee-popup').hide();
		});


//if body of pop up is clicked
		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		 
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
		//	  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
		}
		
		
		 // getPageScroll() by quirksmode.com
  function getPageScroll() {
    var xScroll, yScroll;
    if (self.pageYOffset) {
      yScroll = self.pageYOffset;
      xScroll = self.pageXOffset;
    } else if (document.documentElement && document.documentElement.scrollTop) {	 // Explorer 6 Strict
      yScroll = document.documentElement.scrollTop;
      xScroll = document.documentElement.scrollLeft;
    } else if (document.body) {// all other Explorers
      yScroll = document.body.scrollTop;
      xScroll = document.body.scrollLeft;
    }
    return new Array(xScroll,yScroll)
  }

  // Adapted from getPageSize() by quirksmode.com
  function getPageHeight() {
    var windowHeight
    if (self.innerHeight) {	// all except Explorer
      windowHeight = self.innerHeight;
    } else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
      windowHeight = document.documentElement.clientHeight;
    } else if (document.body) { // other Explorers
      windowHeight = document.body.clientHeight;
    }
    return windowHeight
  }
