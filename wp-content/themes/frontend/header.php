<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<title> <?php wp_title('', true,''); ?> </title>
	<meta charset="<?php bloginfo('charset'); ?>">

	<meta http-equiv="Cache-Control" content="no-cache" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- <link rel="apple-touch-icon" sizes="57x57" href="/wp-content/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/wp-content/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/wp-content/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/wp-content/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/wp-content/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/wp-content/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/wp-content/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/wp-content/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/wp-content/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/wp-content/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/favicon/favicon-16x16.png">
	<link rel="manifest" href="/wp-content/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff"> -->

</script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php if (is_active_sidebar('included-js-head')) : ?>
		<div style="display: none;">
			<?php dynamic_sidebar('included-js-head'); ?>
		</div>
	<?php endif; ?>

	<?php get_template_part('./templates/top-nav'); ?> 
	<main>
