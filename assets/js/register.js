$(document).ready(function(){
	//on click signup,hide login and show registration form
	$(".signup").click(function(){
		$("#first").slideUp("slow",function(){
			$("#second").slideDown("slow");
		});
	});
	//on click signin,hide signup and show login form
	$(".signin").click(function(){
		$("#second").slideUp("slow",function(){
			$("#first").slideDown("slow");
		});
	});

	
	//var type=$("#protype").val();
	$('#protype').change(function() {
	  	//var type=$("#protype").val();
	  	var type=$(this).find(":selected").val();
	  	if (type=="pet") {
		$("#second-first").show();
		$("#second-second").hide();
		$("#second-third").hide();
		$("#second-fourth").hide();
	}else if (type=="service") {
		$("#second-first").hide();
		$("#second-second").show();
		$("#second-third").hide();
		$("#second-fourth").hide();
	}else if (type=="vet") {
		$("#second-first").hide();
		$("#second-second").hide();
		$("#second-third").show();
		$("#second-fourth").hide();
	}else{
		$("#second-first").hide();
		$("#second-second").hide();
		$("#second-third").hide();
		$("#second-fourth").show();
	}
	});
	
	

});