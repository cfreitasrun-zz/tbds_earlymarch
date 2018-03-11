<?php
/**
 * Custom template tags for this theme.
 *
 * @package viking
 */

if ( ! function_exists( 'viking_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function viking_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		printf(__( 'Posted on %3$s <span class="byline">by <span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%6$s.</a></span></span> ', 'viking' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			$time_string,
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'viking' ), get_the_author() ) ),
			get_the_author()
		);

		if ( count( get_the_category() ) ) {
			printf( __( 'Category: %1s', 'viking' ), get_the_category_list( ', ' ) );
			echo '. ';
		}

		if ( get_the_tag_list() ) {
			$viking_tags_list = get_the_tag_list( '', ', ' );
			printf( __( 'Tagged: %1$s', 'viking' ), $viking_tags_list );
			echo '. ';
		}
	}
endif;
