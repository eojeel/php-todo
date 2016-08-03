$(function(){
    $('#show_register').click(function () {
       $('.login_form').hide();
        $('.register_form').show();
        return false;
    });

    $('#show_login').click(function() {
        $('.register_form').hide();
        $('.login_form').show();
        return false;
    });
});