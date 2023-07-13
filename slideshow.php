<?
if (function_exists('meteor_slideshow')) { ?>
	<section class="super-container slideshow-holder" aria-label="Home page main carousel">
		<p class="sr-only">This is the main carousel for the home page. It is set to auto play. Use the pause button to stop the carousel and the play button to resume.</p>
		<div class="slideshow-stage">
			<?php
			meteor_slideshow();
			?>
            <div class="slideshow-controls">
                <button id="meteor-pause" role="button" aria-label="Pause Slideshow"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 19.1H3V5h18v14.1zM21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/><path d="M21 19.1H3V5h18v14.1zM21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" fill="none"/><path d="M9 8h2v8H9zm4 0h2v8h-2z"/></svg><span class="meteor-pause-text">Pause</span></button>
				<button id="meteor-resume" class="active" role="button" aria-label="Resume Slideshow" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 8v8l5-4-5-4zm9-5H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/></svg><span class="meteor-resume-text">Playing</span></button>
            </div>
		</div> <!-- .slideshow-stage -->

		<div class="super-container slideshow-overlay">
			<div class="container">
				<div class="sixteen columns alpha omega">
					<div class="slide-link">
						<a href="<? echo get_permalink(296); ?>" class="apply">Apply Now</a>
					</div>
					<div class="slide-link">
						<a href="<? echo get_permalink(263); ?>" class="plan">Plan a Visit</a>
					</div>
                    <div class="slide-link">
                        <a href="<? echo get_permalink(265); ?>" class="request">Request Info</a>
                    </div>
                    <div class="slide-link">
                        <a href="<? echo get_permalink(5360); ?>" class="tour">Virtual Tour</a>
                    </div>
				</div><!-- menu-holder -->
			</div><!-- End container -->
		</div> <!-- End menu-overlay -->
	</section><!-- End slideshow-holder -->

<? } ?>