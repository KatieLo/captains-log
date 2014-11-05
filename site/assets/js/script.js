
$( document ).ready(function() {
    console.log( "ready!" );
    //$("textarea").height( $("textarea")[0].scrollHeight ); 

    $("#new_post_form").submit(function(e){
    	e.preventDefault(); // prevent reloading on save
    	if(!$("textarea").val()){
   			console.log("Nothing to save");
    	} else {
			$.ajax( {
				type: "POST",
				url: "catch_new_post.php",
				data: $(this).serialize(),
				success: function (response){
					if(response == 1) {
						$(".saved").show("400");
						$(".saved").delay(1500).fadeOut("slow");
					} else {
						alert("Didnt work :(");
					}
				}
			});
    	}
    });

    // Validate Sign up
    $("#sign_up_form").submit(function(e){
    	
    	var error = false;
    	var message = "";
    	if(!$('[name="name"]').val()){
    		error = true;
    		message += "Please fill in your name.<br>";
    	} 
    	if(!$('[name="email"]').val()){
    		error = true;
    		message += "Please fill in your email.<br>";
    	}
    	if(!validateEmail($('[name="email"]').val())){
    		error = true;
    		message += "The email address you entered doesn't look valid - please type it again.<br>";
    	}
    	if($('[name="password1"]').val().length < 5 ){
    		error = true;
    		message += "Your password needs to be at least 5 characters long.<br>";
    	}
    	if($('[name="password1"]').val() != $('[name="password2"]').val()){
    		error = true;
    		message += "Your passwords don't match.";
    	}
    	
    	if(error){
    		e.preventDefault();
    		$(".error").html(message);
    		$(".error").removeClass("hidden");
    	}
    		
    });

    // Validate login 
    $("#login_form").submit(function(e){
    	var error = false;
    	var message = "";
    	if(!$('[name="email"]').val()){
    		error = true;
    		message += "Please fill in your email.<br>";
    	}
    	if(!validateEmail($('[name="email"]').val())){
    		error = true;
    		message += "The email address you entered doesn't look valid - please type it again.<br>";
    	}
    	if($('[name="password"]').val().length < 5 ){
    		error = true;
    		message += "Your password needs to be at least 5 characters long.<br>";
    	}

    	if(error){
    		e.preventDefault();
    		$(".error").html(message);
    		$(".error").removeClass("hidden");
    	}

    });

    $("#sign_up_form").find('[name="email"]').on("blur",checkEmail);

    $("#sign_up_form").find('[name="name"]').on("blur",feedback);
    
});

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 

function checkEmail(){
    var $email = $("#sign_up_form").find('[name="email"]'); 
	var email = $("#sign_up_form").find('[name="email"]').val();
	console.log(email);
	$.ajax( {
		type: "POST",
		url: "catch_check_email.php",
		data: {email:email},
		success: function (response){
			if(response == 1) {
				$(".warning").html("It looks like you already have an account with this email. <a href='login.php'>Log in here.</a>");
				$(".warning").removeClass("hidden");
                $email.parent().removeClass("has-success has-feedback"); 
                $email.parent().addClass("has-warning has-feedback");
                $email.parent().find("span").removeClass('glyphicon glyphicon-ok form-control-feedback');
                $email.parent().find("span").addClass('glyphicon glyphicon-warning-sign form-control-feedback');
			} else {
                $email.parent().removeClass("has-warning has-feedback");
                $email.parent().addClass("has-success has-feedback");
                $email.parent().find("span").removeClass('glyphicon glyphicon-warning-sign form-control-feedback');
                $email.parent().find("span").addClass('glyphicon glyphicon-ok form-control-feedback');
				$(".warning").addClass("hidden");
                //$("#sign_up_form").find('[name="email"]').after('<i class="fa fa-check"></i>');
			}
		}
	});
}

function feedback(){

}
