/*--------DDsmoothmenu Initialization--------*/
pkmenu.init({
    mainmenuid: "menu",
    orientation: 'h',
    classname: 'pkmenu',
    //customtheme: ["#1c5a80", "#18374a"],
    contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
});
//Tabbed
jQuery(document).ready(function ($) {
    $("#content div").hide(); // Initially hide all content
    $("#tabs li:first").attr("id", "current"); // Activate first tab
    $("#content div:first").fadeIn(); // Show first tab content

    $('#tabs a').click(function (e) {
        e.preventDefault();
        $("#content div").hide(); //Hide all content
        $("#tabs li").attr("id", ""); //Reset id's
        $(this).parent().attr("id", "current"); // Activate this
        $('#' + $(this).attr('title')).fadeIn(); // Show content for current tab
    });
    jQuery('#menu').meanmenu({
        meanScreenWidth: "640",
    });

    $('.section-blog .post:last').addClass('last');

    $('.sidebar-widget li').each(function () {
        $(this).prepend('<i class="glyphicon glyphicon-chevron-right"></i>');
    });

});

jQuery(window).load(function () {
    jQuery('.flex-control-nav a').each(function () {
        jQuery(this).text('');
        jQuery(this).append('<span class="glyphicon glyphicon-record"></span>');
    });
});

jQuery(document).ready(function () {
    var width = jQuery(window).width();
    if (width < 360) {
        jQuery('.featured-wrap .col-md-4').each(function () {
            jQuery(this).removeClass('col-xs-6');
        });
    }
});
jQuery(window).resize(function () {
    var width = jQuery(window).width();
    if (width < 360) {
        jQuery('.featured-wrap .col-md-4').each(function () {
            jQuery(this).removeClass('col-xs-6');
        });
    }
});