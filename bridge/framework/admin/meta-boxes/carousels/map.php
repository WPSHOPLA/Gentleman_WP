<?php

//Carousels

$qodeCarousels = new QodeMetaBox("carousels", "Qode Carousels");
$qodeFramework->qodeMetaBoxes->addMetaBox("carousels",$qodeCarousels);

	$qode_carousel_image = new QodeMetaField("image","qode_carousel-image","","Carousel Image","Choose carousel image (min width needs to be 220px)");
	$qodeCarousels->addChild("qode_carousel-image",$qode_carousel_image);

	$qode_carousel_hover_image = new QodeMetaField("image","qode_carousel-hover-image","","Carousel Hover Image","Choose carousel hover image (min width needs to be 220px)");
	$qodeCarousels->addChild("qode_carousel-hover-image",$qode_carousel_hover_image);

	$qode_carousel_item_link = new QodeMetaField("text","qode_carousel-item-link","","Link","Attach URL link to an image (e.g. http://www.example.com)");
	$qodeCarousels->addChild("qode_carousel-item-link",$qode_carousel_item_link);

	$qode_carousel_item_target = new QodeMetaField("selectblank","qode_carousel-item-target","","Target","Specify where to open the linked document", array(
        "_self" => "Self",
        "_blank" => "Blank"
    ));
	$qodeCarousels->addChild("qode_carousel-item-target",$qode_carousel_item_target);