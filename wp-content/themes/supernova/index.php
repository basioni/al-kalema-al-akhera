<?php
/**
 * The main template file which most of the time is used on the home page
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Supernova
 * @since Supenova 1.0.1
 * @license GPL 2.0
 */

 	get_header(); 
	global $supernova_options;        
        ?>

<div id="content_wrapper">
    <section id="content" class="home_content">                         
    <?php get_template_part('includes/index-slider'); ?>

                    <!--CONTENT PART STARTS-->
                    
        <?php supernova_ajax_tabs();  ?>
        <section class="main_content">            
            <?php supernova_display_ad('above-posts-ad');
            if($supernova_options['latest-blog']){ 
                echo '<h1 class="latest_blogs">'.esc_attr($supernova_options["latest-blog"]).'</h1>';
             } ?>            
                <?php echo '<img class="supernova_ajax_loader" src="'.SUPERNOVA_ROOT_ADMIN.'/images/loader.gif">'; ?>
                    <div id="main_posts">
                        <?php
                        echo '<div class="main_loop">';
                                get_template_part('loop');  
                        echo '</div>';
                        echo '<div id="poplular_posts"></div>';
                        echo '<div id="rec_posts"></div>';
                            supernova_pagination();
                            supernova_display_ad('below-posts-ad'); 
                        ?>
                    </div><!--main_posts -->            
        </section><!--main_content ENDS -->        
                    <div class="clearfix"></div>
    </section><!--content ENDS -->
    
                <!--CONTENT PART ENDS-->

<?php get_sidebar(); ?>

		<div class="clearfix"></div>
	<?php supernova_display_ad('abovefooter-ad') ?>
</div><!--content_wrapper ENDS -->

<?php get_footer(); ?>