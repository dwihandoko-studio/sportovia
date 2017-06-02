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

	    $('.open-fre-tri-clas').click(function() {
	    	if($( "#freeTrialClass.fre-tri-clas" ).hasClass( "active" )){
				$( "#freeTrialClass.fre-tri-clas" ).removeClass( "active" );
	    	}
	    	else{
				$( "#freeTrialClass.fre-tri-clas" ).addClass( "active" );
	    	}
	    });
	});
	// navbar open close function runing in mobile

})