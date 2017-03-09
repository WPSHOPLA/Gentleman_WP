<?php
$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
//    require_once( $root.'/wp-config.php' );
} else {
	$root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
	if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
//    require_once( $root.'/wp-config.php' );
	}
}
header('Content-type: application/x-javascript');
?>

function ajaxSubmitCommentForm(){
	"use strict";

	var options = { 
		success: function(){
			$j("#commentform textarea").val("");
			$j("#commentform .success p").text("<?php _e('Comment has been sent!','qode'); ?>");
		}
	}; 
	
	$j('#commentform').submit(function() {
		$j(this).find('input[type="submit"]').next('.success').remove();
		$j(this).find('input[type="submit"]').after('<div class="success"><p></p></div>');
		$j(this).ajaxSubmit(options); 
		return false; 
	}); 
}
var header_height = 100;
var min_header_height_scroll = 57;
var min_header_height_fixed_hidden = 50;
var min_header_height_sticky = 60;
var scroll_amount_for_sticky = 85;
var content_line_height = 60;
var header_bottom_border_weight = 1;
var scroll_amount_for_fixed_hiding = 200;
var paspartu_width_init = 0.02;
<?php
if(is_admin_bar_showing()){
?>
var add_for_admin_bar = 32;
<?php
}else{
?>
var add_for_admin_bar = 0;
<?php
}
?>
<?php if(isset($qode_options_proya['header_height'])){
	if (!empty($qode_options_proya['header_height'])) { ?>
	header_height = <?php echo qode_filter_px($qode_options_proya['header_height']); ?>;
<?php } } ?>
<?php if(isset($qode_options_proya['header_height_scroll'])){
	if (!empty($qode_options_proya['header_height_scroll'])) { ?>
	min_header_height_scroll = <?php echo qode_filter_px($qode_options_proya['header_height_scroll']); ?>;
<?php } } ?>
<?php if(isset($qode_options_proya['header_height_sticky'])){
	if (!empty($qode_options_proya['header_height_sticky'])) { ?>
	min_header_height_sticky = <?php echo qode_filter_px($qode_options_proya['header_height_sticky']); ?>;
<?php } } ?>
<?php if(isset($qode_options_proya['scroll_amount_for_sticky'])){
	if (!empty($qode_options_proya['scroll_amount_for_sticky'])) { ?>
	scroll_amount_for_sticky = <?php echo qode_filter_px($qode_options_proya['scroll_amount_for_sticky']); ?>;
<?php } } ?>
<?php if(isset($qode_options_proya['content_menu_lineheight'])){
if($qode_options_proya['content_menu_lineheight'] != ""){ ?>
	content_line_height = <?php echo qode_filter_px($qode_options_proya['content_menu_lineheight']); ?>
<?php } } ?>
<?php if(isset($qode_options_proya['scroll_amount_for_fixed_hiding'])){
    if (!empty($qode_options_proya['scroll_amount_for_fixed_hiding'])) { ?>
        scroll_amount_for_fixed_hiding = <?php echo qode_filter_px($qode_options_proya['scroll_amount_for_fixed_hiding']); ?>;
    <?php } } ?>
<?php if(isset($qode_options_proya['header_height_scroll_hidden'])){
    if (!empty($qode_options_proya['header_height_scroll_hidden'])) { ?>
    min_header_height_fixed_hidden = <?php echo esc_attr(qode_filter_px($qode_options_proya['header_height_scroll_hidden'])); ?>;
<?php } } ?>
<?php if(isset($qode_options_proya['paspartu_width']) && $qode_options_proya['paspartu_width'] !== ""){ ?>
    paspartu_width_init = <?php echo esc_attr(qode_filter_px($qode_options_proya['paspartu_width']))/100; ?>;
<?php } ?>

var logo_height = 130; // proya logo height
var logo_width = 280; // proya logo width
<?php if(isset($qode_options_proya['logo_image'])){
	if (!empty($qode_options_proya['logo_image'])) {
    $logo_url_obj = parse_url($qode_options_proya['logo_image']);
	//$image_sizes = qode_get_image_dimensions($qode_options_proya['logo_image']);
    if (file_exists($_SERVER['DOCUMENT_ROOT'].$logo_url_obj['path'])) {
    list($width, $height, $type, $attr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$logo_url_obj['path']);
    if ($height) {
?>
	logo_height = <?php echo $height; ?>;
	logo_width = <?php echo $width; ?>;
	
<?php } } } } ?>
<?php if(isset($qode_options_proya['header_top_area'])){
	if ($qode_options_proya['header_top_area'] == "yes") {
		if(isset($qode_options_proya['header_top_height']) && $qode_options_proya['header_top_height'] !== ""){ ?>
			header_top_height= <?php echo qode_filter_px(esc_attr($qode_options_proya['header_top_height']));?>;
		<?php }
		elseif (isset($qode_options_proya['header_bottom_appearance']) && $qode_options_proya['header_bottom_appearance'] == "fixed_top_header"){ ?>
			header_top_height = 45;
		<?php }
		else { ?>
			header_top_height = 33;
<?php }
	} else { ?>
	header_top_height = 0;
<?php } }?>
var loading_text;
<?php 
 $load_text = qode_addslashes(__('Loading new posts...', 'qode'));
 ?>
loading_text = '<?php echo $load_text; ?>';
<?php 
 $finish_text = qode_addslashes(__('No more posts', 'qode'));
 ?>
