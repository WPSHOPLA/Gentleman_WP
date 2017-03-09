<?php

//Testimonials

$qodeTestimonials = new QodeMetaBox("testimonials", "Qode Testimonials");
$qodeFramework->qodeMetaBoxes->addMetaBox("testimonials",$qodeTestimonials);

	$qode_testimonial_author = new QodeMetaField("text","qode_testimonial-author","","Author","Enter the author name");
	$qodeTestimonials->addChild("qode_testimonial-author",$qode_testimonial_author);

	$qode_testimonial_text = new QodeMetaField("textarea","qode_testimonial-text","","Text","Enter the testimonial text");
	$qodeTestimonials->addChild("qode_testimonial-text",$qode_testimonial_text);

	$qode_testimonial_website = new QodeMetaField("text","qode_testimonial_website","","Website","Enter full URL of the author's website");
	$qodeTestimonials->addChild("qode_testimonial_website",$qode_testimonial_website);

	$qode_testimonial_rating = new QodeMetaField("select","qode_testimonial_rating","","Rating","Choose the rating for this testimonial",array( 
		"" => "",
	   	"1" => "1 out of 5",
	   	"2" => "2 out of 5",
	   	"3" => "3 out of 5",
	   	"4" => "4 out of 5",
	   	"5" => "5 out of 5"
	 ));
	$qodeTestimonials->addChild("qode_testimonial_rating",$qode_testimonial_rating);