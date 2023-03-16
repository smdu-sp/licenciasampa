<?php

/**
 * This is the template that displays all of the <head> section.
 *
 * @package AprovaSP
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php lct_title('|'); ?></title>

	<link rel="icon" href="/assets/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<header>
		<?php 
			include_once 'header/barra-acessibilidade.php';
			include_once 'header/nav.php';
		?>
	</header>
	