<?php
if(!function_exists('qode_maintenance_options_map')) {
    /**
     * Maintenance options page
     */
    function qode_maintenance_options_map(){

        $qode_pages = array();
        $pages = get_posts(array(
            'post_type' => 'page',
            'meta_key' => '_wp_page_template',
            'meta_value' => 'landing_page.php'
        ));
        foreach ($pages as $page) {
            $qode_pages[$page->ID] = $page->post_title;
        }

        $maintenancePage = new QodeAdminPage("_maintenance", "Maintenance Mode", "fa fa-wrench");
        qode_framework()->qodeOptions->addAdminPage("Maintenance Mode", $maintenancePage);

        //Maintenance

        $panel1 = new QodePanel("Settings", "maintenance_panel");
        $maintenancePage->addChild("panel1", $panel1);

        $maintenance_mode = new QodeField("yesno", "qode_maintenance_mode", "no", "Maintenance Mode", "Turn on this option if you want to enable maintenance mode on your site", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_maintenance_container"
            ));
        $panel1->addChild("qode_maintenance_mode", $maintenance_mode);

        $maintenance_container = new QodeContainer("maintenance_container", "qode_maintenance_mode", "no");
        $panel1->addChild("maintenance_container", $maintenance_container);

        $maintenance_page = new QodeField("selectblank", "qode_maintenance_page", "", 'Maintenance Page', 'Choose maintenance page to display when user visits your site', $qode_pages);
        $maintenance_container->addChild("qode_maintenance_page", $maintenance_page);

    }
    add_action('qode_options_map','qode_maintenance_options_map',210);
}