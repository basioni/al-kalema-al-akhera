<?php
/**
 * Template for displaying all single posts
 *
 * @package Supernova
 * @since Supenova 1.0.8
 * @license GPL 2.0
 */
?>

<?php get_header(); ?>

<div id="content_wrapper">
	<section id="content">
    	<section class="single_entry main_content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <h2 class="single_heading post_title"><?php the_title(); ?></h2>
					<?php get_template_part('includes/before', 'post'); ?>
                   <div class="entry" id="entry">
                   	<span class="supernova_thumb"><?php if(has_post_thumbnail()){the_post_thumbnail();} ?></span>
                    <?php the_content(); ?>
                   	 <span class="page_links"><?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?></span>
                   </div>                                   
                <?php edit_post_link(__('Edit this entry', 'Supernova'),'','.'); ?>                
            </article>             	
				<?php get_template_part('includes/after', 'post'); ?>
        <?php comments_template();  supernova_count_post_views(get_the_ID());
	         endwhile; endif; ?>
        	</section><!--main_content ENDS -->
		</section><!--content ENDS -->        
    
<?php get_sidebar('page'); ?>
<div class="clearfix"></div>
<?php supernova_display_ad('abovefooter-ad') ?>
</div><!--content_wrapper ENDS -->
		
<?php get_footer(); ?>