$(document).ready(function(){

required = ["nombre","apellido","empresa","email"];
	error = $("#error");
	error.hide();


	$("#form").submit(function(){	
		
		for (i=0;i<required.length;i++) {
			var input = $('#'+required[i]);
			if ((input.val() == "")) {
				input.addClass("needsfilled");
				error.slideDown(750);
			}
		}
		
		
		if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($("#email").val()))){
			$("#email").addClass("needsfilled");
			error.slideDown(750);
		}




  		
		if ($(":input").hasClass("needsfilled")) {
			return false;
		} else {
			error.hide();
			return true;
		}

	});

	$(":input").focus(function(){		
	   if ($(this).hasClass("needsfilled") ) {
			$(this).removeClass("needsfilled");
	   }
	   });
	});