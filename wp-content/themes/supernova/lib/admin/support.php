<?php
/*
* Page for Help tab in options page
* @package Supernova
* @since Supenova 1.1
*/
global $supernova_theme_uri;  ?>
<div class="sayed">


<div id="sup_support">
	<div id="sup_logo"><a href="<?php echo $supernova_theme_uri; ?>" target="_blank"><img src="<?php echo SUPERNOVA_ROOT_ADMIN; ?>images/logo.png"></a></div><br />
    <div id="sup_info">
    	<h2><i><?php _e('Thank you for using Supernova theme!', 'Supernova') ?></i></h2>
        <p><?php _e('Designed & Developed By:', 'Supernova'); ?> <a style="text-decoration:none; font-size:14px;" href="<?php echo $supernova_theme_uri; ?>" target="_blank">Sayed Taqui</a></p>
		<iframe width="580" height="325" src="//www.youtube.com/embed/fDEICdjz41w" frameborder="0" allowfullscreen></iframe>
        <p class="sup_wp_url"><?php _e('If you have any suggestion, question or issues related to the theme, feel free to ask on WordPress', 'Supernova'); ?> <a href="http://wordpress.org/support/forum" target="_blank"><?php _e('support', 'Supernova'); ?></a> <?php _e('forum, or contact me directly.', 'Supernova'); ?></p>
        <p class="sup_wp_url"><?php _e('If you like this theme please rate it on WordPress', 'Supernova'); ?> <a href="http://wordpress.org/support/view/theme-reviews/supernova" target="_blank"><?php _e('theme reviews', 'Supernova'); ?></a> <?php _e('page', 'Supernova'); ?></p>
        <p class="sup_wp_url"><?php _e('View Theme', 'Supernova'); ?><a href='http://supernovathemes.com/supernova/' target="_blank"><?php _e(' Demo', 'Supernova'); ?></a></p>  
</div><!--sup_info -->
</div>

<div class="clearfix"></div>
<div class="documentation">
	<h3><?php _e('Compatibility:', 'Supernova'); ?></h3>
    <p><?php _e('This theme works best on the latest version of wordpress, so if you are running an older version please dont forget to update.', 'Supernova'); ?></p>
	<h3><?php _e('Getting Started:', 'Supernova'); ?></h3>
    <p><?php _e(' All features of this theme have been kept on, so you dont have hard time understanding them and you can remove the ones you dont want, however there are couple of things you would want to know on the first use of this theme. ', 'Supernova'); ?></p>    
    <p><strong><?php _e('Navigation:', 'Supernova'); ?></strong><?php _e(' Your theme supports four navigations, Header Navigation, Header Categories, Main Navigation and Footer Navigation, when you activate this theme, the menu items may not appear since they are not saved, so please go to Appearance>Menus and save each navigation menu', 'Supernova'); ?></p>
	<p><strong><?php _e('Sidebar:', 'Supernova'); ?></strong><?php _e(' Supernova has two sidebars, "Sidebar Home" would only show on the home page and "Sidebar Page" would show on all pages except home." ', 'Supernova'); ?></p>
        <p><strong><?php _e('Recommended Posts:', 'Supernova'); ?><sup>new</sup></strong><?php _e(' Recommended posts can chosen be from where you create or edit posts, at the bottom of the sidebar." ', 'Supernova'); ?></p>
	<p><strong><?php _e('Plugin:', 'Supernova'); ?></strong><?php _e(' Though the theme loads fast however its highly recommended to use \'WP TOTAL CACHE\' plugin to decrease the page load time even more.', 'Supernova'); ?></p>
	<p><strong><?php _e('Pagination:', 'Supernova'); ?></strong><?php _e(' The theme already has pagination however if you need to use a plugin, turn off pagination from advanced tab first, likewise turn off back-to-top feature.', 'Supernova'); ?></p>
	<p><strong><?php _e('Author Info Box:', 'Supernova'); ?></strong><?php _e(' Author info box information can be filled from user profile.', 'Supernova'); ?></p>
	<p><strong><?php _e('Uploding Logo:', 'Supernova'); ?></strong><?php _e('Logo can be used from Appearance>Header.', 'Supernova'); ?></p>    

    <h3><?php _e('What\'s new in this version(1.4.0)?', 'Supernova'); ?></h3>
        <p><?php _e('Fixed recommended posts and ajax loader issues for people using older version of jQuery, also fixed navigation bar issue in smaller screen(version 1.4.1)., added option to change "recommended text" in advanced tab, so you can make it anything you want like Editor\'s Picks or name it any of your popluar category. (I m also going to add one more tab for popular category in the future version.) ' , 'Supernova'); ?><sup style="font-size:11px">new</sup></p>
    <p><?php _e('Fixed issues and bugs.', 'Supernova'); ?></p>     
    <p><?php _e('Added recommended posts tab. ', 'Supernova'); ?></p>
    <p><?php _e('Ajax Post Loader: Now you can show all your posts without affecting the page load time at all, and of course you can remove both of these options from "Advanced tab"', 'Supernova'); ?></p>
    
    	<h3><?php _e('Having Problem?:', 'Supernova'); ?></h3>
	<p><?php _e('If something goes wrong or stops working all of a sudden, follow these steps before putting the blame on your theme', 'Supernova'); ?></p>
   	<p><?php _e('a) Switch to Wordpress default Twenty Twelve theme to see if its a theme related issue or a plugin which is causing problem, dont worry, the theme settings would not be lost', 'Supernova'); ?></p>
	<p><?php _e('b) Deactivate all plugins and see if that solves the problem.', 'Supernova'); ?></p> 
    <p><?php _e('c) Please reset settings of Supernova theme', 'Supernova'); ?></p>  
	<p><?php _e('If the problem could not be solved even after following these three steps check worpdress support forum for Supernova and see if there is already a solution to it or start a new discussion', 'Supernova'); ?></p>
    <p><?php _e('Supernova doesn\'t alter your existing database, so you can always switch back to your old theme and all your previous settings would be intact.', 'Supernova'); ?></p>
        
    <h3><?php _e('Removing an Image', 'Supernova'); ?></h3>
    <p><?php _e('Just delete the url from the input box and save settings. You dont always have to upload images, you can also directly enter the url of an external image and it will show at the right place.', 'Supernova'); ?></p> 
    <p><strong><?php _e('Tip:', 'Supernova'); ?></strong><?php _e(' You dont have to hit \'save settings\' on each page, just edit all the information and hit \'save settings\' only once. You dont even have to hit \'save settings\' just hit enter', 'Supernova'); ?> </p>
    <p><strong><?php _e('Please support the development of Supernova theme', 'Supernova'); ?></strong></p>    
    <table>
    <tr>
    	<td class="cofee"><img src="<?php echo SUPERNOVA_ROOT_ADMIN; ?>images/cofee_big.gif"><i><?php _e('Buy me a cup of coffee', 'Supernova'); ?></i></td>
    	<td class="paypal"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=sayed2x2@gmail.com&item_name=Donation for Supernova" title="Thank You" target="_blank"><img src="<?php echo SUPERNOVA_ROOT_ADMIN; ?>images/donate.gif" ></a></td>
    </tr>     
    </table>
</div>
</div> <?php 