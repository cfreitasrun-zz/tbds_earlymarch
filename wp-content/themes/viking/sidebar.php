<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package viking
 */

?>
<?php
if ( is_active_sidebar( 'sidebar-1' ) ) {
?>
	<div id="secondary" class="widget-area" role="complementary">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Sidebar', 'viking' )?></h2>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->
<?php
}
