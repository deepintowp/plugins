jQuery(document).ready(function($){
	var submitButton = document.getElementById('ns-submit');
	
	var ajaxFunctionformprocess = function(fromdata, action){
		$.ajax({
			type:'post',
			url: nssubmitform.url,
			data:{
				action:action,
				data:fromdata,
				security:nssubmitform.security,
				
				
				
			},
			success:function(reponse){
				$('.ns-submit-msg').html(reponse);
				$('#news-name').removeAttr('value');
				$('#news-email').removeAttr('value');
				
				
			},
			error:function(response){
				
				$('.ns-submit-msg').html('<span style="color:red;" >' + reponse + '</span>');
				
				
			}
			
			
		});
		
		
		
	}
	
	submitButton.addEventListener('click', function(event){
		event.preventDefault();
		var fromdata = {
			'name':document.getElementById('news-name').value,
			'email':document.getElementById('news-email').value,
			'recipint':document.getElementById('news-recipint').value,
			'subject':document.getElementById('news-subject').value,
			
			
			
		};
		ajaxFunctionformprocess(fromdata, 'ns_form_action_function');	
			
		});
	
});