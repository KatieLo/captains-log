
$( document ).ready(function() {
    console.log( "ready!" );
    $("textarea").height( $("textarea")[0].scrollHeight ); 

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
    
});

$("textarea").bind('input propertychange',function() {
	$(this).height( $(this)[0].scrollHeight );
});