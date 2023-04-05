<?php
/**
 * The template for displaying search forms in Supernova
 *
 * @package Supernova
 * @since Supenova 1.0.4
 * @license GPL 2.0
 */
?>

<form action="<?php echo esc_url(home_url( '/' )); ?>" id="searchform" method="get">
    <div>
        <input type="text" placeholder="<?php _e('Search...', 'Supernova'); ?>" id="supernova_search" name="s" class="search_input supernova-input" value="" />        
        <input type="submit" value="" id="searchsubmit" />
    </div>
</form>