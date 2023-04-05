<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Sidebar Template for the blog right column
 *
 * @file           sidebar.php
 * @package        Preference Lite 
 * @author         Andre Jutras 
 * @copyright      2013 StyledThemes.com
 * @license        license.txt
 * @version        Release: 1.0
 * @since          available since Release 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-blogright' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">	
			<?php dynamic_sidebar( 'sidebar-blogright' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>