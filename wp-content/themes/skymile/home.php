<?php
get_header();
/**
 * Slider
 */
skymileSliders::get_sliders();
/**
 * Home main heading
 */
do_action( 'skymile_before_home_mainhead' );
$default_heading = __( 'Maecenas vestibulum faucibus enim vel gravida quisq acinter consectetur', 'skymile' );
$home_mainhead = skymile_option( 'home_main_heading', $default_heading );
?>
<!--Start Main-head-->
<div class="main-head">
    <h1><?php echo esc_html( $home_mainhead ); ?></h1>
</div>
<!--End Main Head-->
<?php
do_action( 'skymile_after_home_mainhead' );

/**
 * Home feature
 */
do_action( 'skymile_before_home_feature' );

if ( skymile_option( 'home_feature_acde', false ) == true ) {
	$feature_query = new WP_Query( array(
		'posts_per_page' => skymile_option( 'feature_count', 3 ),
		'category__in' => skymile_option( 'feature_category' )
			) );
	if ( $feature_query->have_posts() ) {
		?>
		<div class="clear"></div>
		<div class="dotted"></div>
		<div class="clear"></div>
		<!--Start Featured-->
		<section class="featured-wrap">
			<div class="row frow">
				<?php
				$counter = 1;
				$last_class = '';
				while ( $feature_query->have_posts() ) {
					$feature_query->the_post();
					if ( $counter % 3 == 0 ) {
						$last_class = ' last';
					} else {
						$last_class = '';
					}
					?>   
					<div class="col-md-4 col-sm-4 col-xs-6 fcol">
						<div class="featured">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="featured-back">
									<a href="<?php echo esc_url(get_permalink()); ?>"><?php echo skymile_resize_image( 242, 145, '', true, false, 'featured-img hvr-float-shadow' ); ?></a>
								</div>
							<?php } ?>
							<section class="featured-content">
								<h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
								<p><?php the_excerpt(); ?></p>
							</section>
						</div>
					</div>                   
					<?php
					$counter++;
				}
				?>
			</div>
		</section>
		<!--End Featured-->
		<?php
	}
	wp_reset_query();
}
do_action( 'skymile_after_home_feature' );

/**
 * Home Blog section
 */
do_action( 'skymile_before_home_blog' );
?>
<div class="clear"></div>
<div class="dotted"></div>
<div class="clear"></div>
<div class="section-blog">
    <div class="row">
        <div class="col-md-8">
            <div class="content">
                <section class="recent-post">
					<?php
					if ( have_posts() ) : /* Start the Loop */
						while ( have_posts() ) : the_post();
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', 'home' );
						endwhile;
					else :
						get_template_part( 'content', 'none' );
					endif;
					/**
					 * Display post pagination
					 */
					skymile_pagination();
					?>   
                    <div class="clear"></div>
                </section>
            </div>
        </div>
        <div class="col-md-4">
			<?php
			$tabs = skymile_option( 'tabs' );
			if ( !empty( $tabs ) ) {
				?>
				<div class="tabbed">                            
					<header>
						<ul id="tabs">
							<?php foreach ( $tabs as $key => $tab ) { ?>
								<li><a href="#" title="tab<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $tab['title'] ); ?></a></li>   
							<?php } ?>
						</ul>
						<div class="clear"></div>
					</header>
					<div class="clear"></div>
					<div id="content">
						<?php foreach ( $tabs as $key => $tab ) { ?>
							<div id="tab<?php echo esc_attr( $key ); ?>">
								<p><?php echo esc_html( $tab['description'] ); ?></p>
							</div>
						<?php } ?>
					</div>
					<div class="clear"></div>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<?php
			$is_testimonial = skymile_option( 'testimonial_acde', 'off' );
			if ( $is_testimonial == 'on' ) {
				$image = skymile_resize_image( 60, 57, skymile_option( 'testimonial_avatar' ) );
				?>
				<section class="testimonial-wrap">
					<h3 class="testimonial-heading"><?php echo esc_html( skymile_option( 'testimonial_heading' ) ); ?></h3>
					<div class="testimonials">
						<?php echo $image; ?>
						<div class="testimonial-content">
							<h4 class="testimonial-title"><?php echo esc_html( skymile_option( 'testimonial_title' ) ); ?></h4>
							<span><?php echo esc_html( skymile_option( 'testimonial_description' ) ); ?></span>
						</div>
					</div>
				</section>
			<?php } ?>
            <div id="sidebar">
				<?php
				if ( is_active_sidebar( 'home-widget-area' ) ) {
					dynamic_sidebar( 'home-widget-area' );
				}
				?>
				<?php
				if ( is_active_sidebar( 'primary-widget-area' ) ) {
					dynamic_sidebar( 'primary-widget-area' );
				}
				?>
            </div>                
        </div>
    </div>
</div>
<?php
do_action( 'skymile_after_home_blog' );

/**
 * Home tagline
 */
do_action( 'skymile_before_home_tagline' );
?>
<div class="clear"></div>
<div class="doubled"></div>
<div class="tagline">
	<?php
	$home_tagline_heading = skymile_option( 'home_tag_line_heading' );
	$home_tagline_heading_des = skymile_option( 'home_tag_line_desc' );
	$tagline_button = skymile_option( 'tagline_button_text' );
	$tagline_button_link = skymile_option( 'tagline_button_link' );

	if ( $home_tagline_heading != '' ) {
		?>
		<h3><span class="tagline-text"><?php echo esc_html( $home_tagline_heading ); ?></span><a href="<?php echo esc_url( $tagline_button_link ); ?>" class="tabline-btn animated"><?php echo esc_html( $tagline_button ); ?></a></h3>
	<?php } ?>
	<?php if ( $home_tagline_heading_des != '' ) { ?>
	    <p><?php echo esc_html( $home_tagline_heading_des ); ?></p>
	<?php } ?>
</div>
<div style="margin-bottom: 50px;" class="doubled"></div>
<?php
do_action( 'skymile_after_home_tagline' );
get_footer();
