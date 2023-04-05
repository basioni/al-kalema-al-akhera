<?php
/**
 * Template for displaying footer credits and navigation 
 *
 * @package Supernova
 * @since Supenova 1.0.1
 * @license GPL 2.0
 */
?>

<?php global $supernova_options, $supernova_theme_uri; ?>
<span class="copyright"><?php if(trim($supernova_options['footer-text'])==''){ ?>&nbsp;<?php echo supernova_copyright_custom_date(); bloginfo('name'); ?><?php }else{echo '&nbsp;'.esc_html($supernova_options['footer-text']);} ?></span>
<?php if(has_nav_menu('Footer_Nav')){wp_nav_menu( array('theme_location'=>'Footer_Nav', 'menu'=>'Footer Navigation', 'menu_class' => 'footer_nav' ));} ?>
<span class="credits"><a href="<?php echo $supernova_theme_uri; ?>" title="<?php _e('Visit', 'Supernova') ?> supernovathemes.com" target="_blank">Supernova Themes</a></span>