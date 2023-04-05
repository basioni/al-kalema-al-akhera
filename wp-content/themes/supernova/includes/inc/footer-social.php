<?php
/**
 * Template for displaying social icons in the footer right side
 *
 * @package Supernova
 * @since Supenova 1.0.1
 * @license GPL 2.0
 */
?>

<?php global $supernova_options; ?>
<ul>
	<?php if(trim($supernova_options['facebook-link'])){ ?>
    <a href="<?php echo esc_url($supernova_options['facebook-link']); ?>" target="_blank"><li class="facebook_b" title="Facebook"></li></a>
    <?php } ?>
    
	<?php if(trim($supernova_options['twitter-link'])){ ?>    
    <a href="<?php echo esc_url($supernova_options['twitter-link']); ?>" target="_blank"><li class="twitter_b" title="Twitter"></li></a>
        <?php } ?>    
        
	<?php if(trim($supernova_options['google-link'])){ ?>    
    <a href="<?php echo esc_url($supernova_options['google-link']); ?>" target="_blank"><li class="google_b" title="Google +1"></li></a>
	    <?php } ?>

	<?php if(trim($supernova_options['rss-link'])){ ?>    
    <a href="<?php echo esc_url($supernova_options['rss-link']); ?>" target="_blank"><li class="rss_b" title="RSS"></li></a>
       <?php } ?>
       
	<?php if(trim($supernova_options['youtube-link'])){ ?>    
    <a href="<?php echo esc_url($supernova_options['youtube-link']); ?>" target="_blank"><li class="youtube_b" title="YouTube"></li></a>
       <?php } ?>                     
</ul>
