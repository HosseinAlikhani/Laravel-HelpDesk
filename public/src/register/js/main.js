(function($) {
    var url = 'http://127.0.0.1:8000';
    var form = $("#signup-form");
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Finish',
            current: ''
        },
        titleTemplate: '<h3 class="title">#title#</h3>',
        onFinished: function(event, currentIndex) {
            alert('Sumited');
        },
    });

    $(".toggle-password").on('click', function() {

        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
    });

    $('#check_verification_code').hide();

    $('#send-verification-code').on('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url + '/register-verification',
            type: 'POST',
            data: {
                phonenumber: $('#phonenumber').val(),
            },
            success: function(data,status){
                if (status == 'success'){
                    $('#send_verification_code').hide();
                    $('#check_verification_code').show();
                    $.toast({
                        text : data.message,
                    });
                }
            },
            error: function(data){
                var msg = JSON.parse(data.responseText).phonenumber[0];
                $.toast({
                    text : msg,
                });
            }
        })
    });

})(jQuery);
