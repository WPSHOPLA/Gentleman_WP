<?php
//General
if(qode_is_woocommerce_installed()) {
    $qodeGeneral = new QodeMetaBox("product", "Qode General");
    $qodeFramework->qodeMetaBoxes->addMetaBox("product_general", $qodeGeneral);


    $qode_product_list_masonry_layout = new QodeMetaField("selectblank", "qode_product_list_masonry_layout", "", "Dimensions for Product List Masonry", 'Choose image layout when it appears in Qode Product List - Masonry shortcode', array(
        "default" => "Default",
        "large-width-height" => "Large Width"
    ));
    $qodeGeneral->addChild("qode_product_list_masonry_layout", $qode_product_list_masonry_layout);
}