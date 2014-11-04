
$( document ).ready(function() {
    console.log( "ready!" );
    $("textarea").height( $("textarea")[0].scrollHeight ); 

    $(".save").click(function(){
    	event.preventDefault(); // prevent reloading on save
    	if(!$("textarea").val()){
   			console.log("Nothing to save");
    	} else {
    		// use post ajax to post data to php catch file
    		// if ajax returned 1, show saved div
    		// make save div disappear after 3 seconds 
				$.ajax( {
					type: "POST",
					url: "catch_new_post.php",
					data: $("#new_post_form").serialize(),
					success: function (response){
						console.log("Successful save");
						$(".saved").show("400");
						$(".saved").delay(1500).fadeOut("slow");
					}
				});
    	}
    });
    
});


