<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">

        <div class="input">
            <label>Carousel Slider</label>
            <select name="carousel" id="carousel">
                <option value=""></option>
                <?php
                    $carousel_locations = get_terms('carousels_category');

                    foreach ($carousel_locations as $location) {
                    ?>    
                        <option value="<?php echo $location->slug; ?>"><?php echo $location->name; ?></option>
                    <?php
                    }
                ?>
            </select>    
        </div>
        <div class="input">
            <label>Order By</label>
            <select name="order_by" id="order_by">
                <option value="menu_order">Order</option>
                <option value="title">Title</option>
                <option value="date">Date</option>
            </select>
        </div>
        <div class="input">
            <label>Order</label>
            <select name="order" id="order">
                <option value="ASC">ASC</option>
                <option value="DESC">DESC</option>
            </select>
        </div>
        <div class="input">
            <label>Control Pagination Style</label>
            <select name="control_style" id="control_style">
                <option value="light">Light</option>
                <option value="gray">Gray</option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>