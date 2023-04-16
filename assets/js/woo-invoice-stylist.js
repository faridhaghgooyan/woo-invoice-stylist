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

function WooInvoiceStylistPrint(event){
    const printContent = event.target.closest('section.invoice-style').outerHTML;
    const originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
function WooInvoiceStylistSavePDF(event){

}