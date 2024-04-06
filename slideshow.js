/*  Script for the Meteor Slides 1.5.6 slideshow

	Copy "slideshow.js" from "/meteor-slides/js/" to your theme's directory to replace
	the plugin's default slideshow script.

	Learn more about customizing the slideshow script for Meteor Slides:
	http://www.jleuze.com/plugins/meteor-slides/customizing-the-slideshow-script/
*/

// Set custom shortcut to avoid conflicts
var $j = jQuery.noConflict();

$j(window).load(function() {

	// Get the slideshow options
	var $slidespeed      = parseInt( meteorslidessettings.meteorslideshowspeed );
	var $slidetimeout    = parseInt( meteorslidessettings.meteorslideshowduration );
	var $slideheight     = parseInt( meteorslidessettings.meteorslideshowheight );
	var $slidewidth      = parseInt( meteorslidessettings.meteorslideshowwidth );
	var $slidetransition = meteorslidessettings.meteorslideshowtransition;

	// Setup jQuery Cycle
	$j('.meteor-slides').cycle({
		cleartypeNoBg: true,
		fit:           1,
		fx:            $slidetransition,
		height:        $slideheight,
		next:          '#meteor-next',
		pager:         '#meteor-buttons',
		pagerEvent:    'click',
		pause:         0,
		prev:          '#meteor-prev',
		slideExpr:     '.mslide',
		speed:         $slidespeed,
		timeout:       $slidetimeout,
		width:         $slidewidth,
	});

	// Setup jQuery TouchWipe
	$j('.meteor-slides').touchwipe({
		wipeLeft: function() {
			$j('.meteor-slides').cycle('next');
		},
		wipeRight: function() {
			$j('.meteor-slides').cycle('prev');
		},
		preventDefaultEvents: false
	});

	// Add class to hide and show prev/next nav on hover
	$j('.meteor-slides').hover(function () {
		$j(this).addClass('navhover');
	}, function () {
		$j(this).removeClass('navhover');
	});
	// Add Pause Buttons
    $j('#meteor-pause').click(function() {
        $j('.meteor-slides').cycle('pause');
        $j('#meteor-pause').attr('aria-disabled', 'true');
        $j('#meteor-resume').attr('aria-hidden', 'false');
        $j('.meteor-resume-text').text('Play');
        $j('.meteor-pause-text').text('Paused');
        $j(this).toggleClass('active');
        $j('#meteor-resume').toggleClass('active');
        console.log("Slideshow Paused");
    });
	// Add Resume Button
    $j('#meteor-resume').click(function() {
        $j('.meteor-slides').cycle('resume');
        $j('#meteor-pause').attr('aria-disabled', 'false');
        $j('#meteor-resume').attr('aria-hidden', 'true');
        $j('.meteor-resume-text').text('Playing');
        $j('.meteor-pause-text').text('Pause');
        $j(this).toggleClass('active');
        $j('#meteor-pause').toggleClass('active');
        console.log("Slideshow Resumed");
    });
	// Set a fixed height for prev/next nav in IE6
	if(typeof document.body.style.maxWidth === 'undefined') {
		$j('.meteor-nav a').height($slideheight);
	}

	// Add align class if set in metadata
	$j('.meteor-slides').each(function () {
		meteormetadata = $j(this).metadata();
		if (meteormetadata.align == 'left') {
			$j(this).addClass('meteor-left');
		} else if (meteormetadata.align == 'right') {
			$j(this).addClass('meteor-right');
		} else if (meteormetadata.align == 'center') {
			$j(this).addClass('meteor-center');
		}
	});

});