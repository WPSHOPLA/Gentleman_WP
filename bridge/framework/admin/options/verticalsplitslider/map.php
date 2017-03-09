<?php
if(!function_exists('qode_verticalsplitslider_options_map')) {
    /**
     * Vertical Split Slider options page
     */
    function qode_verticalsplitslider_options_map()
    {

        $verticalSplitSliderPage = new QodeAdminPage("_vertical_split_slider", "Vertical Split Slider", "fa fa-arrows-v");
        qode_framework()->qodeOptions->addAdminPage("verticalSplitSlider", $verticalSplitSliderPage);

        // General Style

        $panel10 = new QodePanel("General Style", "general_style");
        $verticalSplitSliderPage->addChild("panel10", $panel10);

        $group1 = new QodeGroup("Navigation Style", "Define style for navigation bullets");
        $panel10->addChild("group1", $group1);

        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);

        $vss_navigation_inactive_color = new QodeField("colorsimple", "vss_navigation_inactive_color", "", "Navigation Color", "Define color for navigation dots");
        $row1->addChild("vss_navigation_inactive_color", $vss_navigation_inactive_color);

        $vss_navigation_inactive_border_color = new QodeField("colorsimple", "vss_navigation_inactive_border_color", "", "Navigation Border Color", "Define border color for navigation dots");
        $row1->addChild("vss_navigation_inactive_border_color", $vss_navigation_inactive_border_color);

        $vss_navigation_color = new QodeField("colorsimple", "vss_navigation_color", "", "Navigation Active Color", "Define active color for navigation dots");
        $row1->addChild("vss_navigation_color", $vss_navigation_color);

        $vss_navigation_border_color = new QodeField("colorsimple", "vss_navigation_border_color", "", "Navigation Active Border Color", "Define active border color for navigation dots");
        $row1->addChild("vss_navigation_border_color", $vss_navigation_border_color);

        $vss_navigation_size = new QodeField("text", "vss_navigation_size", "", "Navigation Size (px)", "Define size for navigation dots", array(), array("col_width" => 1));
        $panel10->addChild("vss_navigation_size", $vss_navigation_size);

        $vss_left_panel_size = new QodeField("text", "vss_left_panel_size", "", "Left Slide Panel size (%)", "Define size for left slide panel. Note that sum of left and right slide panel should be 100.", array(), array("col_width" => 1));
        $panel10->addChild("vss_left_panel_size", $vss_left_panel_size);

        $vss_right_panel_size = new QodeField("text", "vss_right_panel_size", "", "Right Slide Panel size (%)", "Define size for right slide panel. Note that sum of left and right slide panel should be 100.", array(), array("col_width" => 1));
        $panel10->addChild("vss_right_panel_size", $vss_right_panel_size);

        $vss_responsive_advanced = new QodeField("yesno", "vss_responsive_advanced", "no", "Advanced Responsive", "Enable this option for advanced responsive on smaller devices");
        $panel10->addChild("vss_responsive_advanced", $vss_responsive_advanced);
    }
    add_action('qode_options_map','qode_verticalsplitslider_options_map',120);
}
