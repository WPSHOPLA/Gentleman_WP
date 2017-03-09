<?php
/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
	}

	/**
	 * @see Walker_Nav_Menu::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    global $_wp_nav_menu_max_depth, $qodeIconCollections;

	    $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

	    ob_start();
	    $item_id = esc_attr( $item->ID );
	    $removed_args = array(
	        'action',
	        'customlink-tab',
	        'edit-menu-item',
	        'menu-item',
	        'page-tab',
	        '_wpnonce',
	    );

	    $original_title = '';
	    if ( 'taxonomy' == $item->type ) {
	        $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
	        if ( is_wp_error( $original_title ) )
	            $original_title = false;
	    } elseif ( 'post_type' == $item->type ) {
	        $original_object = get_post( $item->object_id );
	        $original_title = $original_object->post_title;
	    }

	    $classes = array(
	        'menu-item menu-item-depth-' . $depth,
	        'menu-item-' . esc_attr( $item->object ),
	        'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
	    );

	    $title = $item->title;

	    if ( ! empty( $item->_invalid ) ) {
	        $classes[] = 'menu-item-invalid';
	        /* translators: %s: title of menu item which is invalid */
	        $title = sprintf( __( '%s (Invalid)', 'qode' ), $item->title );
	    } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
	        $classes[] = 'pending';
	        /* translators: %s: title of menu item in draft status */
	        $title = sprintf( __('%s (Pending)', 'qode'), $item->title );
	    }

	    $title = empty( $item->label ) ? $title : $item->label;

	    ?>
	    <li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode(' ', $classes ); ?>">
	        <dl class="menu-item-bar">
	            <dt class="menu-item-handle">
	                <span class="item-title"><?php echo esc_html( $title ); ?></span>
	                <span class="item-controls">
                        <span class="spinner"></span>
	                    <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
	                    <span class="item-order hide-if-js">
	                        <a href="<?php
	                            echo esc_url(wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-up-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            ));
	                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'qode'); ?>">&#8593;</abbr></a>
	                        |
	                        <a href="<?php
	                            echo esc_url(wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-down-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            ));
	                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'qode'); ?>">&#8595;</abbr></a>
	                    </span>
	                    <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" title="<?php esc_attr_e('Edit Menu Item', 'qode'); ?>" href="<?php
	                        echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : esc_url(add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) ));
	                    ?>"><?php _e( 'Edit Menu Item', 'qode' ); ?></a>
	                </span>
	            </dt>
	        </dl>

	        <div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
	            <?php if( 'custom' == $item->type ) : ?>
	                <p class="field-url description description-wide">
	                    <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
	                        <?php _e( 'URL', 'qode' ); ?><br />
	                        <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
	                    </label>
	                </p>
	            <?php endif; ?>
	            <p class="description description-thin">
	                <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'Navigation Label', 'qode' ); ?><br />
	                    <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
	                </label>
	            </p>
	            <p class="description description-thin">
	                <label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'Title Attribute', 'qode' ); ?><br />
	                    <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
	                </label>
	            </p>
                <p class="field-link-target description">
                    <label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
                        <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
                        <?php _e( 'Open link in a new window/tab', 'qode' ); ?>
                    </label>
                </p>
	            <p class="field-css-classes description description-thin">
	                <label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'CSS Classes (optional)', 'qode' ); ?><br />
	                    <input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
	                </label>
	            </p>
	            <p class="field-xfn description description-thin">
	                <label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'Link Relationship (XFN)', 'qode' ); ?><br />
	                    <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
	                </label>
	            </p>
	            <p class="field-description description description-wide">
	                <label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'Description', 'qode' ); ?><br />
	                    <textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
	                    <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'qode'); ?></span>
	                </label>
	            </p>

                <?php
                /* New fields insertion starts here */
                ?>
                <p class="field-custom description description-thin description-thin-custom">
                    <label for="edit-menu-item-anchor-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Anchor', 'qode' ); ?><br />
                        <input type="text" id="edit-menu-item-anchor-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-anchor" data-item-option data-name="menu_item_anchor_<?php echo esc_attr($item_id); ?>" value="<?php echo esc_attr( $item->anchor ); ?>" />
                    </label>
                </p>
                <p class="field-custom description description-wide">
                    <?php
                    $value = $item->nolink;
                    if($value != "") $value = "checked";
                    ?>
                    <label for="edit-menu-item-nolink-<?php echo esc_attr($item_id); ?>">
                        <input type="checkbox" id="edit-menu-item-nolink-<?php echo esc_attr($item_id); ?>" class="code edit-menu-item-custom" data-item-option data-name="menu_item_nolink_<?php echo esc_attr($item_id); ?>" value="nolink" <?php echo esc_attr($value); ?> />
                        <?php _e( "Don't link", 'qode' ); ?>
                    </label>
                </p>
                <p class="field-custom description description-wide">
                    <?php
                    $value = $item->hide;
                    if($value != "") $value = "checked";
                    ?>
                    <label for="edit-menu-item-hide-<?php echo esc_attr($item_id); ?>">
                        <input type="checkbox" id="edit-menu-item-hide-<?php echo esc_attr($item_id); ?>" class="code edit-menu-item-custom" data-item-option data-name="menu_item_hide_<?php echo esc_attr($item_id); ?>" value="hide" <?php echo esc_attr($value); ?> />
                        <?php _e( "Don't show", 'qode' ); ?>
                    </label>
                </p>
                <p class="field-custom description description-thin description-thin-custom">
                    <label for="edit-menu-item-type-menu-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Type', 'qode' ); ?><br />
                        <select class="widefat" id="edit-menu-item-type-menu<?php echo esc_attr($item_id); ?>" data-item-option data-name="menu_item_type_menu_<?php echo esc_attr($item_id); ?>">
                            <option value="" <?php if($item->type_menu == ""){echo 'selected="selected"';} ?>></option>
                            <option value="wide" <?php if($item->type_menu == "wide"){echo 'selected="selected"';} ?>>wide</option>
                            <option value="wide_icons" <?php if($item->type_menu == "wide_icons"){echo 'selected="selected"';} ?>>wide with icons</option>
                        </select>
                    </label>
                </p>
                <p class="field-custom description description-thin description-thin-custom">
                    <label for="edit-menu-item-wide-position-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Wide menu position', 'qode' ); ?><br />
                        <select class="widefat" id="edit-menu-item-wide-position<?php echo esc_attr($item_id); ?>" data-item-option data-name="menu_item_wide_position_<?php echo esc_attr($item_id); ?>">
                            <option value="" <?php if($item->wide_position == ""){echo 'selected="selected"';} ?>></option>
                            <option value="left" <?php if($item->wide_position == "left"){echo 'selected="selected"';} ?>>left</option>
                            <option value="right" <?php if($item->wide_position == "right"){echo 'selected="selected"';} ?>>right</option>
                        </select>
                    </label>
                </p>

                <?php
                //if icon was set before we added icon pack, set icon pack to font awesome
                if($item->icon !== '' && empty($item->icon_pack)) {
                    $item->icon_pack = 'font_awesome';
                }
                ?>

                <?php
                $iconCollections = $qodeIconCollections->getIconCollectionsEmpty();

                if(is_array($iconCollections) && count($iconCollections)) {

                    ?>

                    <p class="field-custom description description-thin description-thin-custom">
                        <label for="edit-menu-item-icon-pack-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Icon Pack', 'qode' ); ?><br />
                            <select class="widefat" id="edit-menu-item-icon-pack-<?php echo esc_attr($item_id); ?>" data-item-option data-item-id="<?php echo esc_attr($item_id); ?>" data-icon-pack data-name="menu_item_icon_pack_<?php echo esc_attr($item_id); ?>">
                                <?php foreach ($iconCollections as $collectionKey => $collectionTitle) { ?>
                                    <option value="<?php echo esc_attr($collectionKey); ?>" <?php if($item->icon_pack == $collectionKey){echo 'selected="selected"';} ?>><?php echo esc_html($collectionTitle); ?></option>
                                <?php } ?>
                            </select>
                            <br/><?php _e( 'Only with "wide with icons" menu type', 'qode' ); ?>
                        </label>
                    </p>

                    <?php
                    $icon_data_attr = 'menu_item_icon_'.$item_id;
                    $collection_obj = $qodeIconCollections->getIconCollection($item->icon_pack);

                    ?>
                    <p class="field-custom description description-thin description-thin-custom qodef-icon-select-holder">
                        <label for="edit-menu-item-icon-<?php echo esc_attr($item_id); ?>">
                            <?php _e( 'Icon', 'qode' ); ?><br />
                            <select class="widefat" id="edit-menu-item-icon<?php echo esc_attr($item_id); ?>" data-item-option data-name="<?php echo esc_attr($icon_data_attr); ?>">
                                <?php
                                if($collection_obj) { ?>
                                    <?php
                                    $icons_array = $collection_obj->getIconsArray();
                                    foreach ($icons_array as $key => $value) { ?>
                                        <option value="<?php echo esc_attr($key); ?>" <?php if($item->icon == $key){echo 'selected="selected"';} ?>><?php echo esc_html($key); ?></option>
                                    <?php
                                    }
                                    ?>
                                <?php } ?>
                            </select>
                        </label>
                    </p>

                <?php } ?>
                <p class="field-custom description description-thin description-thin-custom">
                </p>
                <p class="field-custom description description-wide">
                    <label for="edit-menu-item-sidebar-<?php echo esc_attr($item_id); ?>">
                        <?php _e( 'Custom widget area', 'qode' ); ?><br />
                        <select class="widefat" id="edit-menu-item-sidebar<?php echo esc_attr($item_id); ?>" data-item-option data-name="menu_item_sidebar_<?php echo esc_attr($item_id); ?>">
                            <option value="" <?php if($item->sidebar == ""){echo 'selected="selected"';} ?>></option>
                            <?php
                            $custom_sidebars = qode_get_custom_sidebars();
                            foreach ($custom_sidebars as $sidebar_key => $sidebar) { ?>
                                <option value="<?php echo esc_attr(ucwords( $sidebar )); ?>" <?php if ($item->sidebar == ucwords( $sidebar ) ) { ?> selected="selected" <?php } ?>>
                                    <?php echo esc_html(ucwords( $sidebar )); ?>
                                </option>
                            <?php } ?>
                        </select>
                        <br/><?php _e( 'Only with "wide & wide with icons" menu type', 'qode' ); ?>
                    </label>
                </p>
				<p class="field-custom description description-wide">
					<?php
					$value = $item->show_widget_area_in_popup;
					if($value != "") $value = "checked";
					?>
					<label for="edit-menu-item-show-widget-area-in-popup-<?php echo esc_attr($item_id); ?>">
						<input type="checkbox" id="edit-menu-item-show-widget-area-in-popup-<?php echo esc_attr($item_id); ?>" class="code edit-menu-item-custom" data-item-option data-name="menu_item_show_widget_area_in_popup_<?php echo esc_attr($item_id); ?>" value="show_widget_area_in_popup" <?php echo esc_attr($value); ?> />
						<?php _e( "Show custom widget area in popup (only for 'wide' menu types)", 'qode' ); ?>
					</label>
				</p>
                <?php
                /* New fields insertion ends here */
                ?>
	            <div class="menu-item-actions description-wide submitbox">
	                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
	                    <p class="link-to-original">
	                        <?php printf( __('Original: %s', 'qode'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
	                    </p>
	                <?php endif; ?>
	                <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
	                echo esc_url(wp_nonce_url(
	                    add_query_arg(
	                        array(
	                            'action' => 'delete-menu-item',
	                            'menu-item' => $item_id,
	                        ),
	                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                    ),
	                    'delete-menu_item_' . $item_id
	                )); ?>"><?php _e('Remove', 'qode'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
	                    ?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php _e('Cancel', 'qode'); ?></a>
	            </div>

	            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
	            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
	            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
	            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
	            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
	            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
	        </div><!-- .menu-item-settings-->
	        <ul class="menu-item-transport"></ul>
	    <?php

	    $output .= ob_get_clean();

	    }
}
