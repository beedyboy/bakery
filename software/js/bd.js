jQuery(document).ready( function($){
	
	
	$(".bd-tab-link").on('click', function (e){
		e.preventDefault(); // prevent target action/event
	
	//get the current active index
	
	var currentActive =$(".bd-tab li.active").index();
	//get the current event index
	 var tab =$(this).index(); 
		
		if(currentActive !== tab){
			$(".bd-tab li.active").removeClass(" active");
			$(this).addClass(" active");
			
			$(".bd-tab-content").find("[ data-index='"+currentActive +"']" ).removeClass('active');
			$(".bd-tab-content").find("[ data-index='"+tab +"']" ).addClass('active');
			
				
		}
		 
		
		 
	});
	
	
	
	function toggleFullScreen(elem) {
    // ## The below if statement seems to work better
	//## if ((document.fullScreenElement && document.fullScreenElement !== null) ||
	//(document.msfullscreenElement && document.msfullscreenElement !== null) ||
	//(!document.mozFullScreen && !document.webkitIsFullScreen)) {
	
	alert(33);
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}
	 
});