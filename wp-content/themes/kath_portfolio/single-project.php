<?php
/**
 * The template for displaying all single projects.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="single-project-area">

		<?php if ( have_posts() ) : ?>

        <header class="page-header">
           
        </header><!-- .page-header -->
        <?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="single-project-title">
			 <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			</div>
			<div class="date">
			 <?php echo CFS()->get( 'date' ); ?>
			</div>
			<div class="single-project-thumbnail">
             <?php the_post_thumbnail( 'thumbnail' ); ?>
         	</div>
         	<div class="single-project-more-images">
             <?php echo wp_get_attachment_image( CFS()->get( 'more_pictures' ), array( 100, 100 ) ); ?>
         	</div>
         	<div class="single-project-more-content">
             <?php echo CFS()->get( 'strategy' ); ?>
            </div>
            <div class="single-project-feelings">
             <?php echo CFS()->get( 'feelings' ); ?>
         	</div>

              <div class="contact-button">
               
				<a href="mailto:katherine.wearing@gmail.com" class="button">Get In Touch</a>
 
              </div><!-- .entry-content -->
           </article><!-- #post-## -->

        <?php endwhile; ?>

     <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

     <?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>