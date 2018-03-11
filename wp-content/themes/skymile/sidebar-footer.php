<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="footer-widget">
			<?php
			if ( is_active_sidebar( 'first-footer-widget-area' ) ) {
				dynamic_sidebar( 'first-footer-widget-area' );
			}
			?>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 ">
        <div class="footer-widget">
			<?php
			if ( is_active_sidebar( 'second-footer-widget-area' ) ) {
				dynamic_sidebar( 'second-footer-widget-area' );
			}
			?>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="footer-widget">
			<?php
			if ( is_active_sidebar( 'third-footer-widget-area' ) ) {
				dynamic_sidebar( 'third-footer-widget-area' );
			}
			?>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="footer-widget">
			<?php
			if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) {
				dynamic_sidebar( 'fourth-footer-widget-area' );
			}
			?>
        </div>
    </div>
</div>