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
	});
	// navbar open close function runing in mobile

})