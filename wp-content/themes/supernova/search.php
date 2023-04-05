<?php
/**
 * Template for displaying search results
 *
 * @package Supernova
 * @since Supenova 1.0.1
 * @license GPL 2.0
 */
?>

<?php get_header(); ?>

<div id="content_wrapper">
	<section id="content">    		
        <section class="main_content">	
        <?php $user_term= $_GET['s']; ?>
        	<h1 class="latest_blogs"><?php _e('Search Results for ', 'Supernova'); echo '"'.$user_term.'"'; ?></h1>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>        
            
                <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                	<div class="post_heading">
                    <h2 class="post_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    </div><!--post_heading -->
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
            	<br />
                <h3><?php _e('We are sorry, we did not find any match for ', 'Supernova'); echo '"'.$user_term.'"'; ?></h3>                
            <?php endif; ?>
            <?php supernova_pagination(); ?>
        </section><!--main_content ENDS -->
        	<div class="clearfix"></div>                                   
	</section><!--content ENDS -->
    
<?php get_sidebar(); ?>

<div class="clearfix"></div>
<?php supernova_display_ad('abovefooter-ad') ?>
</div><!--content_wrapper ENDS -->


<?php get_footer(); ?>