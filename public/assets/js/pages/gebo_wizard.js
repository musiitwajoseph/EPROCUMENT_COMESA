/* [ ---- Gebo Admin Panel - wizard ---- ] */

	$(document).ready(function() {
		//* simple wizard
		gebo_wizard.simple();
		//* wizard with validation
		gebo_wizard.validation();


		// $('form').stepy('step',2);	
		$('form').stepy('step',1);	
		
		//* add step numbers to titles
		gebo_wizard.steps_nb();
		$('#nextText').click(function(){
			//$('form').stepy({ nextLabel: '.stepy-next' });
			$('form').stepy('step',3);
		});
		$('#nextText').click(function(){
			//$('form').stepy({ nextLabel: '.stepy-next' });
			$('form').stepy('step',2);
		});
		$('#nextText').click(function(){
			//$('form').stepy({ nextLabel: '.stepy-next' });
			$('form').stepy('step',2);
		});
		$('#backText').click(function(){
			//$('form').stepy({ nextLabel: '.stepy-next' });
			$('form').stepy('step',1);
		});
		$('#otpForm').hide();
	});

	gebo_wizard = {
		simple: function(){
			$('#simple_wizard').stepy({
				titleClick	: true,
				nextLabel:     false,// 'Next <i class="glyphicon glyphicon-chevron-right"></i>',
				backLabel:     false,//'<i class="glyphicon glyphicon-chevron-left"></i> Back'
				select: function(index, totalSteps) {
				alert('Rendered step: ' + index + ' with total of steps: ' + totalSteps);
				}
			});
		},
		validation: function(){
			$('#validate_wizard').stepy({
				nextLabel: false,//     'Forward Code <i class="glyphicon glyphicon-chevron-right"></i>',
				backLabel: false,//     '<i class="glyphicon glyphicon-chevron-left"></i> Backward',
				block		: false,
				errorImage	: true,
				titleClick	: false,
				validate	: true,
				Header		: false,
				
			});
			
			stepy_validation = $('#validate_wizard').validate({
				onfocusout: false,
				errorPlacement: function(error, element) {
					error.appendTo( element.closest("div.controls") );
				},
				highlight: function(element) {
					$(element).closest("div.form-group").addClass("error f_error");
					var thisStep = $(element).closest('form').prev('ul').find('.current-step');
					thisStep.addClass('error-image');
				},
				unhighlight: function(element) {
					$(element).closest("div.form-group").removeClass("error f_error");
					if(!$(element).closest('form').find('div.error').length) {
						var thisStep = $(element).closest('form').prev('ul').find('.current-step');
						thisStep.removeClass('error-image');
					};
				},
				rules: {
					'v_username'	: {
						required	: true,
						minlength	: 3
					},
					'v_email'		: 'email',
					'v_newsletter'	: 'required',
					'v_password'	: 'required',
					'v_city'		: 'required',
					'v_country'		: 'required'
				}, messages: {
					'v_username'	: { required:  'Username field is required!' },
					'v_email'		: { email	:  'Invalid e-mail!' },
					'v_newsletter'	: { required:  'Newsletter field is required!' },
					'v_password'	: { required:  'Password field is requerid!' },
					'v_city'		: { required:  'City field is requerid!' },
					'v_country'		: { required:  'Country field is requerid!' }
				},
				ignore				: ':hidden'
			});
		},
		//* add numbers to step titles
		steps_nb: function(){
			$('.stepy-titles').each(function(){
				$(this).children('li').each(function(index){
					var myIndex = index + 1
					$(this).append('<span class="stepNb">'+myIndex+'</span>');
				})
			})
		}
	};