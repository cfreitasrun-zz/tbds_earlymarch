<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
		<?php
		wp_head();
		?>
    </head>
    <body <?php body_class(); ?>>
        <div id="main_container">
            <div class="container">
                <!--Start Grid 24-->
                <div class="row">
                    <div class="col-md-12">
                        <!--Start Main-->
                        <div id="main">
                            <header id="header">
                                <div class="logo-wrap">
									<?php
									if ( !has_custom_logo() ) :
										?>
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<?php
										$description = get_bloginfo( 'description', 'display' );
										if ( $description || is_customize_preview() ) :
											?>
											<p class="site-description"><?php echo esc_html( $description ); ?></p>
											<?php
										endif;
									else:
										?>
										<?php skymile_the_custom_logo(); ?>
									<?php endif; ?>
                                </div>
								<?php
								$contact_address = skymile_option( 'contact_address' );
								$contact_number = skymile_option( 'contact_number' );
								if ( $contact_address != '' || $contact_number != '' ) {
									?>
									<div class="top-address">
										<address>
											<?php
											echo '<span class="highlight">Email</span> : ' . esc_html( $contact_address ) . ' ' . '<span class="highlight">| Call</span> :' . esc_html( $contact_number );
											?>
										</address>
										<div class="tap-call">
											<a class="tap-tocall" href="tel:<?php echo esc_attr( $contact_number ); ?>"><span class="glyphicon glyphicon-earphone"></span>&nbsp;<?php echo esc_html( $contact_number ); ?></a>
										</div>
									</div>
								<?php } ?>
                                <div class="clear"></div>
                                <!--Start Menu Wrapper-->
                                <menu class="menu-wrapper">
									<?php skymile_nav(); ?>
                                    <div class="clear"></div>
                                </menu>
                                <!--End Menu Wrapper-->
                            </header>
                            <div class="clear"></div>