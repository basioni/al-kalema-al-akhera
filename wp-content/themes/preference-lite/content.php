<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Content Template
 *
 * @file           content.php
 * @package        Preference Lite 
 * @author         Andre Jutras 
 * @copyright      2013 StyledThemes.com
 * @license        license.txt
 * @version        Release: 1.0
 * @since          available since Release 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured', 'preference' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php //the_post_thumbnail(); ?>
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="intro-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'preference' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			
			<div class="gj-article-details clearfix">
				<dl class="article-info"><dd class="meta-date"><?php _e( 'Date: ', 'preference' ); ?><?php the_time('F j, Y') ?></dd><dd class="meta-author"><?php _e( 'Author: ', 'preference' ); ?><?php the_author(); ?></dd><dd class="meta-categories"><?php _e( 'Categories: ', 'preference' ); ?><?php the_category(', ') ?></dd><?php if ( comments_open() ) : ?><dd class="meta-comments"><?php _e( 'Comments: ', 'preference' ); ?><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'preference' ) . '</span>', __( '1 Reply', 'preference' ), __( '% Replies', 'preference' ) ); ?></dd><?php endif; // comments_open() ?><?php edit_post_link( __( 'Edit', 'preference' ), '<dd class="edit-link">', '</dd>' ); ?></dl>
			</div>
			
			<?php endif; // is_single() ?>
		</header><!-- .entry-header -->

		
		
		
			<div class="entry-content">	
			
			
				<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>
			
							<div class="row-fluid">
								<div class="img-intro span4"><?php the_post_thumbnail(); ?></div>									
								<div class="span8">								
									<?php the_content( __( ' Read More...', 'preference' ) ); ?>
									<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'preference' ), 'after' => '</div>' ) ); ?>
								</div>
							</div>
											
				<?php else : // if the default large image is used then use this layout ?>
								
							<div class="row-fluid">
								<div class="span12">								
									<?php the_content( __( ' Read More...', 'preference' ) ); ?>
									<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'preference' ), 'after' => '</div>' ) ); ?>
								</div>
							</div>
						
				<?php endif; ?>	
			</div><!-- .entry-content -->	
		

		<footer></footer>
	</article><!-- #post -->
<div class="gj-item-separator"></div>