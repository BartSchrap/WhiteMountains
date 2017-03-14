// using window.load
		jQuery(window).load(function() {
        // first fadeout loading-font
        jQuery("#loading-font").fadeOut();
        // setting delay and show
        jQuery("#fullloader").delay(250).fadeOut("slow");
    });