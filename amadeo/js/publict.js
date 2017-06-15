$(document).ready(function() {

	// navbar open close function runing in mobile
	$(function(){
	    $('#left').after().click(function() {
	    	if($( "#right" ).hasClass( "active" )){
				$( "#right" ).removeClass( "active" );
	    	}
	    	else{
				$( "#right" ).addClass( "active" );
	    	}
	    });

	    $('.open-form-class').click(function() {
	    	if(!$( "#freeTrialClass.fre-tri-clas" ).hasClass( "active" )){
				$( "#freeTrialClass.fre-tri-clas" ).addClass( "active" );
	    	}
	    });
	    $('.close-form-class').click(function() {
	    	if($( "#freeTrialClass.fre-tri-clas" ).hasClass( "active" )){
				$( "#freeTrialClass.fre-tri-clas" ).removeClass( "active" );
	    	}
	    });

		var win = $(window);
		if(win.width() > 960){
		    $("#list li.dropdown").hover(
		    	function(){
				    $(".nav-content-wrapper").css("height", "22.8vh");
				    $("#nav-logo").css("height", "19.8vh");
		    	},
		    	function(){
				    $(".nav-content-wrapper").css("height", "");
				    $("#nav-logo").css("height", "");
		    	}
		    );
		}
	});
	// navbar open close function runing in mobile
})