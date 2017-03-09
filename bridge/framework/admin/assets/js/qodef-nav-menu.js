(function($) {
	$(document).ready(function() {
        qodefUpdateIconOptions();
		qodefInitAdditionalItemOptions();
	});

	/**
	 * Function that serializes additional menu item options in a single field.
	 */
	function qodefInitAdditionalItemOptions() {
		var navForm = $('#update-nav-menu');

		navForm.on('change', '[data-item-option]', function() {
			qodefGenerateSerializedString();
		});
	}

	function qodefGenerateSerializedString() {
		var dataArrayString = '';
		var navForm = $('#update-nav-menu');
		var menuItemsData = navForm.find("[data-name]");
		menuItemsData.each(function() {
			//get it's value and name
			var attributeName = $(this).data('name');
			var attributeVal  = $(this).val();

			if(attributeVal !== '') {
				//check if current field is checkbox
				if($(this).is('input[type="checkbox"]')) {
					//append it to serialized string only if it's checked
					if($(this).is(':checked')) {
						dataArrayString += attributeName+"="+attributeVal+'&';
					}
				} else {
					dataArrayString += attributeName+"="+attributeVal+'&';
				}
			}
		});

		//remove last & character
		dataArrayString = dataArrayString.substr(0, dataArrayString.length - 1);

		if($('input[name="qode_menu_options"]').length) {
			$('input[name="qode_menu_options"]').val(encodeURIComponent(dataArrayString));
		} else {
			//generate hidden input field html with serialized string value
			var hiddenMenuItem = '<input type="hidden" name="qode_menu_options" value="'+encodeURIComponent(dataArrayString)+'">';

			//append hidden options field to navigation form
			navForm.append(hiddenMenuItem);
		}
	}

    /**
     * Function that loads icon options via AJAX based on icon pack option
     */
    function qodefUpdateIconOptions() {
        var navForm = $('#update-nav-menu');

        navForm.on('change', '[data-icon-pack]', function() {
            var chosenIconPack = $(this).find('option:selected').val();
            var iconDropdown   = $(this).parents('p').first().next('.qodef-icon-select-holder').find('select');
            var spinner        = $(this).parents('li.menu-item').first().find('.spinner');

            var data = {
                action: 'update_admin_nav_icon_options',
                icon_pack: chosenIconPack
            }

            spinner.css('visibility', 'visible');
            iconDropdown.attr('disabled', 'disabled');

            $.post(ajaxurl, data, function(data){
                iconDropdown.html(data)
                spinner.css('visibility', 'hidden');
                iconDropdown.removeAttr('disabled');
            });
        });
    }
})(jQuery);