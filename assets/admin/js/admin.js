jQuery(document).ready(function($) {
    // Add click event listener to tabs
    $('.nav-tab-wrapper a.nav-tab').click(function() {
        // Remove nav-tab-active class from currently active tab
        $('.nav-tab-wrapper a.nav-tab.nav-tab-active').removeClass('nav-tab-active');
        // Add nav-tab-active class to clicked tab
        $(this).addClass('nav-tab-active');
        // Show the corresponding div
        var targetDiv = $(this).attr('href');
        $('.woo-invoice-stylist-tab').hide();
        $(targetDiv).show();
    });
});