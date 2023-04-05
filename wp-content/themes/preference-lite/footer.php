<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Footer Template
 *
 * @file           footer.php
 * @package        Preference Lite 
 * @author         Andre Jutras 
 * @copyright      2013 StyledThemes.com
 * @license        license.txt
 * @version        Release: 1.0
 * @since          available since Release 1.0
 */

?>	

		
				</div><!-- #content -->
				<div id="footer-wrapper" style="background-color:<?php echo get_theme_mod( 'footer_bg', '#78A5B6' ); ?>; border-color: <?php echo get_theme_mod( 'footer_topline', '#ffffff' ); ?>; color:<?php echo get_theme_mod( 'footer_text', '#ffffff' ); ?>;">
					<div class="container">
						<div class="row">						 
							<?php get_sidebar( 'footer' ); ?>							
						</div>			
					</div>
				</div>
	
			</div><!-- #content-wrapper -->
	
			<div id="page-footer-wrapper" style="color:<?php echo get_theme_mod( 'pagebottom_text', '#747474' ); ?>;" >
				<div class="container">
					<div class="row">
						<div class="span12">
							<div>
							<?php wp_nav_menu( array( 
							'theme_location' => 'footer-menu', 
							'fallback_cb' => false,
							'container' => false, 
							'menu_id' => 'st-footer-menu' 
							) ); 
							?>
							</div>
							<div><?php esc_attr_e('Copyright &copy;', 'preference'); ?> <?php esc_attr_e(date('Y')); ?> <?php echo get_theme_mod( 'site_copyright', 'Your Name' ); ?><?php esc_attr_e('. All rights reserved.', 'preference'); ?>
						</div>
					</div>
				</div>
			</div>
		</div><!-- #centered-wrapper -->

		<script type="text/javascript">
			jQuery.noConflict();
		</script>
		<?php wp_footer(); ?>
	</body>
</html>