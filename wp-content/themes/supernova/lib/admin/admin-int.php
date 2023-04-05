<?php 
/*
* The main layout of the admin options page, all the pages are called only from here
 * @package Supernova
 * @since Supenova 1.0.1
* 
*/

global $supernova_fonts, $supernova_slide_effect;
include SUPERNOVA_ADMIN.'page-setup.php';
 ?>
<div id="supernova_options_page">	
	<?php supernova_version_notice(); ?>
    <div class="supernova_tabs">
            <ul>
                <li id="tab_one"><i class="general"></i><span><?php _e('General', 'Supernova'); ?></span></li>
                <li id="tab_two"><i class="layout"></i><span><?php _e('Layout', 'Supernova') ?></span></li>
                <li id="tab_three"><i class="styling"></i><span><?php _e('Styling', 'Supernova'); ?></span></li>
                <li id="tab_four"><i class="slider"></i><span><?php _e('Slider', 'Supernova'); ?></span></li>
                <li id="tab_five"><i class="social"></i><span><?php _e('Social', 'Supernova'); ?></span></li>
                <li id="tab_six"><i class="footer"></i><span><?php _e('Advanced', 'Supernova'); ?></span></li>
                <li id="tab_eight"><i class="ad"></i><span><?php _e('Manage Ads', 'Supernova'); ?></span></li>
                <li id="tab_seven"><i class="support"></i><span><?php _e('Support', 'Supernova'); ?></span></li>                
            </ul>
        </div><!--supernova_tabs END -->        
    <div id="menu_right">    	
        <div id="one" class="tab_content">	
			<?php supernova_admin_page_setup('General', 200); ?>
        </div>            
        <div id="two" class="tab_content">
			<?php supernova_admin_page_setup('Layout', 150 , 1); ?>			
        </div>            
        <div id="three" class="tab_content">
			<?php supernova_admin_page_setup('Styling', 150 , 4, $supernova_fonts); ?>	
        </div>               
        <div id="four" class="tab_content">
			<?php supernova_admin_page_setup('Slider Posts', 120 , false, $supernova_slide_effect); ?>				
        </div>
        <div id="five" class="tab_content">
			<?php supernova_admin_page_setup('Social Profiles', 200); ?>
        </div>
         <div id="six" class="tab_content">
            <?php supernova_admin_page_setup('Advanced', 250); ?>
        </div>
        <div id="seven" class="tab_content">
            <?php include SUPERNOVA_ADMIN.'support.php'; ?>
        </div>
        <div id="eight" class="tab_content">
			<?php supernova_admin_page_setup('Ad Spots', 140); ?>
        </div>        
    </div><!--menu_right ENDS -->
</div><!--supernova_options_page ENDS -->

<noscript>
<style>
	#supernova_options_page{
		display:block; /*To accomodate people who have javascript disabled*/
	}
</style>
</noscript>

<span class="loader"></span>
<span class="saving_settings"></span>
<?php 	if( isset($_GET['settings-updated']) ) {
            echo '<span class="supernova_saved"></span>';}