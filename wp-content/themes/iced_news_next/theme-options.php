<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'iced_theme_options', 'iced_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'iced_theme' ), __( 'Theme Options', 'iced_theme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}


/**
 * Create the options page
 */
function theme_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" .  wp_get_theme() . __( ' Theme Options', 'iced_theme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'iced_theme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'iced_theme_options' ); ?>
			<?php $options = get_option( 'iced_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * A sample checkbox option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Logo URL', 'iced_theme' ); ?></th>
					<td>
						    <?php if(!isset($options['logo-url']))  $options['logo-url'] = get_template_directory_uri() . "/images/logo.jpg"; ?>
							<input id="iced_theme_options[logo-url]" class="regular-text" size="10" name="iced_theme_options[logo-url]" value="<?php echo $options['logo-url']; ?>" />						
					</td>
				</tr>	
				<tr valign="top"><th scope="row"><?php _e( 'Category for featured slideshow', 'iced_theme' ); ?></th>
					<td>
							<?php	$selected = $options['featured'];	
							wp_dropdown_categories( array('name' => 'iced_theme_options[featured]', 'selected' => $selected) ); ?>							
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Category for breaking news', 'iced_theme' ); ?></th>
					<td>
							<?php	$selected = $options['breaking'];	
							wp_dropdown_categories( array('name' => 'iced_theme_options[breaking]', 'selected' => $selected) ); ?>							
					</td>
				</tr>
				<?php
				/**
				 * A sample text input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( '6 Categories for homepage boxes', 'iced_theme' ); ?></th>
					<td>
							<?php	$selected = $options['box1'];	
							wp_dropdown_categories( array('name' => 'iced_theme_options[box1]', 'selected' => $selected) ); ?>		
							<?php	$selected = $options['box2'];	
							wp_dropdown_categories( array('name' => 'iced_theme_options[box2]', 'selected' => $selected) ); ?>	<br />	
							<?php	$selected = $options['box3'];	
							wp_dropdown_categories( array('name' => 'iced_theme_options[box3]', 'selected' => $selected) ); ?>		
							<?php	$selected = $options['box4'];	
							wp_dropdown_categories( array('name' => 'iced_theme_options[box4]', 'selected' => $selected) ); ?>	<br />	
							<?php	$selected = $options['box5'];	
							wp_dropdown_categories( array('name' => 'iced_theme_options[box5]', 'selected' => $selected) ); ?>		
							<?php	$selected = $options['box6'];	
							wp_dropdown_categories( array('name' => 'iced_theme_options[box6]', 'selected' => $selected) ); ?>		
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Twitter URL', 'iced_theme' ); ?></th>
					<td>
								<input id="iced_theme_options[twitter-url]" class="regular-text" size="10" name="iced_theme_options[twitter-url]" value="<?php echo $options['twitter-url']; ?>" />
					</td>
				</tr>	<tr valign="top"><th scope="row"><?php _e( 'Facebook URL', 'iced_theme' ); ?></th>
					<td>
							<input id="iced_theme_options[facebook-url]" class="regular-text" size="10" name="iced_theme_options[facebook-url]" value="<?php echo $options['facebook-url']; ?>" />						
					</td>
				</tr>	
				<tr valign="top"><th scope="row"><?php _e( 'Feed URL', 'iced_theme' ); ?></th>
					<td>
							<input id="iced_theme_options[feed-url]" class="regular-text" size="10" name="iced_theme_options[feed-url]" value="<?php echo $options['feed-url']; ?>" />							
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Header Ad code(525px x 90px)', 'iced_theme' ); ?></th>
					<td>
							<textarea id="iced_theme_options[header-ad]" class="regular-text"  cols="55" rows="3" name="iced_theme_options[header-ad]"><?php echo $options['header-ad']; ?></textarea>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Homepage middle Ad code(728px x 90px)', 'iced_theme' ); ?></th>
					<td>
							<textarea id="iced_theme_options[home-ad]" class="regular-text"  cols="55" rows="3" name="iced_theme_options[home-ad]" ><?php echo $options['home-ad']; ?></textarea>							
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Sidebar Ad (160px width)', 'iced_theme' ); ?></th>
					<td>
							<textarea id="iced_theme_options[sidebar-ad]" class="regular-text"  cols="55" rows="3" name="iced_theme_options[sidebar-ad]"><?php echo $options['sidebar-ad']; ?></textarea>							
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Footer text', 'iced_theme' ); ?></th>
					<td>
							<textarea id="iced_theme_options[footer-text]" class="regular-text"  cols="55" rows="3" name="iced_theme_options[footer-text]"><?php echo $options['footer-text']; ?></textarea>							
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'iced_theme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
	
	
	if ( !isset( $input['sidebar-ad'] ) ||  $input['sidebar-ad'] == '')
		$input['sidebar-ad'] = '<img src="http://localhost/wordpress/wp-content/themes/iced_news_next/images/adv/right_ad1.jpg" >';

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/