<?php
if(!function_exists('qode_parallax_options_map')) {
    /**
     * Parallax options page
     */
    function qode_parallax_options_map()
    {

        $parallaxPage = new QodeAdminPage("_parallax", "Parallax", "fa fa-arrows-v");
        qode_framework()->qodeOptions->addAdminPage("Parallax", $parallaxPage);

        //Parallax Settings

        $panel1 = new QodePanel("Parallax Settings", "parallax_settings_panel");
        $parallaxPage->addChild("panel1", $panel1);

        $parallax_onoff = new QodeField("onoff", "parallax_onoff", "on", "Parallax on touch devices", "Enabling this option will allow parallax on touch devices");
        $panel1->addChild("parallax_onoff", $parallax_onoff);

        $parallax_minheight = new QodeField("text", "parallax_minheight", "400", "Parallax Min Height (px)", "Set a minimum height for parallax images on small displays (phones, tablets, etc.)");
        $panel1->addChild("parallax_minheight", $parallax_minheight);
    }
    add_action('qode_options_map','qode_parallax_options_map',160);
}