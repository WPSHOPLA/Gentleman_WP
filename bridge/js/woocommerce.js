
$j(document).ready(function() {
	"use strict";

    $j('.price_slider_wrapper').parents('.widget').addClass('widget_price_filter');
    initSelect2();
    initAddToCartPlusMinus();
    qodeInitProductListMasonryShortcode();
	qodeProductPinterestAddedToCartButton();
	$j(document).on('qodeAjaxPageLoad', function(){
		qodeInitProductListMasonryShortcode();
	});
});

function initSelect2() {
    $j('.woocommerce-ordering .orderby, #calc_shipping_country, #dropdown_product_cat').select2({
        minimumResultsForSearch: -1
    });
    $j('.woocommerce-account .country_select').select2();
}

function initAddToCartPlusMinus(){

    $j(document).on( 'click', '.quantity .plus, .quantity .minus', function() {

        // Get values
        var $qty		= $j(this).closest('.quantity').find('.qty'),
            currentVal	= parseFloat( $qty.val() ),
            max			= parseFloat( $qty.attr( 'max' ) ),
            min			= parseFloat( $qty.attr( 'min' ) ),
            step		= $qty.attr( 'step' );

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
        if ( max === '' || max === 'NaN' ) max = '';
        if ( min === '' || min === 'NaN' ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

        // Change the value
        if ( $j( this ).is( '.plus' ) ) {

            if ( max && ( max == currentVal || currentVal > max ) ) {
                $qty.val( max );
            } else {
                $qty.val( currentVal + parseFloat( step ) );
            }

        } else {

            if ( min && ( min == currentVal || currentVal < min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( currentVal - parseFloat( step ) );
            }
        }

        // Trigger change event
        $qty.trigger( 'change' );
    });
}

/*
 ** Init Product List Masonry Shortcode Layout
 */
function qodeInitProductListMasonryShortcode() {

    var container = $j('.qode_product_list_masonry_holder_inner, .qode_product_list_pinterest_holder_inner');

    if(container.length) {
			container.waitForImages({
				finished: function() {
					setTimeout(function(){
				        container.isotope({
				            itemSelector: '.qode_product_list_item',
				            resizable: false,
				            masonry: {
				                columnWidth: '.qode_product_list_sizer',
				                gutter: '.qode_product_list_gutter'
				            }
				        });
				        container.css('opacity', 1);
						initParallax();
					}, 200);
			    },
			    waitForAll: true
			});
    }
}


/*
 ** Add class to view cart button
 */
function qodeProductPinterestAddedToCartButton(){
	$j('body').on("added_to_cart", function( data ) {
		var btn = $j('.qode_product_list_pinterest_holder a.added_to_cart:not(.qbutton)');
		btn.addClass('qbutton');
	});
}
