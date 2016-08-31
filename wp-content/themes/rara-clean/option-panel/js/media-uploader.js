jQuery(document).ready(function($){

	var optionsrara_upload;
	var optionsrara_selector;

	function optionsrara_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		optionsrara_selector = selector;

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( optionsrara_upload ) {
			optionsrara_upload.open();
		} else {
			// Create the media frame.
			optionsrara_upload = wp.media.frames.optionsrara_upload =  wp.media({
				// Set the title of the modal.
				title: $el.data('choose'),

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: $el.data('update'),
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				}
			});

			// When an image is selected, run a callback.
			optionsrara_upload.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = optionsrara_upload.state().get('selection').first();
				optionsrara_upload.close();
				optionsrara_selector.find('.upload').val(attachment.attributes.url);
				if ( attachment.attributes.type == 'image' ) {
					optionsrara_selector.find('.screenshot').empty().hide().append('<img src="' + attachment.attributes.url + '"><a class="remove-image">Remove</a>').slideDown('fast');
				}
				optionsrara_selector.find('.upload-button').unbind().addClass('remove-file').removeClass('upload-button').val(optionsrara_l10n.remove);
				optionsrara_selector.find('.of-background-properties').slideDown();
				optionsrara_selector.find('.remove-image, .remove-file').on('click', function() {
					optionsrara_remove_file( $(this).parents('.section') );
				});
			});

		}

		// Finally, open the modal.
		optionsrara_upload.open();
	}

	function optionsrara_remove_file(selector) {
		selector.find('.remove-image').hide();
		selector.find('.upload').val('');
		selector.find('.of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind().addClass('upload-button').removeClass('remove-file').val(optionsrara_l10n.upload);
		// We don't display the upload button if .upload-notice is present
		// This means the user doesn't have the WordPress 3.5 Media Library Support
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.upload-button').remove();
		}
		selector.find('.upload-button').on('click', function(event) {
			optionsrara_add_file(event, $(this).parents('.section'));
		});
	}

	$('.remove-image, .remove-file').on('click', function() {
		optionsrara_remove_file( $(this).parents('.section') );
    });

    $('.upload-button').click( function( event ) {
    	optionsrara_add_file(event, $(this).parents('.section'));
    });

});