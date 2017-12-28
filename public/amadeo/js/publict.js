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

	    $('#free-trial').click(function() {
	    	$("#type-form").val("1");
	    });
	    $('#register').click(function() {
	    	$("#type-form").val("2");
	    });

	    $('#advertisement button#close').click(function() {
	    	$("#advertisement").fadeTo(700, 0).slideUp(700, function(){
				$(this).remove();
			});
	    });

	    $(function(){
			window.setInterval(function() {
		    	var timeCounter = $("#advertisement button#close b").html();
		        var updateTime = eval(timeCounter)- eval(1);
		        $("#advertisement button#close").html("Close <b>"+updateTime+"</b> Second");
		        if(updateTime == 0){
		        	$("#advertisement").fadeTo(700, 0).slideUp(700, function(){
						$(this).remove();
					});
		        }
			}, 1000);
		});

		var win = $(window);
		if(win.width() > 960){
		    $("#list li.dropdown").hover(
		    	function(){
				    // $("ul#list").css("box-shadow", "0px 5px 5px rgba(85,85,85,.6)");
				    // $(".nav-content-wrapper").css("height", "22.8vh");
				    // $("#nav-logo").css("height", "19.8vh");
		    	},
		    	function(){
				    // $("ul#list").css("box-shadow", "0px 5px 5px rgba(85,85,85,0)");
				    // $(".nav-content-wrapper").css("height", "");
				    // $("#nav-logo").css("height", "");
		    	}
		    );
		}
	});
	// navbar open close function runing in mobile
})