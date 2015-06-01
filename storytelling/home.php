<?php
/**
 * The home page file.
 *
 * @package Omega
 */

function magazine_get_featured_posts() {
    $sticky = get_option( 'sticky_posts' );

    if ( empty( $sticky ) )
        return new WP_Query();

    $args = array(
        'post__in' => $sticky,
    );

    return new WP_Query( $args );
}

get_header(); ?>
<a href="/?feed=rss" title="Prenumerera på rss-flöde" class="rss-link"><img src="/wp-content/themes/storytelling/images/feed-icon-28x28.png" alt="Rss-flöde"> Prenumerera på RSS</a>


	<main class="<?php echo omega_apply_atomic( 'main_class', 'content' );?>" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

		<?php
		do_atomic( 'before_content' ); // omega_before_content
    if(!is_paged()) :
			$featured_posts = magazine_get_featured_posts();
			if ( $featured_posts->have_posts() ) :
				echo '<div id="carousel-example-generic" class="carousel slide entry">';
				$indicator ='<!-- Indicators -->
					  <ol class="carousel-indicators">';
				$slide = '<!-- Wrapper for slides -->
							  <div class="carousel-inner">';
				$counter = 0;
				while ( $featured_posts->have_posts() ) {
				    $featured_posts->the_post();

				    $indicator .='<li data-target="#carousel-example-generic" data-slide-to="'.$counter.'" class="'. ($counter == 0 ? 'active' : '') .'"></li>';
					$slide .='<div class="item '. ($counter == 0 ? 'active' : '') . '">
							      '. get_the_post_thumbnail( get_the_id(), 'sticky' ) .'
							      <div class="carousel-caption transparent">
							        <h4 class="notransparent"><a class="notransparent" href="'.get_permalink().'">'. get_the_title() .'</a></h4>
							      </div>
							    </div>';

				    $counter++;
				}

				//echo $indicator.'</ol>';
				echo $slide.'</div>';
				echo '<!-- Controls -->
					  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					    <span class="icon-prev"></span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					    <span class="icon-next"></span>
					  </a>';
				echo '</div>';

			endif;

		wp_reset_postdata();
		endif;

		if ( have_posts() ) :
			echo "<div class='mymasonry row'>";
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//get_template_part( 'partials/content' );
			?>
				<article id="post-<?php the_ID(); ?>" class="col-xs-12 col-sm-6 grid" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

					<div class="entry-wrap">

						<header class="entry-header">

							<div class="entry-meta">
								<time <?php omega_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
								<span <?php omega_attr( 'entry-author' ); ?>><?php echo __('by ', 'magazine'); the_author_posts_link(); ?></span>
								<?php echo omega_post_comments( ); ?>
								<?php edit_post_link( __('Edit', 'magazine'), ' | ' ); ?>
							</div><!-- .entry-meta -->

						</header>
						<div class="entry-content">

							<?php
							if ( is_home() ) {
								if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail(); ?>
                  <h4 class="entry-title" itemprop="headline"><?php the_title(); ?></h4>
									<!--</a> -->
								<?php endif;

								if ( omega_get_setting( 'content_archive_limit' ) )
									the_content_limit( (int) omega_get_setting( 'content_archive_limit' ), omega_get_setting( 'content_archive_more' ) );
								else
									the_excerpt();

							}
							?></a>

						</div><!-- .entry-content -->

						<?php do_atomic( 'after_entry' ); // omega_after_entry ?>

					</div><!-- .entry-wrap -->

				</article><!-- #post-## -->
			<?php
			endwhile;

			echo "</div>";
			omega_content_nav( 'nav-below' );

		else :

			get_template_part( 'partials/no-results', 'index' );

		endif;

		do_atomic( 'after_content' ); // omega_after_content
		?>

	</main><!-- .content -->

<?php get_footer(); ?>
