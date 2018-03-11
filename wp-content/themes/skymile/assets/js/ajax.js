jQuery(document).ready(function($) {
    $('#contact #submit').click(function(e) {
        e.preventDefault();
        var values = {
            name: _val('name'),
            email: _val('email'),
            website: _val('website'),
            message: _val('message'),
            response_field: _val('recaptcha_response_field'),
            challenge_field: _val('recaptcha_challenge_field'),
        };
        var data = {
            action: 'pkandee_contact',
            contact_data: values,
            nonce: pkandee_ajax.nonce
        };
        $('.loading').css('display', 'block');
        $.post(pkandee_ajax.ajaxurl, data, function(response) {
            $('#response').empty();
            $('.loading').css('display', 'none');
            $('#response').fadeIn().append(response);
            $('#contact').css('display', 'none');
            $('.tryagain').css('display', 'inline-block');
        });
    });
    function _val(id) {
        return  $('#' + id).val();
    }
    $('.tryagain').on('click', function(e) {
        e.preventDefault();
        $(this).css('display', 'none');
        $('#response').empty();
        $('#contact').fadeIn();
    });

});