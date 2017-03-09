<?php

if(!function_exists('qode_button_v2_map')) {
    function qode_button_v2_map() {

		$panel = qode_add_admin_panel(array(
            'title' => 'Button V2',
            'name'  => 'panel_button_v2',
            'page'  => 'elementsPage'
        ));

        //Typography options
        qode_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => 'Typography',
            'parent' => $panel
        ));

        $typography_group = qode_add_admin_group(array(
            'name' => 'typography_group',
            'title' => 'Typography',
            'description' => 'Setup typography for all button types',
            'parent' => $panel
        ));

        $typography_row = qode_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $typography_group
        ));

        qode_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'button_v2_font_family',
            'default_value' => '',
            'label'         => 'Font Family',
        ));

        qode_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_v2_text_transform',
            'default_value' => '',
            'label'         => 'Text Transform',
            'options'       => qode_get_text_transform_array()
        ));

        qode_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_v2_font_style',
            'default_value' => '',
            'label'         => 'Font Style',
            'options'       => qode_get_font_style_array()
        ));

        qode_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'button_v2_letter_spacing',
            'default_value' => '',
            'label'         => 'Letter Spacing',
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = qode_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $typography_group
        ));

        qode_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'button_v2_font_weight',
            'default_value' => '',
            'label'         => 'Font Weight',
            'options'       => qode_get_font_weight_array()
        ));

        //Solid type options
        $solid_group = qode_add_admin_group(array(
            'name' => 'solid_group',
            'title' => 'Solid Type',
            'description' => 'Setup solid button type',
            'parent' => $panel
        ));

        $solid_row = qode_add_admin_row(array(
            'name' => 'solid_row',
            'next' => true,
            'parent' => $solid_group
        ));

        qode_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_v2_solid_text_color',
            'default_value' => '',
            'label'         => 'Text Color',
            'description'   => ''
        ));

        qode_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_v2_solid_hover_text_color',
            'default_value' => '',
            'label'         => 'Text Hover Color',
            'description'   => ''
        ));

        qode_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_v2_solid_bg_color',
            'default_value' => '',
            'label'         => 'Background Color',
            'description'   => ''
        ));

        qode_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_v2_solid_hover_bg_color',
            'default_value' => '',
            'label'         => 'Hover Background Color',
            'description'   => ''
        ));

		$solid_row2 = qode_add_admin_row(array(
			'name' => 'solid_row2',
			'next' => true,
			'parent' => $solid_group
		));

		qode_add_admin_field(array(
			'parent'        => $solid_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_v2_solid_icon_border_color',
			'default_value' => '',
			'label'         => 'Icon Left Border Color',
			'description'   => ''
		));

		qode_add_admin_field(array(
			'parent'        => $solid_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_v2_solid_icon_border_hover_color',
			'default_value' => '',
			'label'         => 'Icon Left Border Hover Color',
			'description'   => ''
		));
    }

    add_action('qode_options_elements_page_map', 'qode_button_v2_map', 1);
}