<?php
if(!function_exists('qode_social_options_map')) {
    /**
     * Social options page
     */
    function qode_social_options_map()
    {

        $socialPage = new QodeAdminPage("_social", "Social", "fa fa-share-alt");
        qode_framework()->qodeOptions->addAdminPage("socialPage", $socialPage);

        //Social Share

        $panel1 = new QodePanel("Social Sharing", "social_sharing_panel");
        $socialPage->addChild("panel1", $panel1);

        $enable_social_share = new QodeField("yesno", "enable_social_share", "no", "Enable Social Share", "Enabling this option will allow social share on networks of your choice", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_facebook_share_panel,#qodef_twitter_share_panel,#qodef_google_share_panel,#qodef_linked_share_panel,#qodef_tumblr_share_panel,#qodef_pinterest_share_panel,#qodef_vk_share_panel,#qodef_show_social_share_panel"));
        $panel1->addChild("enable_social_share", $enable_social_share);

        //Show Social Share

        $panel9 = new QodePanel("Show Social Share", "show_social_share_panel", "enable_social_share", "no");
        $socialPage->addChild("panel9", $panel9);

        $post_types_names_post = new QodeField("flagpost", "post_types_names_post", "", "Posts", "Show Social Share on Blog Posts");
        $panel9->addChild("post_types_names_post", $post_types_names_post);

        $post_types_names_page = new QodeField("flagpage", "post_types_names_page", "", "Pages", "Show Social Share on Pages");
        $panel9->addChild("post_types_names_page", $post_types_names_page);

        $post_types_names_attachment = new QodeField("flagmedia", "post_types_names_attachment", "", "Media", "Show Social Share for Images and Videos");
        $panel9->addChild("post_types_names_attachment", $post_types_names_attachment);

        $post_types_names_portfolio_page = new QodeField("flagportfolio", "post_types_names_portfolio_page", "", "Portfolio Item", "Show Social Share for Portfolio Items");
        $panel9->addChild("post_types_names_portfolio_page", $post_types_names_portfolio_page);

        if (qode_is_woocommerce_installed()) {
            $post_types_names_product = new QodeField("flagproduct", "post_types_names_product", "", "Product", "Show Social Share for Product Items");
            $panel9->addChild("post_types_names_product", $post_types_names_product);
        }

        //Facebook

        $panel2 = new QodePanel("Facebook Share Options", "facebook_share_panel", "enable_social_share", "no");
        $socialPage->addChild("panel2", $panel2);

        $enable_facebook_share = new QodeField("yesno", "enable_facebook_share", "no", "Enable Share", "Enabling this option will allow sharing via Facebook", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_facebook_share_container"));
        $panel2->addChild("enable_facebook_share", $enable_facebook_share);
        $enable_facebook_share_container = new QodeContainer("enable_facebook_share_container", "enable_facebook_share", "no");
        $panel2->addChild("enable_facebook_share_container", $enable_facebook_share_container);
        $facebook_icon = new QodeField("image", "facebook_icon", "", "Icon", "Upload Facebook icon");
        $enable_facebook_share_container->addChild("facebook_icon", $facebook_icon);

        //Twitter

        $panel3 = new QodePanel("Twitter Share Options", "twitter_share_panel", "enable_social_share", "no");
        $socialPage->addChild("panel3", $panel3);

        $enable_twitter_share = new QodeField("yesno", "enable_twitter_share", "no", "Enable Share", "Enabling this option will allow sharing via Twitter", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_twitter_share_container"));
        $panel3->addChild("enable_twitter_share", $enable_twitter_share);
        $enable_twitter_share_container = new QodeContainer("enable_twitter_share_container", "enable_twitter_share", "no");

        $panel3->addChild("enable_twitter_share_container", $enable_twitter_share_container);
        $twitter_icon = new QodeField("image", "twitter_icon", "", "Icon", "Upload Twitter icon");
        $enable_twitter_share_container->addChild("twitter_icon", $twitter_icon);
        $twitter_via = new QodeField("text", "twitter_via", "", "Via", "");
        $enable_twitter_share_container->addChild("twitter_via", $twitter_via);

        //Google Plus

        $panel4 = new QodePanel("Google Plus Share Options", "google_share_panel", "enable_social_share", "no");
        $socialPage->addChild("panel4", $panel4);

        $enable_google_plus = new QodeField("yesno", "enable_google_plus", "no", "Enable Share", "Enabling this option will allow sharing via Google Plus", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_google_plus_container"));
        $panel4->addChild("enable_google_plus", $enable_google_plus);
        $enable_google_plus_container = new QodeContainer("enable_google_plus_container", "enable_google_plus", "no");
        $panel4->addChild("enable_google_plus_container", $enable_google_plus_container);
        $google_plus_icon = new QodeField("image", "google_plus_icon", "", "Icon", "Upload Google Plus icon");
        $enable_google_plus_container->addChild("google_plus_icon", $google_plus_icon);

        //LinkedIn

        $panel5 = new QodePanel("LinkedIn Share Options", "linked_share_panel", "enable_social_share", "no");
        $socialPage->addChild("panel5", $panel5);

        $enable_linkedin = new QodeField("yesno", "enable_linkedin", "no", "Enable Share", "Enabling this option will allow sharing via LinkedIn", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_linkedin_container"));
        $panel5->addChild("enable_linkedin", $enable_linkedin);
        $enable_linkedin_container = new QodeContainer("enable_linkedin_container", "enable_linkedin", "no");
        $panel5->addChild("enable_linkedin_container", $enable_linkedin_container);
        $linkedin_icon = new QodeField("image", "linkedin_icon", "", "Icon", "Upload LinkedIn icon");
        $enable_linkedin_container->addChild("linkedin_icon", $linkedin_icon);

        //Tumblr

        $panel6 = new QodePanel("Tumblr Share Options", "tumblr_share_panel", "enable_social_share", "no");
        $socialPage->addChild("panel6", $panel6);

        $enable_tumblr = new QodeField("yesno", "enable_tumblr", "no", "Enable Share", "Enabling this option will allow sharing via Tumblr", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_tumblr_container"));
        $panel6->addChild("enable_tumblr", $enable_tumblr);
        $enable_tumblr_container = new QodeContainer("enable_tumblr_container", "enable_tumblr", "no");
        $panel6->addChild("enable_tumblr_container", $enable_tumblr_container);
        $tumblr_icon = new QodeField("image", "tumblr_icon", "", "Icon", "Upload Tumblr icon");
        $enable_tumblr_container->addChild("tumblr_icon", $tumblr_icon);

        // Pinterest

        $panel7 = new QodePanel("Pinterest Share Options", "pinterest_share_panel", "enable_social_share", "no");
        $socialPage->addChild("panel7", $panel7);

        $enable_pinterest = new QodeField("yesno", "enable_pinterest", "no", "Enable Share", "Enabling this option will allow sharing via Pinterest", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_pinterest_container"));
        $panel7->addChild("enable_pinterest", $enable_pinterest);
        $enable_pinterest_container = new QodeContainer("enable_pinterest_container", "enable_pinterest", "no");
        $panel7->addChild("enable_pinterest_container", $enable_pinterest_container);
        $pinterest_icon = new QodeField("image", "pinterest_icon", "", "Icon", "Upload Pinterest icon");
        $enable_pinterest_container->addChild("pinterest_icon", $pinterest_icon);

        //VK

        $panel8 = new QodePanel("VK Share Options", "vk_share_panel", "enable_social_share", "no");
        $socialPage->addChild("panel8", $panel8);

        $enable_vk = new QodeField("yesno", "enable_vk", "no", "Enable Share", "Enabling this option will allow sharing via VK", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_vk_container"));
        $panel8->addChild("enable_vk", $enable_vk);
        $enable_vk_container = new QodeContainer("enable_vk_container", "enable_vk", "no");
        $panel8->addChild("enable_vk_container", $enable_vk_container);
        $vk_icon = new QodeField("image", "vk_icon", "", "Icon", "Upload VK icon");
        $enable_vk_container->addChild("vk_icon", $vk_icon);

        if (defined('QODE_INSTAGRAM_WIDGET_VERSION')) {
            $instagram_panel = new QodePanel('Instagram', 'panel_instagram');
            $socialPage->addChild("instagram_panel", $instagram_panel);

            $instagram_button = new QodeInstagramFramework("Connect", "ThisIsDescription");
            $instagram_panel->addChild("instagram_button", $instagram_button);
        }

		if(defined('QODE_TWITTER_FEED_VERSION')) {
			$twitter_panel = qode_add_admin_panel(array(
				'title' => 'Twitter',
				'name'  => 'panel_twitter',
				'page'  => 'socialPage'
			));

			qode_add_admin_twitter_button(array(
				'name'   => 'twitter_button',
				'parent' => $twitter_panel
			));
		}

    }
    add_action('qode_options_map','qode_social_options_map',130);
}