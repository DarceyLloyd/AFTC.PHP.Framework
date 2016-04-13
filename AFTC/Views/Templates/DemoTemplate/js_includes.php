
	<!-- Using GoogleFonts? Use via JS, it will fix font bugs a strange bug where text disappears -->
	<script type="text/javascript">
	WebFontConfig = {
		google: { families: [ 'Roboto:400,700:latin', 'Pontano+Sans::latin' ] }
	};
	(function() {
		var wf = document.createElement('script');
		wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})(); </script>


	<script type="text/javascript" src="<?php echo($this->data["site-path"]); ?>/includes/js/jquery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?php echo($this->data["site-path"]); ?>/includes/js/touchswipe/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="<?php echo($this->data["site-path"]); ?>/includes/js/gsap/TweenMax.min.js"></script>
	<script type="text/javascript" src="<?php echo($this->data["site-path"]); ?>/includes/js/other/smoothscroll.js"></script>
	
	<script type="text/javascript" src="<?php echo($this->data["site-path"]); ?>/includes/js/syntaxhighlighter/shCore.js"></script>
	<script type="text/javascript" src="<?php echo($this->data["site-path"]); ?>/includes/js/syntaxhighlighter/shBrushesCombined-dist.js"></script>

	<script type="text/javascript" src="<?php echo($this->data["site-path"]); ?>/includes/js/aftc/aftc.js"></script>

	<script type="text/javascript" src="<?php echo($this->data["site-path"]); ?>/includes/js/global/variables.js"></script>
	<script type="text/javascript" src="<?php echo($this->data["site-path"]); ?>/includes/js/global/social.js"></script>
	<script type="text/javascript" src="<?php echo($this->data["site-path"]); ?>/includes/js/global/event-handlers.js"></script>
