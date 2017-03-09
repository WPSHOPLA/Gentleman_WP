<?php

if(!function_exists('qode_error_options_map')) {
    /**
     * Error options page
     */
    function qode_error_options_map()
    {

        $error404Page = new QodeAdminPage("_404", "404 Error Page", "fa fa-times-circle-o");
        qode_framework()->qodeOptions->addAdminPage("error404Page", $error404Page);

        //404 Page Options

        $panel1 = new QodePanel("404 Page Options", "page_error_options_panel");
        $error404Page->addChild("panel1", $panel1);

        $title_404 = new QodeField("text", "404_title", "", "Title", "Enter title for 404 page");
        $panel1->addChild("404_title", $title_404);

        $subtitle_404 = new QodeField("text", "404_subtitle", "", "Subtitle", "Enter subtitle for 404 page");
        $panel1->addChild("404_subtitle", $subtitle_404);

        $text_404 = new QodeField("text", "404_text", "", "Text", "Enter text for 404 page");
        $panel1->addChild("404_text", $text_404);

        $backlabel_404 = new QodeField("text", "404_backlabel", "", "Back to Home Button Label", 'Enter label for "Back to Home" button ');
        $panel1->addChild("404_backlabel", $backlabel_404);
    }
    add_action('qode_options_map','qode_error_options_map',140);
}
