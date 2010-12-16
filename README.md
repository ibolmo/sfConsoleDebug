An attempt to replace the **obtrusive** `sfWebDebug` toolbar.

As you have noticed, the `sfWebDebug` toolbar *dumps* large amount of code (JavaScript, HTML, and CSS) thereby making the source code look like *crap*.

What this small plugin does (at least for now) is convert each of the panels into a JSON object and just `console.log` them. Not a huge win, but the primary benefit is accomplished: single line of junk at the very bottom of your source code.


Getting Started
---------------

	git submodule add git://github.com/ibolmo/sfConsoleDebug.git plugins/sfConsoleDebugPlugin
	
	# $this->enablePlugins('sfConsoleDebugPlugin') in
	$EDITOR config/ProjectConfiguration.class.php

Add to your application's `factories.yml`

	  logger:
	    param:
	      loggers:
	        sf_web_debug:
	          param:
	            web_debug_class: sfConsoleDebug
