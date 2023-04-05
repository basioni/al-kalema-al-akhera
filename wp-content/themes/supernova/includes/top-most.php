<?php
/**
 * Template for displaying top navigation in each page
 *
 * @package Supernova
 * @since Supenova 1.0.1
 * @license GPL 2.0
 */
?>

<div id="media_nav">
	<div class="media_left" title="Browser Menu"></div>
    <div class="media_search"><?php get_search_form(); ?></div>
    <div class="media_right" title="Browser Menu"></div>
    <div class="clearfix"></div>
</div>

<?php global $supernova_options; ?>
<?php if(!supernova_options('disable-top-nav')){ ?>
<div id="header_navigation">
    <div id="top_most">
        <div class="header_nav">
        <?php if(has_nav_menu('Header_Nav')){wp_nav_menu( array('theme_location'=>'Header_Nav', 'menu'=>'Header Navigation', 'menu_id'=>'top_nav')); } ?>
        	<span class="media_left_close" title="close"></span>
        </div><!--header_nav -->
        
        <?php if(!supernova_options('disable-categories')){ ?>    
        <div class="category">
            <li class="categories">
            <span class="first_cat"><?php _e('Categories', 'Supernova') ?></span>
        <?php if(has_nav_menu('Header_Cat')){ wp_nav_menu( array('theme_location'=>'Header_Cat', 'menu'=>'Header Categories'));}?>
            </li>
        </div>
        <?php } ?>
        <?php if(!supernova_options('disable-top-search')){ ?>
        <div class="top_search">
            <div class="top_search_icon"></div>
            <div class="top_search_box"><?php get_search_form(); ?></div>
        </div>
        <?php } ?>
            <div class="clearfix"></div>
    </div><!--top_most --> 
</div><!--Header_navigation -->
<?php } 