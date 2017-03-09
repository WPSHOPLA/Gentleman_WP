(function($){
    $(document).ready(function() {
        //plugins init goes here
        qodefInitSelectChange();
        qodefInitSwitch();
        qodefInitTooltips();
        qodefInitColorpicker();
        qodefInitRangeSlider();
        qodefInitMediaUploader();
        qodefInitGalleryUploader();
        //qodefInitPortfolioImagesVideos();
        if ($('.qodef-page-form').length > 0) {
            qodefInitAjaxForm();
            qodefInitSearchFloat();
            qodeScrollToAnchor();
			qodeCheckVisibilityOfAnchorButtons();
			qodeCheckAnchorsOnDependencyChange();
            qodeChangedInput();
        }
        qodefInitPortfolioImagesVideosBox();
		qodeInitPortfolioMediaAcc();
		qodefInitPortfolioItemsBox();
		qodeInitPortfolioItemAcc();
        qodefInitDatePicker();
		qodefRemoveVCDeprecatedClass();
	    qodeImportThemeOptions();
    });
    
    function qodefRemoveVCDeprecatedClass() {
		$('.wpb-layout-element-button').each( function() {
			$(this).removeClass('vc_element-deprecated');
		})
    }



    /**
     * TODO: add qodef classes to selectors
     */

    function qodeChangedInput () {
        $('.qodef-tabs-content').on('change keyup keydown', 'input:not([type="submit"]), textarea, select', function (e) {
            $('.qodef-input-change').addClass('yes');
			checkBottomPaddingOfFormWrapDiv();
        });
        $('.field.switch label:not(.selected)').click( function() {
            $('.qodef-input-change').addClass('yes');
			checkBottomPaddingOfFormWrapDiv();
        });
        $(window).on('beforeunload', function () {
            if ($('.qodef-input-change.yes').length) {
                return 'You haven\'t saved your changes.';
            }
        });
        $('#anchornav input').click(function() {
            if ($('.qodef-input-change.yes').length) {
                $('.qodef-input-change.yes').removeClass('yes');
            }
            $('.qodef-changes-saved').addClass('yes');
			checkBottomPaddingOfFormWrapDiv();
            setTimeout(function(){$('.qodef-changes-saved').removeClass('yes'); checkBottomPaddingOfFormWrapDiv();}, 3000);
        });


    }

    function qodeScrollToAnchor () {
        $('#anchornav a').click( function() {
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top - 45
            }, 1000);
            return false;
    	});
    }

	function qodeCheckVisibilityOfAnchorButtons () {

		$('.qodef-page-form > div:hidden').each( function() {
			var $panelID =  $(this).attr('id');
			$('#anchornav a').each ( function() {
				if ($(this).attr('href') == '#'+$panelID) {
					$(this).parent().hide();//hide li's
				}
			});
		})

	}

    function qodeCheckAnchorsOnDependencyChange(){
        $(document).on('click','.cb-enable.dependence, .cb-disable.dependence',function(){

            //check for links to hide
            var hidden_elements_string = $(this).data('hide');
            if(hidden_elements_string.indexOf(",") >= 0) {
                var hidden_elements_array = hidden_elements_string.split(',');
            }else{
                var hidden_elements_array = new Array(hidden_elements_string);
            }

            //check for links to show
            var shown_elements_string = $(this).data('show');
            if(shown_elements_string.indexOf(",") >= 0) {
                var shown_elements_array = shown_elements_string.split(',');
            }else{
                var shown_elements_array = new Array(shown_elements_string);
            }

            //show all buttons, but hide unnecessary ones
            //$('#anchornav li').show();
            $.each(hidden_elements_array, function(index, value){
                $('#anchornav a').each ( function() {

                    if ($(this).attr('href') == value) {
                        $(this).parent().hide();//hide <li>s
                    }
                });
            });
            $.each(shown_elements_array, function(index, value){
                $('#anchornav a').each ( function() {
                    if ($(this).attr('href') == value) {
                        $(this).parent().show();//show <li>s
                    }
                });
            });
        });
    }

	function checkBottomPaddingOfFormWrapDiv(){
		//check bottom padding of form wrap div, since bottom holder is changing its height because of the info messages
		setTimeout(function(){
			$('.qodef-page-form').css('padding-bottom', $('.form-button-section').height());
		},350);

	}

    function qodefInitSearchFloat() {
        var $wrapForm = $('.qodef-page-form'),
        $controls = $('.form-button-section'),
		$buttonSection = $('.form-button-section')

        function initControlsSize() {
            $('#anchornav').css({
                "width" : $wrapForm.width()
            });
			checkBottomPaddingOfFormWrapDiv();
        };

        function initControlsFlow() {
            var wrapBottom = $wrapForm.offset().top + $wrapForm.outerHeight(),
                viewportBottom = $(window).scrollTop() + $(window).height();

            if (viewportBottom <= wrapBottom) {
                $controls.addClass('flow');
            }
            else {
                $controls.removeClass('flow');
            };
        };

        initControlsSize();
        initControlsFlow();

        $(window).on("scroll", function() {
            initControlsFlow();
        });

        $(window).on("resize", function() {
            initControlsSize();
        });

    }

    function qodefInitSelectChange() {
        $('select.dependence').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value.replace(/ /g, '');
            $($(this).data('hide-'+valueSelected)).fadeOut();
            $($(this).data('show-'+valueSelected)).fadeIn();
        });
    }

    function qodefInitSwitch() {
        $(".cb-enable").click(function(){
            var parent = $(this).parents('.switch');
            $('.cb-disable',parent).removeClass('selected');
            $(this).addClass('selected');
            $('.checkbox',parent).attr('checked', true);
            $('.checkboxhidden_yesno',parent).val("yes");
            $('.checkboxhidden_onoff',parent).val("on");
            $('.checkboxhidden_portfoliofollow',parent).val("portfolio_single_follow");
            $('.checkboxhidden_zeroone',parent).val("1");
            $('.checkboxhidden_imagevideo',parent).val("image");
            $('.checkboxhidden_yesempty',parent).val("yes");
            $('.checkboxhidden_flagpost',parent).val("post");
            $('.checkboxhidden_flagpage',parent).val("page");
            $('.checkboxhidden_flagmedia',parent).val("attachment");
            $('.checkboxhidden_flagportfolio',parent).val("portfolio_page");
            $('.checkboxhidden_flagproduct',parent).val("product");
        });
        $(".cb-disable").click(function(){
            var parent = $(this).parents('.switch');
            $('.cb-enable',parent).removeClass('selected');
            $(this).addClass('selected');
            $('.checkbox',parent).attr('checked', false);
            $('.checkboxhidden_yesno',parent).val("no");
            $('.checkboxhidden_onoff',parent).val("off");
            $('.checkboxhidden_portfoliofollow',parent).val("portfolio_single_no_follow");
            $('.checkboxhidden_zeroone',parent).val("0");
            $('.checkboxhidden_imagevideo',parent).val("video");
            $('.checkboxhidden_yesempty',parent).val("");
            $('.checkboxhidden_flagpost',parent).val("");
            $('.checkboxhidden_flagpage',parent).val("");
            $('.checkboxhidden_flagmedia',parent).val("");
            $('.checkboxhidden_flagportfolio',parent).val("");
            $('.checkboxhidden_flagproduct',parent).val("");
        });
        $(".cb-enable.dependence").click(function(){
            $($(this).data('hide')).fadeOut();
            $($(this).data('show')).fadeIn();
        });
        $(".cb-disable.dependence").click(function(){
            $($(this).data('hide')).fadeOut();
            $($(this).data('show')).fadeIn();
        });
    }

    function qodefInitTooltips() {
        $('.qodef-tooltip').tooltip();
    }

    function qodefInitColorpicker() {
        $('.qodef-page .my-color-field').wpColorPicker({
            change:    function( event, ui ) {
                $('.qodef-input-change').addClass('yes');
            }
        });
    }

    /**
     * Function that initializes
     */
    function qodefInitRangeSlider() {
        if($('.qodef-slider-range').length) {

            $('.qodef-slider-range').each(function() {
                var Link = $.noUiSlider.Link;

                var start       = 0;            //starting position of slider
                var min         = 0;            //minimal value
                var max         = 100;          //maximal value of slider
                var step        = 1;            //number of steps to snap to
                var orientation = 'horizontal';   //orientation. Could be vertical or horizontal
                var prefix      = '';           //prefix to the serialized value that is written field
                var postfix     = '';           //postfix to the serialized value that is written to field
                var thousand    = '';           //separator for thousand
                var decimals    = 2;            //number of decimals
                var mark        = '.';          //decimal separator

                //is data-start attribute set for current instance?
                if($(this).data('start') != null && $(this).data('start') !== "" && $(this).data('start') != "0.00") {
                    start = $(this).data('start');
                    if (start == "1.00") start = 1;
                    if(parseInt(start) == start){
                        start = parseInt(start);
                    }
                }

                //is data-min attribute set for current instance?
                if($(this).data('min') != null && $(this).data('min') !== "") {
                    min = $(this).data('min');
                }

                //is data-max attribute set for current instance?
                if($(this).data('max') != null && $(this).data('max') !== "") {
                    max = $(this).data('max');
                }

                //is data-step attribute set for current instance?
                if($(this).data('step') != null && $(this).data('step') !== "") {
                    step = $(this).data('step');
                }

                //is data-orientation attribute set for current instance?
                if($(this).data('orientation') != null && $(this).data('orientation') !== "") {
                    //define available orientations
                    var availableOrientations = ['horizontal', 'vertical'];

                    //is data-orientation value in array of available orientations?
                    if(availableOrientations.indexOf($(this).data('orientation'))) {
                        orientation = $(this).data('orientation');
                    }
                }

                //is data-prefix attribute set for current instance?
                if($(this).data('prefix') != null && $(this).data('prefix') !== "") {
                    prefix = $(this).data('prefix');
                }

                //is data-postfix attribute set for current instance?
                if($(this).data('postfix') != null && $(this).data('postfix') !== "") {
                    postfix = $(this).data('postfix');
                }

                //is data-thousand attribute set for current instance?
                if($(this).data('thousand') != null && $(this).data('thousand') !== "") {
                    thousand = $(this).data('thousand');
                }

                //is data-decimals attribute set for current instance?
                if($(this).data('decimals') != null && $(this).data('decimals') !== "") {
                    decimals = $(this).data('decimals');
                }

                //is data-mark attribute set for current instance?
                if($(this).data('mark') != null && $(this).data('mark') !== "") {
                    mark = $(this).data('mark');
                }

                $(this).noUiSlider({
                    start: start,
                    step: step,
                    orientation: orientation,
                    range: {
                        'min': min,
                        'max': max
                    },
                    serialization: {
                        lower: [
                            new Link({
                                target: $(this).prev('.qodef-slider-range-value')
                            })
                        ],
                        format: {
                            // Set formatting
                            thousand: thousand,
                            postfix: postfix,
                            prefix: prefix,
                            decimals: decimals,
                            mark: mark
                        }
                    }
                }).on({
                    change: function(){
                        $('.qodef-input-change').addClass('yes');
                    }
                });
            });
        }
    }

    function qodefInitMediaUploader() {
        if($('.qodef-media-uploader').length) {
            $('.qodef-media-uploader').each(function() {
                var fileFrame;
                var uploadUrl;
                var uploadHeight;
                var uploadWidth;
                var uploadImageHolder;
                var attachment;
                var removeButton;

                //set variables values
                uploadUrl           = $(this).find('.qodef-media-upload-url');
                uploadHeight        = $(this).find('.qodef-media-upload-height');
                uploadWidth        = $(this).find('.qodef-media-upload-width');
                uploadImageHolder   = $(this).find('.qodef-media-image-holder');
                removeButton        = $(this).find('.qodef-media-remove-btn');

                if (uploadImageHolder.find('img').attr('src') != "") {
                    removeButton.show();
                    qodefInitMediaRemoveBtn(removeButton);
                  }

                $(this).on('click', '.qodef-media-upload-btn', function() {
                    //if the media frame already exists, reopen it.
                    if (fileFrame) {
                        fileFrame.open();
                        return;
                    }

                    //create the media frame
                    fileFrame = wp.media.frames.fileFrame = wp.media({
                        title: $(this).data('frame-title'),
                        button: {
                            text: $(this).data('frame-button-text')
                        },
                        multiple: false
                    });

                    //when an image is selected, run a callback
                    fileFrame.on( 'select', function() {
                        attachment = fileFrame.state().get('selection').first().toJSON();
                        removeButton.show();
                        qodefInitMediaRemoveBtn(removeButton);
                        //write to url field and img tag
                        if(attachment.hasOwnProperty('url') && attachment.hasOwnProperty('sizes')) {
                            uploadUrl.val(attachment.url);
                            if (attachment.sizes.thumbnail)
                                uploadImageHolder.find('img').attr('src', attachment.sizes.thumbnail.url);
                            else
                                uploadImageHolder.find('img').attr('src', attachment.url);
                            uploadImageHolder.show();
                        } else if (attachment.hasOwnProperty('url')) {
                            uploadUrl.val(attachment.url);
                            uploadImageHolder.find('img').attr('src', attachment.url);
                            uploadImageHolder.show();
                        }

                        //write to hidden meta fields
                        if(attachment.hasOwnProperty('height')) {
                            uploadHeight.val(attachment.height);
                        }

                        if(attachment.hasOwnProperty('width')) {
                            uploadWidth.val(attachment.width);
                        }
                        $('.qodef-input-change').addClass('yes');
                    });

                    //open media frame
                    fileFrame.open();
                });
            });
        }

        function qodefInitMediaRemoveBtn(btn) {
            btn.on('click', function() {
                //remove image src and hide it's holder
                btn.siblings('.qodef-media-image-holder').hide();
                btn.siblings('.qodef-media-image-holder').find('img').attr('src', '');

                //reset meta fields
                btn.siblings('.qodef-media-meta-fields').find('input[type="hidden"]').each(function(e) {
                    $(this).val('');
                });

                btn.hide();
            });
        }
    }

    function qodefInitGalleryUploader() {

        var $qodef_upload_button = jQuery('.qodef-gallery-upload-btn');

        var $qodef_clear_button = jQuery('.qodef-gallery-clear-btn');

        wp.media.customlibEditGallery1 = {

            frame: function() {

                if ( this._frame )
                 return this._frame;

                var selection = this.select();

                this._frame = wp.media({
                    id: 'qode_portfolio-image-gallery',
                    frame: 'post',
                    state: 'gallery-edit',
                    title: wp.media.view.l10n.editGalleryTitle,
                    editing: true,
                    multiple: true,
                    selection: selection
                });

                this._frame.on('update', function() {

                    var controller = wp.media.customlibEditGallery1._frame.states.get('gallery-edit');
                    var library = controller.get('library');
                    // Need to get all the attachment ids for gallery
                    var ids = library.pluck('id');

                    $input_gallery_items.val(ids);

                    jQuery.ajax({
                        type: "post",
                        url: ajaxurl,
                        data: "action=qode_gallery_upload_get_images&ids=" + ids,
                        success: function(data) {

                            $thumbs_wrap.empty().html(data);

                        }
                    });

                });

                return this._frame;
            },

            init: function() {

                $qodef_upload_button.click(function(event) {

                    $thumbs_wrap = $(this).parent().prev().prev();
                    $input_gallery_items = $thumbs_wrap.next();

                    event.preventDefault();
                    wp.media.customlibEditGallery1.frame().open();

                });

                $qodef_clear_button.click(function(event) {

                    $thumbs_wrap = $qodef_upload_button.parent().prev().prev();
                    $input_gallery_items = $thumbs_wrap.next();

                    event.preventDefault();
                    $thumbs_wrap.empty();
					$input_gallery_items.val("");
                });
            },

            // Gets initial gallery-edit images. Function modified from wp.media.gallery.edit
            // in wp-includes/js/media-editor.js.source.html
            select: function() {

                var shortcode = wp.shortcode.next('gallery', '[gallery ids="' + $input_gallery_items.val() + '"]'),
                    defaultPostId = wp.media.gallery.defaults.id,
                    attachments, selection;

                // Bail if we didn't match the shortcode or all of the content.
                if (!shortcode)
                    return;

                // Ignore the rest of the match object.
                shortcode = shortcode.shortcode;

                if (_.isUndefined(shortcode.get('id')) && !_.isUndefined(defaultPostId))
                    shortcode.set('id', defaultPostId);

                attachments = wp.media.gallery.attachments(shortcode);
                selection = new wp.media.model.Selection(attachments.models, {
                    props: attachments.props.toJSON(),
                    multiple: true
                });

                selection.gallery = attachments.gallery;

                // Fetch the query's attachments, and then break ties from the
                // query to allow for sorting.
                selection.more().done(function() {
                    // Break ties with the query.
                    selection.props.set({
                        query: false
                    });
                    selection.unmirror();
                    selection.props.unset('orderby');
                });

                return selection;

            }

        };
        $(wp.media.customlibEditGallery1.init);
    }

	function qodeInitPortfolioItemAcc() {
		//remove portfolio item
		$j(document).on('click', '.remove-portfolio-item', function(event) {
			event.preventDefault();
			var $toggleHolder = $j(this).parent().parent().parent();
			$toggleHolder.fadeOut(300,function() {
				$(this).remove();

				//after removing portfolio image, set new rel numbers and set new ids/names
				$j('.qodef-portfolio-additional-item').each(function(i){
					$j(this).attr('rel',i+1);
					$j(this).find('.number').text($j(this).attr('rel'));
					qodefSetIdOnRemoveItem($j(this),i+1);
				});
				//hide expand all button if all items are removed
				noPortfolioItemShown();
			});
			return false;
		});

		//hide expand all button if there is no items
		noPortfolioItemShown();
		function noPortfolioItemShown()  {
			if($j('.qodef-portfolio-additional-item').length == 0){
				$j('.qodef-toggle-all-item').hide();
			}
		}

		//expand all additional sidebar items on click on 'expand all' button
		$j(document).on('click', '.qodef-toggle-all-item', function(event) {
			event.preventDefault();
			$j('.qodef-portfolio-additional-item').each(function(i){

				var $toggleContent = $j(this).find('.qodef-portfolio-toggle-content');
				var $this = $j(this).find('.toggle-portfolio-item');
				if ($toggleContent.is(':visible')) {
				}
				else {
					$toggleContent.slideToggle();
					$this.html('<i class="fa fa-caret-down"></i>')
				}
			});
			return false;
		});
		//toggle for portfolio additional sidebar items
		$j(document).on('click', '.qodef-portfolio-additional-item .qodef-portfolio-toggle-holder', function(event) {
			event.preventDefault();

			var $this = $j(this);
			var $caret_holder = $this.find('.toggle-portfolio-item');
			$caret_holder.html('<i class="fa fa-caret-up"></i>');
			var $toggleContent = $this.next();
			$toggleContent.slideToggle(function() {
				if ($toggleContent.is(':visible')) {
					$caret_holder.html('<i class="fa fa-caret-up"></i>')
				}
				else {
					$caret_holder.html('<i class="fa fa-caret-down"></i>')
				}
				//hide expand all button function in case of all boxes revealed
				checkExpandAllBtn();
			});
			return false;
		});
		//hide expand all button when it's clicked
		$j(document).on('click','.qodef-toggle-all-item', function(event) {
			event.preventDefault();
			$j(this).hide();
		})

		function checkExpandAllBtn() {
			if($j('.qodef-portfolio-additional-item .qodef-portfolio-toggle-content:hidden').length == 0){
				$j('.qodef-toggle-all-item').hide();
			}else{
				$j('.qodef-toggle-all-item').show();
			}
		}

	}
	
	function qodefInitPortfolioItemsBox() {
		var qode_portfolio_additional_item = $j('.qodef-portfolio-additional-item-holder').clone().html();
        $portfolio_item = '<div class="qodef-portfolio-additional-item" rel="">'+ qode_portfolio_additional_item +'</div>';
		
		$j('a.qodef-add-item').click(function (event) {
			event.preventDefault();
			$j(this).parent().before($j($portfolio_item).hide().fadeIn(500));
            var portfolio_num = $j(this).parent().siblings('.qodef-portfolio-additional-item').length;
            $j(this).parent().siblings('.qodef-portfolio-additional-item:last').attr('rel',portfolio_num);
			qodefSetIdOnAddItem($j(this).parent(),portfolio_num);
			$j(this).parent().prev().find('.number').text(portfolio_num);
		});


//	Delete below commented ??

//		$j(document).on('click', '.remove-portfolio-item', function(event) {
//			event.preventDefault();
//			$j(this).parent().prev().fadeOut(300,function() {
//				$(this).remove();
//
//                //after removing portfolio image, set new rel numbers and set new ids/names
//                $j('.qodef-portfolio-additional-item').each(function(i){
//                    $j(this).attr('rel',i+1);
//                    qodefSetIdOnRemoveItem($j(this),i+1);
//                });
//			});
//
//		});
	}

    function qodefSetIdOnAddItem(addButton,portfolio_num){

        addButton.siblings('.qodef-portfolio-additional-item:last').find('input[type="text"], input[type="hidden"], select, textarea').each(function(){
            var name = $j(this).attr('name');
            var new_name= name.replace("_x", "[]");
            var new_id = name.replace("_x", "_"+portfolio_num);
            $j(this).attr('name',new_name);
            $j(this).attr('id',new_id);

        });
    }

    function qodefSetIdOnRemoveItem(portfolio,portfolio_num){

        if(portfolio_num == undefined){
            var portfolio_num = portfolio.attr('rel');
        }else{
            var portfolio_num = portfolio_num;
        }

        portfolio.find('input[type="text"], input[type="hidden"], select, textarea').each(function(){
            var name = $j(this).attr('name').split('[')[0];
            var new_name = name+"[]";
            var new_id = name+"_"+portfolio_num;
            $j(this).attr('name',new_name);
            $j(this).attr('id',new_id);

        });

    }



	function qodeInitPortfolioMediaAcc() {
		//remove portfolio media
		$j(document).on('click', '.remove-portfolio-media', function(event) {
			event.preventDefault();
			var $toggleHolder = $j(this).parent().parent().parent();
			$toggleHolder.fadeOut(300,function() {
				$(this).remove();

				//after removing portfolio image, set new rel numbers and set new ids/names
				$j('.qodef-portfolio-media').each(function(i){
					$j(this).attr('rel',i+1);
					$j(this).find('.number').text($j(this).attr('rel'));
					qodefSetIdOnRemoveMedia($j(this),i+1);
				});
				//hide expand all button if all medias are removed
				noPortfolioMedia()
			});  return false;
		});

		//hide 'expand all' button if there is no media
		noPortfolioMedia();
		function noPortfolioMedia() {
			if($j('.qodef-portfolio-media').length == 0){
				$j('.qodef-toggle-all-media').hide();
			}
		}

		//expand all portfolio medias (video and images) onClick on 'expand all' button
		$j(document).on('click','.qodef-toggle-all-media', function(event) {
			event.preventDefault();
			$j('.qodef-portfolio-media').each(function(i){

				var $toggleContent = $j(this).find('.qodef-portfolio-toggle-content');
				var $this = $j(this).find('.toggle-portfolio-media');
				if ($toggleContent.is(':visible')) {
				}
				else {
					$toggleContent.slideToggle();
					$this.html('<i class="fa fa-caret-down"></i>')
				}

			});        return false;
		});
		//toggle for portfolio media (images or videos)
		$j(document).on('click', '.qodef-portfolio-media .qodef-portfolio-toggle-holder', function(event) {
			event.preventDefault();
			var $this = $j(this);
			var $caret_holder = $this.find('.toggle-portfolio-media');
			$caret_holder.html('<i class="fa fa-caret-up"></i>');
			var $toggleContent = $j(this).next();
			$toggleContent.slideToggle(function() {
				if ($toggleContent.is(':visible')) {
					$caret_holder.html('<i class="fa fa-caret-up"></i>')
				}
				else {
					$caret_holder.html('<i class="fa fa-caret-down"></i>')
				}
				//hide expand all button function in case of all boxes revealed
				checkExpandAllMediaBtn();
			});
			return false;
		});
		//hide expand all button when it's clicked
		$j(document).on('click','.qodef-toggle-all-media', function(event) {
			event.preventDefault();
			$j(this).hide();
		});
		function checkExpandAllMediaBtn() {
			if($j('.qodef-portfolio-media .qodef-portfolio-toggle-content:hidden').length == 0){
				$j('.qodef-toggle-all-media').hide();
			}else{
				$j('.qodef-toggle-all-media').show();
			}
		}
	}
	


    function qodefInitPortfolioImagesVideosBox() {
         var qodef_portfolio_images = $j('.qodef-hidden-portfolio-images').clone().html();
        $portfolio_image = '<div class="qodef-portfolio-images qodef-portfolio-media" rel="">'+ qodef_portfolio_images +'</div>';
        var qodef_portfolio_videos = $j('.qodef-hidden-portfolio-videos').clone().html();

        $portfolio_videos = '<div class="qodef-portfolio-videos qodef-portfolio-media" rel="">'+ qodef_portfolio_videos +'</div>';
        $j('a.qodef-add-image').click(function (e) {
            e.preventDefault();
            $j(this).parent().before($j($portfolio_image).hide().fadeIn(500));
            var portfolio_num = $j(this).parent().siblings('.qodef-portfolio-media').length;
            $j(this).parent().siblings('.qodef-portfolio-media:last').attr('rel',portfolio_num);
            qodefInitMediaUploaderAdded($j(this).parent());
			qodefSetIdOnAddMedia($j(this).parent(),portfolio_num);
            $j(this).parent().prev().find('.number').text(portfolio_num);
        });

        $j('a.qodef-add-video').click(function (e) {
            e.preventDefault();
            $j(this).parent().before($j($portfolio_videos).hide().fadeIn(500));
            var portfolio_num = $j(this).parent().siblings('.qodef-portfolio-media').length;
            $j(this).parent().siblings('.qodef-portfolio-media:last').attr('rel',portfolio_num);
            qodefInitMediaUploaderAdded($j(this).parent());
			qodefSetIdOnAddMedia($j(this).parent(),portfolio_num);
            $j(this).parent().prev().find('.number').text(portfolio_num);
        });

		$j(document).on('click', '.qodef-remove-last-row-media', function(event) {
			event.preventDefault();
			$j(this).parent().prev().fadeOut(300,function() {
				$(this).remove();

                //after removing portfolio image, set new rel numbers and set new ids/names
                $j('.qodef-portfolio-media').each(function(i){
                    $j(this).attr('rel',i+1);
                    qodefSetIdOnRemoveMedia($j(this),i+1);
                });
			});

		 });
        qodefShowHidePorfolioImageVideoType();
        $j(document).on('change', 'select.qodef-portfoliovideotype', function(e) {
            qodefShowHidePorfolioImageVideoType();
        });
    }

    function qodefSetIdOnAddMedia(addButton,portfolio_num){

        addButton.siblings('.qodef-portfolio-media:last').find('input[type="text"], input[type="hidden"], select, textarea').each(function(){
            var name = $j(this).attr('name');
            var new_name= name.replace("_x", "[]");
            var new_id = name.replace("_x", "_"+portfolio_num);
            $j(this).attr('name',new_name);
            $j(this).attr('id',new_id);

        });

        qodefShowHidePorfolioImageVideoType();
    }

    function qodefSetIdOnRemoveMedia(portfolio,portfolio_num){

        if(portfolio_num == undefined){
            var portfolio_num = portfolio.attr('rel');
        }else{
            var portfolio_num = portfolio_num;
        }

        portfolio.find('input[type="text"], input[type="hidden"], select, textarea').each(function(){
            var name = $j(this).attr('name').split('[')[0];
            var new_name = name+"[]";
            var new_id = name+"_"+portfolio_num;
            $j(this).attr('name',new_name);
            $j(this).attr('id',new_id);

        });

    }


