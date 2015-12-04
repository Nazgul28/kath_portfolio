<?php
/**
 * The template for displaying "project type" archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="project-menu">
    			<?php /* Start the Loop */ ?>
    			<?php while ( have_posts() ) : the_post(); ?>
    			<?php the_title( sprintf( '<h2 class="entry-title-menu"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
               <div class="project-menu-item">
                  <?php if ( has_post_thumbnail() ) : ?>
                  <div class="project-thumbnail">
                     <?php the_post_thumbnail( 'thumbnail' ); ?>
                  </div>
                  <?php endif; ?>

                  <div class="project-info">
                     <?php the_content(); ?>
                  </div>
               </div>

			<?php endwhile; ?>
			<?php the_posts_navigation();?>
		<?php else: ?>


			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
