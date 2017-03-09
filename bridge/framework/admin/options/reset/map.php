<?php

if(!function_exists('qode_reset_options_map')) {
    /**
     * Reset options page
     */
    function qode_reset_options_map(){

        $resetPage = new QodeAdminPage("_reset", "Reset", "fa fa-eraser");
        qode_framework()->qodeOptions->addAdminPage("Reset", $resetPage);

        //Reset

        $panel1 = new QodePanel("Reset to Defaults", "reset_panel");
        $resetPage->addChild("panel1", $panel1);

        $reset_to_defaults = new QodeField("yesno", "reset_to_defaults", "no", "Reset to Defaults", "This option will reset all Qode Options values to defaults");
        $panel1->addChild("reset_to_defaults", $reset_to_defaults);
    }
    add_action('qode_options_map','qode_reset_options_map',220);
}