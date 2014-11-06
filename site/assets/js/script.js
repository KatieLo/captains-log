
$( document ).ready(function() {

    // Check the size of the textbox and resize it on input so it grwows to fit log.
    /*var textarea = document.getElementById("new-post-textarea");
    var initialHeight = "200px";
    textarea.style.height = initialHeight;
    var limit = 600;

    textarea.oninput = function() {
      textarea.style.height = initialHeight;
      textarea.style.height = Math.min(textarea.scrollHeight, limit) + "px";
      console.log(textarea.style.height);
    };*/
    resizeTextarea();
    $("#new-post-textarea").bind('input propertychange', resizeTextarea);

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
						$(".error").html("Your log couldn't be saved. PLease try again.");
                        $(".error").removeClass("hidden");
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
    	if($('[name="password"]').val().length < 5 ){
    		error = true;
    		message += "Your password needs to be at least 5 characters long.<br>";
    	}
    	if($('[name="password"]').val() != $('[name="password2"]').val()){
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
    $("#sign_up_form").find('[name="name"]').on("blur",[1],showIfFilled);
    $("#sign_up_form").find('[name="password"]').on("blur",[5],showIfFilled);
    $("#sign_up_form").find('[name="password2"]').on("blur",showPasswordValidation);
    
});

function resizeTextarea() {
    var initialHeight = "300px";
    var limit = 600;
    $("#new-post-textarea").css("height",initialHeight);
    var scrollHeight = $("#new-post-textarea").prop('scrollHeight');
    var newHeight = Math.min(scrollHeight, limit) + "px";
    $("#new-post-textarea").css("height",newHeight);
    console.log(newHeight);
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 

function checkEmail(){
    var $email = $("#sign_up_form").find('[name="email"]'); 
	var email = $("#sign_up_form").find('[name="email"]').val();

    if(!validateEmail(email)){
        // Check if email address is a valid format & warn user if not valid
        showWarning($email.parent());
        $(".error").html("The email address you entered doesn't look valid - please type it again.<br>");
        $(".error").removeClass("hidden");
    } else {
        // If it's a valid address, check if it exists already and if it does, tell user to log in
        $(".error").addClass("hidden"); // remove warning if it is showing and user has fixed email 
       $.ajax( {
            type: "POST",
            url: "catch_check_email.php",
            data: {email:email},
            success: function (response){
                if(response == 1) {
                    $(".warning").html("It looks like you already have an account with this email. <a href='login.php'>Log in here.</a>");
                    $(".warning").removeClass("hidden");
                    showWarning($email.parent());
                } else {
                  showSuccess($email.parent());
                }
            }
        });
    }

	
}

// Function checks whether a feild is filled and shows sucess styling if it is, and warning styling it is blank
// Takes in one required argument, an int of minimum length the inout should be (e.g if passowrds should be at least 6 characters long, pass it 6)
function showIfFilled(event){

    minimumElementLength = event.data[0];

    var $element = $(this);
    var inputName = $element.attr("name");

    if($element.val() && $element.val().length >= minimumElementLength){
        $(".error").addClass("hidden");
        showSuccess($element.parent());
    } else {
        showWarning($element.parent());
        if(minimumElementLength <= 1){
             message = "Your "+ inputName + " must be at least " + minimumElementLength + " character.";
        } else {
             message = "Your "+ inputName + " must be at least " + minimumElementLength + " characters long.";
        }
       
        $(".error").html(message);
        $(".error").removeClass("hidden");
    }
}

function showPasswordValidation(){
    var $element = $(this);

    if($('[name="password"]').val() != $('[name="password2"]').val()){
            showWarning($element.parent());
            message = "Your passwords don't match.";
            $(".error").html(message);
            $(".error").removeClass("hidden");
        }
        else {
            $(".error").addClass("hidden");
            showSuccess($element.parent());  
        }
}

function showWarning($element){
    $element.removeClass("has-success has-feedback");
    $element.addClass("has-warning has-feedback");
    $element.find("span").removeClass('glyphicon glyphicon-ok form-control-feedback');
    $element.find("span").addClass('glyphicon glyphicon-warning-sign form-control-feedback');
}

function showSuccess($element){
    $element.removeClass("has-warning has-feedback");
    $element.find("span").removeClass('glyphicon glyphicon-warning-sign form-control-feedback');
    $element.addClass("has-success has-feedback");
    $element.find("span").addClass('glyphicon glyphicon-ok form-control-feedback');
}
