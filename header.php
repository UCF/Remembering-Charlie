<?php
/**
 * Template: Header.php 
 *
 * @package WPFramework
 * @subpackage Template
 */
?><!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<title>Remembering Dr. Millican (1916-2010)</title>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="<?php bloginfo( 'description' ) ?>" />
	<link rel="shortcut icon" href="<?php echo IMAGES . '/favicon.ico'; ?>" />
	
	<!--[if IE]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
	<!-- jquery: core, UI, plugins, uniform -->
	<script src="<?php echo JS . '/jquery/js/jquery-1.4.2.min.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo JS . '/jquery/plugins/browser.js'; ?>" type="text/javascript"></script>
	
	<!-- blueprint css -->
	<link href="<?php echo CSS . '/blueprint/screen.css';?>" type="text/css" rel="stylesheet" media="screen, projection">
	<link href="<?php echo CSS . '/blueprint/print.css';?>" type="text/css" rel="stylesheet" media="print">
	<!--[if lt IE 8]>
	<link href="<?php echo CSS . '/blueprint/ie.css")';?>" type="text/css" rel="stylesheet" media="screen, projection">
	<![endif]-->
	
	<!-- UCF Header and Stylesheets -->
	<link href="http://universityheader.ucf.edu/bar/css/bar.css" rel="stylesheet" type="text/css">
	<script src="http://universityheader.ucf.edu/bar/js/university-header.js" type="text/javascript" ></script>
	
	<!-- UCF Web Communications -->
	<link href="<?php echo CSS . '/style.css'; ?>" rel="stylesheet" type="text/css" media="all">
	<script src="<?php echo JS . '/script.js'; ?>" type="text/javascript"></script>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen, projection" />
	
  	<!-- Links: RSS + Atom Syndication -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo( 'rss_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo( 'atom_url' ); ?>" />

	<!-- Theme Hook -->
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); // loads the javascript required for threaded comments ?>
	<?php wp_head(); ?>

<!--END head-->
</head>

<!--BEGIN body-->
<body class="<?php semantic_body(); ?>">
	
	<!--BEGIN #wrap -->
	<div id="wrap">

		
		<!-- Header -->
		<div class="span-24 last" id="header">
			<h1><a href="<?php bloginfo( 'url' ); ?>">Remembering Dr. Millican <span>(1916-2010)</span></a> <span id="first-pres">UCF&rsquo;s first president : 1965-1978</span></h1>
		</div><!-- /header -->
		
		<!--BEGIN content container -->
		<div class="span-24 last">
		
		<?php $comments_page = isset($_GET['comments']);?>
		<?php if(!$comments_page):?>
		<img class="centerpiece" src="<?php echo IMAGES . '/Dr-Millican.png'; ?>" alt="Dr. Millican">
		<?php endif;?>