<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Custom page template with a right sidebar
 *
   Template Name: Page Template - Right Sidebar
 *
 * @file           single.php
 * @package        Preference Lite 
 * @author         Andre Jutras 
 * @copyright      2013 StyledThemes.com
 * @license        license.txt
 * @version        Release: 1.0
 * @since          available since Release 1.0
 */
get_header(); ?>

	<!-- Main Content -->			
		<div class="container">
			<div class="row">
				<div id="component" class="site-content span8" role="main">

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
						<?php //comments_template( '', true ); ?>
					<?php endwhile; // end of the loop. ?>

				</div><!-- #component -->
					
				<aside id="right-column" class="span4">
					<?php get_sidebar( 'pageright' ); ?>
				</aside>
				
			</div>
		</div>
<?php get_footer(); ?>