
<!DOCTYPE html>
<html>
<head>
<title>
Beedy Kaydee
</title>


<link href="beedy_kaydee.css"  rel="stylesheet" type="text/css" />
<script src="../software/public/js/jquery-1.7.2.min.js" type="text/javascript"></script>

</head>

<body>
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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

<a class="beedy-kaydee-popup-trigger" href="#modal">Show Modal</a>

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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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
		$('.beedy-kaydee-popup-btn-close').click(function(e){
		  $('.beedy-kaydee-popup').hide();
		});

		$('.beedy-kaydee-popup').click(function(e){
		  e.stopPropagation();
		});
		
		function showMod(){
			//alert(22);
			$('.beedy-kaydee-popup').css({
        top:	getPageScroll()[1] + (getPageHeight() / 10),
        left:	$(window).width() / 2 - 205
      }).show();
			  $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
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

<!-- the modal, wrapped  in an overlay -->
 <div class="beedy-kaydee-popup">
 <div class="beedy-kaydee-popup-content">
		  Madrid is a city in Europe and the capital and largest city of Spain. 
		  The population of the city is almost 3.2 million and that of the Madrid metropolitan area, around 6.3 million. <br><br>It is the third-largest city in the European Union, after London and Berlin, and its metropolitan area is the third-largest in the European Union after Paris and London. The city spans a total of 604.3 km2 (233.3 sq mi).
		  <span class="beedy-kaydee-popup-btn-close">close</span>
		</div>
		</div>
	
	
<script src="beedy_kaydee.js" type="text/javascript"></script>


	</body>
	</html>