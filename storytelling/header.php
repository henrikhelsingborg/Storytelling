<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link href='http://fonts.googleapis.com/css?family=Roboto:700,400' rel='stylesheet' type='text/css'>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( ' |', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php omega_attr( 'body' ); ?>>
	<div class="rss-link">
		<a href="/?feed=rss" title="Prenumerera på rss-flöde"><img src="/wp-content/themes/storytelling/images/feed-icon-28x28.png" alt="Rss-flöde"> RSS</a>
	</div>
<?php do_action( 'omega_before' ); ?>

<div class="<?php echo omega_apply_atomic( 'site_container_class', 'site-container' );?>">

	<?php
	do_action( 'omega_before_header' );
	do_action( 'omega_header' );
	do_action( 'omega_after_header' );
	?>

	<div class="site-inner">

		<?php do_action( 'omega_before_main' ); ?>
