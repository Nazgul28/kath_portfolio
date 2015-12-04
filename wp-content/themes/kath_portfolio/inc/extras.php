<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

/**
 * Customize the logo WP login page.
 */
function kath_portfolio_login_logo() {
	echo '<style>
		#login h1 a {
			background: url(' . get_template_directory_uri() . '/images/logo.png) no-repeat !important;
			background-size: 300px 62px !important; width: 300px !important; height: 62px !important;
		}
	</style>';
}
add_action( 'login_head', 'kath_portfolio_login_logo' );

/**
 * Customize the URL the logo points to WP login page.
 *
 * @param  string $url The URL the logo image link points to.
 * @return string
 */
function kath_portfolio_login_logo_url( $url ) {
    return home_url();
}
add_filter( 'login_headerurl', 'kath_portfolio_login_logo_url' );

/**
 * Customize the title attribute for the login logo link.
 *
 * @return string
 */
function kath_portfolio_login_title() {
	return 'Kath Portfolio';
}
add_filter( 'login_headertitle', 'kath_portfolio_login_title' );

/**
 * Get an array of the latest posts by post type.
 *
 * @param  string $post_type The post type slug.
 * @param  int    $num_posts The number of posts to show.
 * @return array             List of post objects.
 */
function kath_portfolio_get_latest_posts( $post_type, $num_posts ) {
	$args = array(
      'post_type' => $post_type,
      'numberposts' => $num_posts
   );

   $latest_posts = get_posts( $args );
   return $latest_posts;
}

/**
 * Customize excerpt length and style.
 *
 * @param  string The raw post content.
 * @return string
 */
function kath_portfolio_wp_trim_excerpt( $text ) {
	$raw_excerpt = $text;

	if ( '' == $text ) {
		// retrieve the post content
		$text = get_the_content('');

		// delete all shortcode tags from the content
		$text = strip_shortcodes( $text );

		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]&gt;', $text );

		// indicate allowable tags
		$allowed_tags = '<p>,<a>,<em>,<strong>,<blockquote>,<cite>';
		$text = strip_tags( $text, $allowed_tags );

		// change to desired word count
		$excerpt_word_count = 50;
		$excerpt_length = apply_filters( 'excerpt_length', $excerpt_word_count );

		// create a custom "more" link
		$excerpt_end = '<span>[...]</span><p><a href="' . get_permalink() . '" class="read-more">Read more &rarr;</a></p>'; // modify excerpt ending
		$excerpt_more = apply_filters( 'excerpt_more', ' ' . $excerpt_end );

		// add the elipsis and link to the end if the word count is longer than the excerpt
		$words = preg_split( "/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY );

		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			$text = implode( ' ', $words );
			$text = $text . $excerpt_more;
		} else {
			$text = implode( ' ', $words );
		}
	}
	return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'kath_portfolio_wp_trim_excerpt' );

/**
 * Restrict HTML tags in comment text.
 */
function kath_portfolio_filter_comment_text( $content ) {
	$comment_text = wp_kses(
		$content,
		array(
			'p' => array(),
		)
	);

	return $comment_text;
}
add_filter( 'comment_text', 'kath_portfolio_filter_comment_text', 99 );

/**
 * Customize the Product archive title.
 */

function kath_portfolio_archive_title ($title){
	if (is_tax('project-type')){
		$title= sprintf('%1$s', single_term_title ( '', false)); 
	}
	return $title;
}

add_filter ('get_the_archive_title', 'kath_portfolio_archive_title');

/**
 * Filter the Product post type archive.
 */
 function kath_portfolio_modify_archive_queries( $query ) {
	if ( is_post_type_archive( array( 'project' ) ) && !is_admin() && $query->is_main_query() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
		$query->set( 'posts_per_page', 12 );
	} elseif ( $query->is_tax( 'project-type' ) && !is_admin() && $query->is_main_query() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	} elseif ( is_post_type_archive( array( 'testimonial' ) ) && !is_admin() && $query->is_main_query() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	}
 }
 add_action( 'pre_get_posts', 'kath_portfolio_modify_archive_queries' );

/**
 * Redirect single testimonial URLs to the testimonials archive page.
 */
function kath_portfolio_redirect_single_testmonials() {
	$queried_post_type = get_query_var( 'post_type' );

	if ( is_single() && 'testimonial' ==  $queried_post_type ) {
		wp_redirect( get_post_type_archive_link( 'testimonial' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'kath_portfolio_redirect_single_testmonials' );