var finished_text;
finished_text = '<?php echo $finish_text; ?>';
<?php
if($qode_options_proya['enable_google_map'] != ""){
?>

var piechartcolor;
piechartcolor	= "#1abc9c";
<?php
if(isset($qode_options_proya['first_color']) && !empty($qode_options_proya['first_color'])){ ?>
	piechartcolor = "<?php echo $qode_options_proya['first_color']; ?>";
<?php } ?>

var geocoder;
var map;

function initialize() {
	"use strict";
  // Create an array of styles.
<?php
$google_maps_color = "#324156";
if(isset($qode_options_proya['google_maps_color'])){
	if (!empty($qode_options_proya['google_maps_color']))
		$google_maps_color = $qode_options_proya['google_maps_color'];
}
$google_maps_saturation = "-60";
if(isset($qode_options_proya['google_maps_saturation'])){
	if (!empty($qode_options_proya['google_maps_saturation']))
		$google_maps_saturation = $qode_options_proya['google_maps_saturation'];
}
$google_maps_lightness = "-20";
if(isset($qode_options_proya['google_maps_lightness'])){
	if (!empty($qode_options_proya['google_maps_lightness']))
		$google_maps_lightness = $qode_options_proya['google_maps_lightness'];
}
?>
  var mapStyles = [
    {
      stylers: [
				{hue: "<?php echo $google_maps_color; ?>" },
				{saturation: "<?php echo $google_maps_saturation; ?>"},
				{lightness: "<?php echo $google_maps_lightness; ?>"},
				{gamma: 1.51}
			]
    }
  ];
  var qodeMapType = new google.maps.StyledMapType(mapStyles,
    {name: "Qode Map"});

	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(-34.397, 150.644);
	var myOptions = {
<?php
$google_maps_scroll_wheel = false;
if(isset($qode_options_proya['google_maps_scroll_wheel'])){
	if ($qode_options_proya['google_maps_scroll_wheel'] == "yes")
		$google_maps_scroll_wheel = true;
}
$google_maps_zoom = 12;
if(isset($qode_options_proya['google_maps_zoom'])){
	if (intval($qode_options_proya['google_maps_zoom']) > 0)
		$google_maps_zoom = intval($qode_options_proya['google_maps_zoom']);
}
?>
		zoom: <?php echo $google_maps_zoom; ?>,
		<?php if (!$google_maps_scroll_wheel) { ?>
		scrollwheel: false,
		<?php } ?>
		center: latlng,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.SMALL,
			position: google.maps.ControlPosition.RIGHT_CENTER
		},
		scaleControl: false,
			scaleControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		streetViewControl: false,
			streetViewControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		panControl: false,
		panControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		mapTypeControl: false,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'qode_style'],
			style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
			position: google.maps.ControlPosition.LEFT_CENTER
		},
<?php
$google_maps_style = true;
if(isset($qode_options_proya['google_maps_style'])){
	if ($qode_options_proya['google_maps_style'] == "no")
		$google_maps_style = false;
}
?>
		<?php if ($google_maps_style) { ?>
		mapTypeId: 'qode_style'
		<?php } else { ?>
		mapTypeId: google.maps.MapTypeId.ROADMAP
		<?php } ?>
	};
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	<?php if ($google_maps_style) { ?>
  map.mapTypes.set('qode_style', qodeMapType);
	<?php } ?>
}

function codeAddress(data) {
	"use strict";
	
	if (data === '')
		return;

	var contentString = '<div id="content">'+
	'<div id="siteNotice">'+
	'</div>'+
	'<div id="bodyContent">'+
	'<p>'+data+'</p>'+
	'</div>'+
	'</div>';
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	geocoder.geocode( { 'address': data}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			map.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker({
				map: map, 
				position: results[0].geometry.location,
				<?php if(isset($qode_options_proya['google_maps_pin_image'])){ ?>
				icon:  '<?php echo $qode_options_proya['google_maps_pin_image']; ?>',
				<?php } ?>
				title: data['store_title']
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});
			//infowindow.open(map,marker);
		}
	});
}

var $j = jQuery.noConflict();

$j(document).ready(function() {
	"use strict";

	showContactMap();
});
<?php
}
?>

function showContactMap() {
	"use strict";

	if($j("#map_canvas").length > 0){
		initialize();
		codeAddress("<?php if(isset($qode_options_proya['google_maps_address5'])) { echo $qode_options_proya['google_maps_address5']; } ?>");
		codeAddress("<?php if(isset($qode_options_proya['google_maps_address4'])) { echo $qode_options_proya['google_maps_address4']; } ?>");
		codeAddress("<?php if(isset($qode_options_proya['google_maps_address3'])) { echo $qode_options_proya['google_maps_address3']; } ?>");
		codeAddress("<?php if(isset($qode_options_proya['google_maps_address2'])) { echo $qode_options_proya['google_maps_address2']; } ?>");
		codeAddress("<?php if(isset($qode_options_proya['google_maps_address'])) { echo $qode_options_proya['google_maps_address']; } ?>");
	}
}

var no_ajax_pages = [];
var qode_root = '<?php echo home_url(); ?>/';
var theme_root = '<?php echo QODE_ROOT; ?>/';
<?php if($qode_options_proya['header_style'] != ''){ ?>
var header_style_admin = "<?php echo $qode_options_proya['header_style']; ?>";
<?php }else{ ?>
var header_style_admin = "";
<?php } ?>
if(typeof no_ajax_obj !== 'undefined') {
	no_ajax_pages = no_ajax_obj.no_ajax_pages;
}
