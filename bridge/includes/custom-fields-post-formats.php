<?php

// add meta boxes
add_action( 'admin_init', 'add_metaboxes' );
// save meta boxes
add_action( 'save_post', 'save_metaboxes' );

/********************************************
 * Display meta boxes for post formats
 ********************************************/

// register fileds
$metaboxes = array(
    'link_post_format' => array(
        'title' => 'Link post format',
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-link',
        'priority' => 'high',
        'fields' => array(
            'title_link' => array(
                'title' => 'Link',
                'type' => 'text',
                'description' => ''
            )
        )
    ),
    'quote_post_format' => array(
        'title' => 'Quote post format',
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-quote',
        'priority' => 'high',
        'fields' => array(
            'quote_format' => array(
                'title' => 'Quote',
                'type' => 'text',
                'description' => ''
            )
        )
    ),
    'video_post_format' => array(
        'title' => 'Video post format',
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-video',
        'priority' => 'high',
        'fields' => array(
            'video_format_choose' => array(
                'title' => 'Choose Video Type',
                'type' => 'selectbox',
                'description' => '',
                'values' => array(
                    'youtube' => 'Youtube',
                    'vimeo' => 'Vimeo',
                    'self' => 'Self Hosted',
                )
            ),
            'video_format_link' => array(
                'title' => 'Video ID',
                'type' => 'text',
                'description' => ''
            ),
            'video_format_image' => array(
                'title' => 'Video image',
                'type' => 'image',
                'description' => ''
            ),
            'video_format_webm' => array(
                'title' => 'Video webm',
                'type' => 'text',
                'description' => ''
            ),
            'video_format_mp4' => array(
                'title' => 'Video mp4',
                'type' => 'text',
                'description' => ''
            ),
            'video_format_ogv' => array(
                'title' => 'Video ogv',
                'type' => 'text',
                'description' => ''
            )

        )
    ),
    'audio_post_format' => array(
        'title' => 'Audio post format',
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-audio',
        'priority' => 'high',
        'fields' => array(
            'audio_link' => array(
                'title' => 'Audio Link',
                'type' => 'text',
                'description' => ''
            )
        )
    ),
    'gallery_post_format' => array(
        'title' => 'Gallery post format',
        'applicableto' => 'post',
        'location' => 'normal',
        'display_condition' => 'post-format-gallery',
        'priority' => 'high',
        'fields' => array(
            'gallery_type' => array(
                'title' => 'Gallery Type',
                'type' => 'selectbox',
                'values' => array(
                    'slider'	=> 'Slider',
                    'masonry'	=> 'Masonry'
                ),
                'description' => 'Choose gallery typr for Blog Compound list'
            ),
        )
    )
);

function add_metaboxes() {
    global $metaboxes;

    if ( ! empty( $metaboxes ) ) {
        foreach ( $metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}

// show meta boxes
function show_metaboxes( $post, $args ) {
    global $metaboxes;

    $custom = get_post_custom( $post->ID );
    $fields = $metaboxes[$args['id']]['fields'];

    /** Nonce **/
    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {

            if(isset($custom[$id][0]) && $custom[$id][0] != ""){
                $value = $custom[$id][0];
            }else{
                $value = "";
            }

            $output .= '<div class="qodef-meta-box qodef-page">';
            $output .= '<div class="qodef-meta-box-holder">';
            $output .= '<div class="qodef-page-form-section form-field">';

            switch ( $field['type'] ) {
                default:
                case "text":
                    $output .= '<div class="qodef-field-desc"><label for="' . $id . '">' . $field['title'] . '</label></div><div class="qodef-section-content"><div class="container-fluid"><div class="row"><div class="col-lg-10"><input class="qodef-form-element" id="' . $id . '" type="text" name="' . $id . '" value="' . $value . '" /></div></div></div></div>';
                    break;
                case "image":
                    $output .= '<div class="qodef-field-desc"><label for="' . $id . '">' . $field['title'] . '</label></div><div class="qodef-section-content"><div class="container-fluid"><div class="row"><div class="col-lg-10"><div class="image_holder"><input id="' . $id . '" class="qodef-form-element ' . $id . '" type="text" name="' . $id . '" value="' . $value . '" /><input class="upload_button btn btn-sm btn-primary" type="button" value="Upload file" /></div></div></div></div></div>';
                    break;
                case "selectbox":
                    $output .= '<div class="qodef-field-desc"><label for="' . $id . '">' . $field['title'] . '</label></div><div class="qodef-section-content"><div class="container-fluid"><div class="row"><div class="col-lg-10"><select class="qodef-form-element" id="' . $id . '" name="' . $id . '">';

                    foreach($field['values'] as $key => $val){
                        $output .= '<option ';
                        if ($value == $key) {
                            $output .= 'selected="selected"';
                        }
                        $output .= ' value="'.$key.'">'.$val.'</option>';
                    }

                    $output .= '</select></div></div></div></div>';
                    break;
            }

            $output .= '</div></div></div>';
        }
    }

    echo $output;
}


function save_metaboxes( $post_id ) {
    global $metaboxes;
    if(isset($_POST['post_format_meta_box_nonce'])){
        $nonce = $_POST['post_format_meta_box_nonce'];
    } else {
        $nonce = wp_create_nonce( 'post_format_meta_box_nonce' );
    }
    // verify nonce
    if ( !wp_verify_nonce( $nonce, basename( __FILE__ ) ) ){
        return $post_id;
    }

    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
        return $post_id;
    }

    // check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ){
            return $post_id;
        }
    } elseif (!current_user_can( 'edit_post', $post_id ) ){
        return $post_id;
    }

    $post_type = get_post_type();

    // loop through fields and save the data
    foreach ( $metaboxes as $id => $metabox ) {
        // check if metabox is applicable for current post type
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $metaboxes[$id]['fields'];

            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                $new = $_POST[$id];

                if ( $new && $new != $old ) {
                    update_post_meta( $post_id, $id, $new );
                }
                elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                    delete_post_meta( $post_id, $id, $old );
                }
            }
        }
    }
}

add_action( 'admin_print_scripts', 'display_metaboxes', 1000 );

function display_metaboxes() {
    global $metaboxes;
    if ( get_post_type() == "post" ) :
        ?>
        <script type="text/javascript">// <![CDATA[
            $j = jQuery;

            <?php
            $formats = $ids = array();
            foreach ( $metaboxes as $id => $metabox ) {
                array_push( $formats, "'" . $metabox['display_condition'] . "': '" . $id . "'" );
                array_push( $ids, "#" . $id );
            }
            ?>

            var formats = { <?php echo implode( ',', $formats );?> };
            var ids = "<?php echo implode( ',', $ids ); ?>";

            function displayMetaboxes() {
                // Hide all post format metaboxes
                $j(ids).hide();
                // Get current post format
                var selectedElt = $j("input[name='post_format']:checked").attr("id");

                // If exists, fade in current post format metabox
                if ( formats[selectedElt] )
                    $j("#" + formats[selectedElt]).fadeIn();
            }

            $j(function() {
                // Show/hide metaboxes on page load
                displayMetaboxes();

                // Show/hide metaboxes on change event
                $j("input[name='post_format']").change(function() {
                    displayMetaboxes();
                });
            });

            // ]]></script>
    <?php
    endif;
}
?>