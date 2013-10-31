$(document).ready(function(){
				$('#home').css('background', '#d7d7d7');				
				
				/* /////////////////////////////////////////////
				/////////////////////Login section ///////////*/
				
				$("#sidebar input[name='email']").focus(function(){
					var currVal = $(this).val();
					
					if(currVal == "Email"){
						$(this).val("");
					}
				});
				
				$("#sidebar input[name='email']").blur(function(){
					var currVal = $(this).val();
					
					if(currVal == ""){
						$(this).val("Email");
					}
				});
				
				$("#sidebar input[name='password']").focus(function(){
					var currVal = $(this).val();
					
					if(currVal == "Password"){
						$(this).val("");
					}
				});
				
				$("#sidebar input[name='password']").blur(function(){
					var currVal = $(this).val();
					
					if(currVal == ""){
						$(this).val("Password");
					}
				});
				
				
			});