//    function qodefInitPortfolioImagesVideos() {
//
//        var qodef_remove_image = '<a class="qodef_remove_image" onclick="javascript: return false;" href="/" >Remove portfolio image</a>';
//        var qodef_hidden_portfolio_images = $j('.qodef_hidden_portfolio_images').clone().html();
//
//        /* Add portfolio image */
//        $j(document).on('click', 'a.qodef_add_image', function(event) {
//            $portfolio_image = '<div class="qodef_portfolio_image" rel="">'+ qodef_hidden_portfolio_images +'</div>';
//            $j(this).before($j($portfolio_image).hide().fadeIn(500));
//
//            //add new rel number for new portfolio image and set new id/name according to this number
//            var portfolio_num = $j(this).siblings('.qodef_portfolio_image').length;
//            $j(this).siblings('.qodef_portfolio_image:last').attr('rel',portfolio_num);
//            qodefInitMediaUploaderAdded($j(this));
//            qodefSetIdOnAddPortfolio($j(this),portfolio_num);
//
//        });
//
//        /* Remove portfolio image */
//        $j(document).on('click', 'a.qodef_remove_image', function(event) {
//
//            $j(this).closest('.qodef_portfolio_image').fadeOut(500,function(){
//                $j(this).remove();
//
//                //after removing portfolio image, set new rel numbers and set new ids/names
//                $j('.qodef_portfolio_image').each(function(i){
//                    $j(this).attr('rel',i+1);
//                    qodefSetIdOnRemovePortfolio($j(this),i+1);
//                });
//            });
//        });
//        qodefShowHidePorfolioImageVideoType();
//        $j(document).on('change', 'select.qodef-portfoliovideotype', function(e) {
//            qodefShowHidePorfolioImageVideoType();
//        });
//    }

    function qodefSetIdOnAddPortfolio(addButton,portfolio_num){

        addButton.siblings('.qodef_portfolio_image:last').find('input[type="text"], input[type="hidden"], select').each(function(){
            var name = $j(this).attr('name');
            var new_name= name.replace("_x", "[]");
            var new_id = name.replace("_x", "_"+portfolio_num);
            $j(this).attr('name',new_name);
            $j(this).attr('id',new_id);

        });

        qodefShowHidePorfolioImageVideoType();
    }

    function qodefSetIdOnRemovePortfolio(portfolio,portfolio_num){

        if(portfolio_num == undefined){
            var portfolio_num = portfolio.attr('rel');
        }else{
            var portfolio_num = portfolio_num;
        }

        portfolio.find('input[type="text"], select').each(function(){
            var name = $j(this).attr('name').split('[')[0];
            var new_name = name+"[]";
            var new_id = name+"_"+portfolio_num;
            $j(this).attr('name',new_name);
            $j(this).attr('id',new_id);

        });

    }

    function qodefShowHidePorfolioImageVideoType(){


        $j('.qodef-portfoliovideotype').each(function(i){

            var $selected = $j(this).val();

            if($selected == "self"){
                $j(this).parent().parent().parent().find('.qodef-video-id-holder').hide();
                $j(this).parent().parent().parent().parent().find('.qodef-media-uploader').show();
                $j(this).parent().parent().parent().find('.qodef-video-self-hosted-path-holder').show();
            }else{
                $j(this).parent().parent().parent().find('.qodef-video-id-holder').show();
                $j(this).parent().parent().parent().parent().find('.qodef-media-uploader').hide();
                $j(this).parent().parent().parent().find('.qodef-video-self-hosted-path-holder').hide();
            }

        });
    }

    function qodefInitMediaUploaderAdded(addButton) {

        addButton.siblings('.qodef-portfolio-media:last').find('.qodef-media-uploader').each(function(){
                var fileFrame;
                var uploadUrl;
                var uploadHeight;
                var uploadWidth;
                var uploadImageHolder;
                var attachment;
                var removeButton;

                //set variables values
                uploadUrl           = $(this).find('.qodef-media-upload-url');
                uploadHeight        = $(this).find('.qodef-media-upload-height');
                uploadWidth        = $(this).find('.qodef-media-upload-width');
                uploadImageHolder   = $(this).find('.qodef-media-image-holder');
                removeButton        = $(this).find('.qodef-media-remove-btn');

                if (uploadImageHolder.find('img').attr('src') != "") {
                    removeButton.show();
                    qodefInitMediaRemoveBtn(removeButton);
                  }

                $(this).on('click', '.qodef-media-upload-btn', function() {
                    //if the media frame already exists, reopen it.
                    if (fileFrame) {
                        fileFrame.open();
                        return;
                    }

                    //create the media frame
                    fileFrame = wp.media.frames.fileFrame = wp.media({
                        title: $(this).data('frame-title'),
                        button: {
                            text: $(this).data('frame-button-text')
                        },
                        multiple: false
                    });

                    //when an image is selected, run a callback
                    fileFrame.on( 'select', function() {
                        attachment = fileFrame.state().get('selection').first().toJSON();
                        removeButton.show();
                        qodefInitMediaRemoveBtn(removeButton);
                        //write to url field and img tag
                        if(attachment.hasOwnProperty('url') && attachment.hasOwnProperty('sizes')) {
                            uploadUrl.val(attachment.url);
                            if (attachment.sizes.thumbnail)
                                uploadImageHolder.find('img').attr('src', attachment.sizes.thumbnail.url);
                            else
                                uploadImageHolder.find('img').attr('src', attachment.url);
                            uploadImageHolder.show();
                        } else if (attachment.hasOwnProperty('url')) {
                            uploadUrl.val(attachment.url);
                            uploadImageHolder.find('img').attr('src', attachment.url);
                            uploadImageHolder.show();
                        }

                        //write to hidden meta fields
                        if(attachment.hasOwnProperty('height')) {
                            uploadHeight.val(attachment.height);
                        }

                        if(attachment.hasOwnProperty('width')) {
                            uploadWidth.val(attachment.width);
                        }
                        $('.qodef-input-change').addClass('yes');
                    });

                    //open media frame
                    fileFrame.open();
                });
            });

        function qodefInitMediaRemoveBtn(btn) {
            btn.on('click', function() {
                //remove image src and hide it's holder
                btn.siblings('.qodef-media-image-holder').hide();
                btn.siblings('.qodef-media-image-holder').find('img').attr('src', '');

                //reset meta fields
                btn.siblings('.qodef-media-meta-fields').find('input[type="hidden"]').each(function(e) {
                    $(this).val('');
                });

                btn.hide();
            });
        }
    }

    function qodefInitAjaxForm() {
        $('#qode_top_save_button').click( function() {
            $('.qode_ajax_form').submit();
            if ($('.qodef-input-change.yes').length) {
                $('.qodef-input-change.yes').removeClass('yes');
            }
            $('.qodef-changes-saved').addClass('yes');
            setTimeout(function(){$('.qodef-changes-saved').removeClass('yes');}, 3000);
            return false;
        });
        $(document).delegate(".qode_ajax_form", "submit", function (a) {
        var b = $(this);
        var c = {
            action: "qodef_save_options"
        };
        jQuery.ajax({
            url: ajaxurl,
            cache: !1,
            type: "POST",
            data: jQuery.param(c, !0) + "&" + b.serialize()
//            ,
//            success: function(data, textStatus, XMLHttpRequest){
//                alert(data);
//            }
        }), a.preventDefault(), a.stopPropagation()
    })
    }

    function qodefInitDatePicker() {
        $j( ".qodef-input.datepicker" ).datepicker( { dateFormat: "MM dd, yy" });
    }

	function qodeImportThemeOptions(){

		if($('.qode_import_export_ajax_form').length) {
			var qodefImportBtn = $('#qodef-import-theme-options-btn');
			qodefImportBtn.on('click', function(e) {
				e.preventDefault();
				if (confirm(qodefImportBtn.data('confirm-message'))) {
					qodefImportBtn.blur();
					qodefImportBtn.text(qodefImportBtn.data('waiting-message'));
					var importValue = $('#import_theme_options').val();
					var importNonce = $('#qodef_import_theme_options_secret').val();
					var data = {
						action: 'qode_import_theme_options',
						content: importValue,
						nonce: importNonce
					};
					$.ajax({
						type: "POST",
						url: ajaxurl,
						data: data,
						success: function (data) {
							var response = JSON.parse(data);
							if (response.status == 'error') {
								alert(response.message);
							} else {
								qodefImportBtn.text('Import');
								$('.qodef-bckp-message').text(response.message);
							}
						}
					});
				}
			});
		}
	}

})(jQuery);
