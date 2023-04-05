<?php
/**
 * The template for displaying archive
 *
 * @package Supernova
 * @since Supenova 1.0.1
 * @license GPL 2.0
 */
?>

<?php get_header(); ?>
		
	<div id="content_wrapper">
    	<div id="content">
        	<section class="main_content">
		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0];?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1 class="archive_title"><?php _e('Archive for ', 'Supernova'); ?> &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1 class="archive_title"><?php _e('Posts Tagged', 'Supernova'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h1>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1 class="archive_title"><?php _e('Author Archive', 'Supernova'); ?></h1>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1 class="archive_title"><?php _e('Blog Archives', 'Supernova'); ?></h1>
			
			<?php  } else{ ?>
				<h1 class="archive_title"><?php _e('Archives', 'Supernova'); ?></h1>            
			<?php } ?>

			<?php get_template_part('includes/inc/nav'); ?>  

            <?php while (have_posts()) : the_post(); ?>        
            
                <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <h2 class="post_title" ><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="entry">               	                           
							<a href="<?php the_permalink() ?>"><?php supernova_thumbnail(); ?></a>
							<?php if(!supernova_options('full-content')){ the_excerpt();}else{the_content();} ?>
                            				<div class="clearfix"></div>
                    </div><!--entry -->
                    						
                    <div class="postmetadata">
                    <?php get_template_part('includes/meta'); ?>                                          
                    </div>
                </article>
            <?php endwhile; ?>
            <?php else : ?>
                <h2><?php _e('Not Found', 'Supernova'); ?></h2>
                
            <?php endif; ?>
            <?php supernova_pagination(); ?>
    	</section><!--main_content ENDS -->
	</div><!--content ENDS -->
	
<?php get_sidebar('page'); ?>

<div class="clearfix"></div>
<?php supernova_display_ad('abovefooter-ad') ?>
</div><!--content_wrapper ENDS -->

<?php get_footer(); ?>