<?php
/**
 * Template for displaying page with slider
 *
 * @package Supernova
 * @since Supenova 1.1.0
 * @license GPL 2.0
 *
 * Template Name: Slider Page
 */
?>

<?php get_header(); ?>
<div id="content_wrapper">
    <div class="slider_page" id="content">
    
                	<?php get_template_part('includes/index', 'slider'); ?> 

            			<div class="clearfix"></div>
        <section class="main_content">        
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="post" id="post-<?php the_ID(); ?>">
                        <h2 class="post_title page_title"><?php the_title(); ?></h2>
                            <div class="entry">
                            	<span class="supernova_thumb"><?php if(has_post_thumbnail()){the_post_thumbnail();} ?></span>
                                <?php the_content(); ?>
                                <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
                            </div><!--entry -->
                            <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
                    </div><!--post -->
                     <?php comments_template(); ?> 
			<?php endwhile; endif; ?>
        </section><!--main_content -->
    </div><!--content ENDS -->
    
<?php get_sidebar('page'); ?>

<div class="clearfix"></div>
<?php supernova_display_ad('abovefooter-ad') ?>
</div><!--content_wrapper ENDS -->

<?php get_footer(); ?>