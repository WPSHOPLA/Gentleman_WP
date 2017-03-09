<?php
if(!function_exists('qode_import_export_options_map')) {
    /**
     * Import/Export options page
     */
    function qode_import_export_options_map(){

        $importexportPage = new QodeAdminPage("_importexport", "Import/Export Options", "fa fa-database");
        qode_framework()->qodeOptions->addAdminPage("Import/Export Options", $importexportPage);


        $panel1 = new QodeImportExport("Import/Export Options", "importexport_section");
		$importexportPage->addChild("panel1", $panel1);

    }
    add_action('qode_options_map','qode_import_export_options_map',215);
}