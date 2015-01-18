$(document).ready(function() {
		
		/* Mail Chimp Ajax Signup Form...
		===========================================*/
		
		//Email Join Up form
		$( "#email-submit" ).on( "click", function() {
			//load button selector to var
			var button = $( this );
			//turn on preloader
			button.addClass('preloader-on');

			var emailaddress = $( "#mc-signup-input" ).serialize();

			if(emailaddress === 'newsletter_signup='){

				$( "#mc-response" ).text( "Please enter an email address." );
				//turn off preloader
				button.removeClass('preloader-on');

			}else{

				var FormSubmit = $.post( BaseUrl + "/mailchimp/mailchimp-ajax-request.php", emailaddress, function( data ) {
				  
				 var response = $.parseJSON( data );

				 if(response.status === 'error'){

				  		$( "#mc-response" ).text( response.error );

				 }else{

				  		$( "#mc-response" ).text( "Thank You " + response.email + " you are on the list." );


				 }
				 //turn off preloader
				 button.removeClass('preloader-on');

				});

			}

		});

});
