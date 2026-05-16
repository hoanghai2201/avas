<!DOCTYPE html>
<html <?php language_attributes(); ?> class="">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<title><?php wp_title('|', true, 'right'); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
	<?php wp_head(); ?>
	<?php
	global $domain;
	$favicon_url = get_option('site_favicon');
	if($favicon_url) : ?>
	    <link rel="icon" href="<?php echo esc_url($favicon_url); ?>" type="image/x-icon" />
	    <link rel="apple-touch-icon" href="<?php echo esc_url($favicon_url); ?>" />
	    <meta name="msapplication-TileImage" content="<?php echo esc_url($favicon_url); ?>" />
	<?php endif; ?>

   <link href="<?php echo $domain; ?>/wp-content/themes/aquariuss/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $domain; ?>/wp-content/themes/aquariuss/css/flatpickr.min.css" rel="stylesheet">
	<link href="<?php echo $domain; ?>/wp-content/themes/aquariuss/css/flickity.min.css" rel="stylesheet">
	<link href="<?php echo $domain; ?>/wp-content/themes/aquariuss/css/aos.css" type='text/css' rel='stylesheet' media='all' />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<link href="<?php echo $domain; ?>/wp-content/themes/aquariuss/css/style.css?v=<?php echo strtotime(date('H:i:s')); ?>" rel="stylesheet">
	<?php if(is_page('oem-works')): ?>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" type='text/css' rel='stylesheet' media='all' />
	<?php endif;  ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="wrapper">

<nav id="navbar" class="navbar navbar-expand-lg navbar-main p-3">
	<?php
		get_template_part('template-parts/header/header-wrapper');
	?>
</nav>

<?php
	get_template_part('template-parts/header/menu-mobile');
?>

<main id="main" class="main">