<?php
/**
 * The template for displaying home page.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">



		<div class="hero">
		<span class="herotext"><p>Katherine is a UX designer supported by a background in visual and graphic design.
Motivated by innovation when it directly relates to an improved human experience, with digital products & brand development.</p>
		<a href="<?php echo home_url('/#about'); ?>" class="button"> What I do </a>
		</span>
		</div>
		


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>