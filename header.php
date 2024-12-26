<!doctype html>
<html lang="PL">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/script-min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php get_template_part('template-parts/header/menu'); ?>
	<div id="page" class="site">
		