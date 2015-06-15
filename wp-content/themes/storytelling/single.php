<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Omega
 */
remove_action( 'omega_after_main', 'omega_primary_sidebar' );

//get_header(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( ' |', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<!--	<main class="<?php echo omega_apply_atomic( 'main_class', 'content' );?>" <?php omega_attr( 'content' ); ?>> -->
<main class="post-content" itemtype="http://schema.org/Blog" itemscope="itemscope" role="main">
	<a href="/" class="post-home-link" title="Till startsidan">&lt; Till startsidan</a>
	<div class="hbgredlogo"><img src="/wp-content/themes/storytelling/images/hbg_vapen.png" alt=""/></div>
		<div class="storyimage">
				<?php
			if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} ?>
		</div>

		<!-- Added social media -->
		<ul class="socialmedia-list">
			<li class="fbook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>"><img src="/wp-content/themes/storytelling/images/facebook.png" alt="Facebook"/></a></li>
			<li></li>
			<li class="twitter"><a href="http://twitter.com/share?url=<?php echo urlencode(wp_get_shortlink()); ?>"><img src="/wp-content/themes/storytelling/images/twitter.png" alt="Twitter"/></a></li>
		</ul>


		<!-- Added left sidebar -->
		<div id="left-widget-area" class="widget-area" role="complementary">
			<?php if ( !function_exists('dynamic_sidebar') ||
			!dynamic_sidebar('Left Widget') ) : ?>
			<?php endif; ?>
		</div>
		<!-- END -->

		<?php
		do_action( 'omega_before_content' );
		do_action( 'omega_content' );
		do_action( 'omega_after_content' );
		?>

	</main><!-- .content -->

<?php get_footer(); ?>
