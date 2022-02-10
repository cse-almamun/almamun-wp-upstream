<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Botiga
 */

get_header();
?>

	<main id="primary" class="site-main <?php echo esc_attr( apply_filters( 'botiga_content_class', '' ) ); ?>">
		<?php
		if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'botiga' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="posts-archive <?php echo esc_attr( apply_filters( 'botiga_blog_layout_class', 'layout3' ) ); ?>" <?php botiga_masonry_data(); ?>>
				<div class="row">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'post' );

				endwhile; ?>
				</div>
			</div>
		<?php
		the_posts_pagination( array(
			'mid_size'  => 1,
			'prev_text' => '&lt;',
			'next_text' => '&gt;',
		) );

		do_action( 'botiga_after_the_posts_pagination' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</main><!-- #main -->

<?php
do_action( 'botiga_do_sidebar' );
get_footer();
