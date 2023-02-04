$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "Please type the correct answer.");

    // validate contact form
    $(function() {
        $('#contact').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 10
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "Name field cannot be blank.",
                    minlength: "Your name must consist of at least 2 characters."
                },
                subject: {
                    required: "Subject field cannot be blank.",
                    minlength: "Your subject must consist of at least 4 characters."
                },
                number: {
                    required: "Number field cannot be blank.",
                    minlength: "Your number must consist of at least 10 characters."
                },
                email: {
                    required: "Email field cannot be blank."
                },
                message: {
                    required: "Message field cannot be blank.",
                    minlength: "Please provide more message content."
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"server.php",
                    success: function() {
                        $('#contact :input').attr('disabled', 'disabled');
                        $('#contact').fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
		                	$('#success').modal('show');
                        })
                    },
                    error: function() {
                        $('#contact').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    }
                })
            }
        })
    })
        
 })(jQuery)
})