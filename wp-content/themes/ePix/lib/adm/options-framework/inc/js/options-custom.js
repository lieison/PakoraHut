/**
 * Custom scripts needed for the colorpicker, image button selectors,
 * and navigation tabs.
 */
 
// themeva_mod
(function ($) {

     $.fn.themevaImportDemo = function() {
   
		$("a.import-demo").delegate(this, "click", function() {
                triggerImport();
                return false;
		});
  
		
        triggerImport = function() {
            var d = {
                action: "themeva_options_import_demo",
                _ajax_nonce: $("#_ajax_nonce").val()
            };
            $('body').css('cursor', 'wait');
            $.post(ajaxurl, d, function (r) {
								
                if (r != -1)
				{		
					$('.ajax-message').html('<span class="dashicons dashicons-info"></span>' + r).fadeIn('fast');
					
					setTimeout(function() {
						localStorage.setItem("activetab", '#of-option-general');
                        window.location.reload();
                    }, 4000);					
				
                } else {

					r = '<div class="message warning"><span>&nbsp;</span>The demo data could not be imported.</div>';

					$('.ajax-message').fadeIn('fast').html(r).delay(3000, function()
					{
                		$('.ajax-message').fadeOut();
            		});					
                }
            });
            return false;
        }
    };

    $(document).ready(function () {
        $('.import-demo').themevaImportDemo();
    })

})(jQuery);
 

jQuery(document).ready(function($) {

	// themeva_mod
	if( localStorage.getItem("activetab") == 'undefined' && localStorage.getItem("themeva-init") == 'undefined'  )
	{
		localStorage.getItem("activetab") = '#of-option-gettingstarted';
		localStorage.getItem("themeva-init") = 'activated';
	}

	// Loads the color pickers
	$('.of-color').wpColorPicker();

	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
	});

	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();

	// Loads tabbed sections if they exist
	if ( $('.nav-tab-wrapper').length > 0 ) {
		options_framework_tabs();
	}

	function options_framework_tabs() {

		var $group = $('.group'),
			$navtabs = $('.nav-tab-wrapper a'),
			active_tab = '';

		// Hides all the .group sections to start
		$group.hide();

		// Find if a selected tab is saved in localStorage
		if ( typeof(localStorage) != 'undefined' ) {
			active_tab = localStorage.getItem('active_tab');
		}

		// If active tab is saved and exists, load it's .group
		if ( active_tab != '' && $(active_tab).length ) {
			$(active_tab).fadeIn();
			$(active_tab + '-tab').addClass('nav-tab-active');
		} else {
			$('.group:first').fadeIn();
			$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
		}

		// Bind tabs clicks
		$navtabs.click(function(e) {

			e.preventDefault();

			// Remove active class from all tabs
			$navtabs.removeClass('nav-tab-active');

			$(this).addClass('nav-tab-active').blur();

			if (typeof(localStorage) != 'undefined' ) {
				localStorage.setItem('active_tab', $(this).attr('href') );
			}

			var selected = $(this).attr('href');

			$group.hide();
			$(selected).fadeIn();

		});
	}

});