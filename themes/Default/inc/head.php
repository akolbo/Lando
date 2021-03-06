<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="dns-prefetch" href="//ajax.googleapis.com">
	<link rel="dns-prefetch" href="https://dl.dropbox.com">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width">
	<meta name="description" content="<?php echo $site_description ?>" />
	
	<?php if(path_segment(1) == "drafts") echo '<meta name="robots" content="noindex, nofollow" />' ?>
	
	<title><?php if(preg_match('~^(Home|Untitled)$~', $Current->title()) == 0) echo $Current->title()." - " ?><?php echo $site_title ?></title>
	
	<link rel="alternate" type="application/rss+xml" title="<?php echo $site_title ?>" href="<?php echo $site_root ?>/rss/" />

	<!-- You can override the Lando favicon for your theme here -->
	<!-- <link rel="icon" href="<?php echo $site_root ?>/favicon.png" /> -->

	<!-- Default styles -->
	<link rel="stylesheet" href="<?php echo $theme_dir ?>/css/screen.css" media="screen" />
	<!-- PrettyPhoto styles -->
	<link rel="stylesheet" href="<?php echo $theme_dir ?>/css/prettyPhoto.css" media="screen" />
	<!-- Flux styles -->
	<link rel="stylesheet" href="<?php echo $theme_dir ?>/css/flux.css" media="screen" />
	<!-- Highlight styles -->
	<link rel="stylesheet" href="<?php echo $theme_dir ?>/css/highlight.css" media="screen" />
	
	<!-- Custom styles if style.css file exists alongside current content -->
	<?php if($Current->css()) echo '<style>'.$Current->css().'</style>' ?>
	
	<!--[if lte IE 8]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	
  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo $theme_dir ?>/js/jquery-1.7.1.min.js"><\/script>');</script>

	<script src="<?php echo $theme_dir ?>/js/min/global-min.js"></script>
	
	<!-- PrettyPhoto for galleries: http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone -->
	<script src="<?php echo $theme_dir ?>/js/prettyPhoto/jquery.prettyPhoto.js"></script>
	<!-- Flux slider for slideshows: https://github.com/joelambert/Flux-Slider -->
	<script src="<?php echo $theme_dir ?>/js/flux/flux.min.js"></script>
	<!-- Highlight for code highlighting: http://softwaremaniacs.org/soft/highlight/en/ -->
	<script src="<?php echo $theme_dir ?>/js/highlight/highlight.pack.js"></script>
	
	<script>
		$(function(){
			window.f = new flux.slider('.slideshow', {
				/*There are loads of settings you can adjust here to personalise
					your slideshows. Consult the Flux documentation at 
					https://github.com/joelambert/Flux-Slider */
			});
			
			if(window.matchMedia('screen and (max-width: 700px)').matches) {
  			//link images in the same gallery together
  			$(".gallery a").each(function(index) {
  				var offset = $(this).parent().offset();
  				var id = offset.top + offset.left;
  		    $(this).attr("rel", "prettyPhoto[" + id + "]")
  		  });
  			
  			$("a[rel^='prettyPhoto']").prettyPhoto({
  				/*There are loads of settings you can adjust here to personalise
  					your galleries. Consult the PrettyPhoto documentation at 
  					http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone */
  			});
			}

			//syntax highlight code blocks
			$('pre code').each(
				function(i, e){ 
					hljs.highlightBlock(e, '  ');
				}
			);
		});
	</script>
	
</head>
<body id="<?php echo str_replace("_", "-", $template) ?>">

<?php include "admin_links.php" ?>