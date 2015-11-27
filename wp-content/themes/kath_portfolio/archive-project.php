<?php
/**
 * The template file for archive-project.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

				<header>
					<?php
                  $terms = get_terms( 'project-type' );
                  if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
               ?>
                  <div class="project-type-blocks">
                     <?php foreach ( $terms as $term ) : ?>
                        <div class="project-type-block-wrapper">
                           <a href="<?php echo get_term_link( $term ); ?>">
                           	<h3><?php echo $term->name; ?></h3>
                           	<img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $term->slug;?>.jpg"/>
                           </a>
                        </div>
                     <?php endforeach; ?>
                  </div>
               <?php endif; ?>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

	

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>