<?php
/***************************************************************************
 *
 * 	----------------------------------------------------------------------
 * 						DO NOT EDIT THIS FILE
 *	----------------------------------------------------------------------
 *
 *  				     Copyright (C) Themify
 *
 *	----------------------------------------------------------------------
 *
 ***************************************************************************/

class Themify_Upgrader_Skin extends WP_Upgrader_Skin {

	/**
	 * Changelog
	 * 11/03
	 * Added $cookies param
	 * request_filesystem_credentials now pass cookies
	 */

	var $theme = '';
	var $type = '';
	var $login = '';
	var $cookies = '';

	function __construct($args = array()) {
		$defaults = array(	'type' 	=> '',	'login' => '',	'url' 	=> '', 'theme' => '',
							'nonce' => '',	'title' => __('Update Theme', 'themify'), 'cookies' => null );
		$args = wp_parse_args($args, $defaults);
		if( $args['login'] == 'true') $this->login = 'true';
		else $this->login = 'false';
		if( $args['type'] == 'framework' ) $this->type = 'framework';
		else $this->type = 'theme';
		$this->theme = $args['theme'];
		$this->cookies = $args['cookies'];
		parent::__construct($args);
	}

	function request_filesystem_credentials($error = false) {
		$url = 'admin.php?page=themify&action=upgrade&type='. $this->type .'&login=false';
		if ( !empty($this->options['nonce']) )
			$url = wp_nonce_url($url, $this->options['nonce']);
		return request_filesystem_credentials($url, '', $error, false, array($this->cookies));
	}

	function after() {

		$update_actions = array();
		if ( !empty($this->upgrader->result['destination_name']) &&
			($theme_info = $this->upgrader->theme_info()) &&
			!empty($theme_info) ) {

			$name = $theme_info->display('Name');
			$stylesheet = $this->upgrader->result['destination_name'];
			$template = $theme_info->get_template();

			$preview_link = htmlspecialchars( add_query_arg( array('preview' => 1, 'template' => $template, 'stylesheet' => $stylesheet, 'TB_iframe' => 'true' ), trailingslashit(esc_url(home_url())) ) );
			$activate_link = wp_nonce_url("themes.php?action=activate&amp;template=" . urlencode($template) . "&amp;stylesheet=" . urlencode($stylesheet), 'switch-theme_' . $template);

			$update_actions['preview'] = '<a href="' . $preview_link . '" class="thickbox thickbox-preview" title="' . esc_attr(sprintf(__('Preview &#8220;%s&#8221;', 'themify'), $name)) . '">' . __('Preview', 'themify') . '</a>';
			$update_actions['activate'] = '<a href="' . $activate_link .  '" class="activatelink" title="' . esc_attr( sprintf( __('Activate &#8220;%s&#8221;', 'themify'), $name ) ) . '">' . __('Activate', 'themify') . '</a>';

			if ( ( ! $this->result || is_wp_error($this->result) ) || $stylesheet == get_stylesheet() )
				unset($update_actions['preview'], $update_actions['activate']);
		}

		$update_actions['themes_page'] = '<a href="' . self_admin_url('admin.php?page=themify') . '" title="' . __('Return to Themify Panel', 'themify') . '" target="_parent">' . __('Return to Themify Panel', 'themify') . '</a>';

		$update_actions = apply_filters('update_theme_complete_actions', $update_actions, $this->theme);
		if ( ! empty($update_actions) )
			$this->feedback(implode(' | ', (array)$update_actions));
	}
	function header() {
		if ( $this->done_header )
			return;
		$this->done_header = true;
		echo '<div class="wrap">';
		echo screen_icon('tools');
		echo '<h2>' . $this->options['title'] . '</h2>';
	}
}

class Themify_Upgrader extends WP_Upgrader {

	var $result;
	var $cookies;

	function upgrade_strings() {
		$this->strings['up_to_date'] = __('The theme is at the latest version.', 'themify');
		$this->strings['no_package'] = __('Update package not available.', 'themify');
		$this->strings['downloading_package'] = __('Downloading update from <span class="code">%s</span>&#8230;', 'themify');
		$this->strings['unpack_package'] = __('Unpacking the update&#8230;', 'themify');
		$this->strings['remove_old'] = __('Removing the old version of the theme&#8230;', 'themify');
		$this->strings['remove_old_failed'] = __('Could not remove the old theme.', 'themify');
		$this->strings['process_failed'] = __('Theme update failed.', 'themify');
		$this->strings['process_success'] = __('Theme updated successfully.', 'themify');
	}

	function tcopydir($from, $to, $skip_list = array() ) {
		global $wp_filesystem;

		$dirlist = $wp_filesystem->dirlist($from);

		$from = trailingslashit($from);
		$to = trailingslashit($to);

		foreach ( (array) $dirlist as $filename => $fileinfo ) {

			if ( in_array( $filename, $skip_list ) ){
				echo '<p><strong>' . sprintf(__('Skipping %s', 'themify'), $filename) .  '</strong></p>';
				continue;
			}
			elseif ( $wp_filesystem->exists($to . $filename) && 'f' == $fileinfo['type'] ){
				echo '<p>' . sprintf(__('Deleting %s', 'themify'), $filename) . '</p>';
				$removed = $wp_filesystem->delete($to . $filename, true);
				if ( is_wp_error($removed) )
					return $removed;
				elseif ( ! $removed )
					return new WP_Error('remove_old_failed', $this->strings['remove_old_failed']);
			}
			echo '<p>' . sprintf(__('Copying %s', 'themify'), $filename) . '</p>';
			if ( 'f' == $fileinfo['type'] ) {
				if ( ! $wp_filesystem->copy($from . $filename, $to . $filename, true, FS_CHMOD_FILE) ) {
					// If copy failed, chmod file to 0644 and try again.
					$wp_filesystem->chmod($to . $filename, 0644);
					if ( ! $wp_filesystem->copy($from . $filename, $to . $filename, true, FS_CHMOD_FILE) )
						return new WP_Error('copy_failed', __('Could not copy file.', 'themify'), $to . $filename);
				}
			} elseif ( 'd' == $fileinfo['type'] ) {
				if ( !$wp_filesystem->is_dir($to . $filename) ) {
					if ( !$wp_filesystem->mkdir($to . $filename, FS_CHMOD_DIR) )
						return new WP_Error('mkdir_failed', __('Could not create directory.', 'themify'), $to . $filename);
				}
				$result = $this->tcopydir($from . $filename, $to . $filename, $skip_list);
				if ( is_wp_error($result) )
					return $result;
			}
		}
		return true;
	}

	function install_package($args = array()) {
		global $wp_filesystem;
		$defaults = array( 'source' => '', 'destination' => '', //Please always pass these
						'clear_destination' => false, 'clear_working' => false,
						'hook_extra' => array());

		$args = wp_parse_args($args, $defaults);
		extract($args);

		@set_time_limit( 300 );

		if ( empty($source) || empty($destination) )
			return new WP_Error('bad_request', $this->strings['bad_request']);

		$this->skin->feedback('installing_package');

		$res = apply_filters('upgrader_pre_install', true, $hook_extra);
		if ( is_wp_error($res) )
			return $res;

		//Retain the Original source and destinations
		$remote_source = $source;
		$local_destination = $destination;

		$source_files = array_keys( $wp_filesystem->dirlist($remote_source) );
		$remote_destination = $wp_filesystem->find_folder($local_destination);

		//Locate which directory to copy to the new folder, This is based on the actual folder holding the files.
		if ( 1 == count($source_files) && $wp_filesystem->is_dir( trailingslashit($source) . $source_files[0] . '/') ) //Only one folder? Then we want its contents.
			$source = trailingslashit($source) . trailingslashit($source_files[0]);
		elseif ( count($source_files) == 0 )
			return new WP_Error('bad_package', $this->strings['bad_package']); //There are no files?
		//else //Its only a single file, The upgrader will use the foldername of this file as the destination folder. foldername is based on zip filename.

		//Hook ability to change the source file location..
		$source = apply_filters('upgrader_source_selection', $source, $remote_source, $this);
		if ( is_wp_error($source) )
			return $source;

		//Has the source location changed? If so, we need a new source_files list.
		if ( $source !== $remote_source )
			$source_files = array_keys( $wp_filesystem->dirlist($source) );

		//Protection against deleting files in any important base directories.
		if ( in_array( $destination, array(ABSPATH, WP_CONTENT_DIR, WP_PLUGIN_DIR, WP_CONTENT_DIR . '/themes') ) ) {
			$remote_destination = trailingslashit($remote_destination) . trailingslashit(basename($source));
			$destination = trailingslashit($destination) . trailingslashit(basename($source));
		}

		// Skip these directories and/or files
		$skip_list = array(
			'cache',
		);
		$framework_folder = $wp_filesystem->find_folder(THEMIFY_DIR);
		$img_php = trailingslashit( $framework_folder ) . 'img.php';

		if ( ! $wp_filesystem->exists( $img_php ) ) {
			$skip_list[] = 'themify/img.php';
			$skip_list[] = $img_php;
			$skip_list[] = 'img.php';
		}

		//Create destination if needed
		if ( !$wp_filesystem->exists($remote_destination) )
			if ( !$wp_filesystem->mkdir($remote_destination, FS_CHMOD_DIR) )
				return new WP_Error('mkdir_failed', $this->strings['mkdir_failed'], $remote_destination);

		echo '<h3>' . __('Details', 'themify') . ':</h3>';
		echo '<div style="height: 200px; overflow: scroll; width: 285px; overflow-x: hidden; overflow-y: scroll; border: 1px solid #EEE; padding: 0 10px; background: #F6F6F6; font-size: 11px; line-height: 120%;">';

		// Copy new version of item into place.
		// We don't need to change this for Themify Framework since none of the files have the same name
		$result = $this->tcopydir($source, $remote_destination, $skip_list);
		echo '</div>';

		//Clear the Working folder?
		if ( $clear_working )
			$wp_filesystem->delete($remote_source, true);

		$destination_name = basename( str_replace($local_destination, '', $destination) );
		if ( '.' == $destination_name )
			$destination_name = '';

		$this->result = compact('local_source', 'source', 'source_name', 'source_files', 'destination', 'destination_name', 'local_destination', 'remote_destination', 'clear_destination', 'delete_source_dir');

		$res = apply_filters('upgrader_post_install', true, $hook_extra, $this->result);
		if ( is_wp_error($res) ) {
			$this->result = $res;
			return $res;
		}

		//Bombard the calling function will all the info which we've just used.
		return $this->result;
	}

	function upgrade($themeName, $url, $cookies, $type = 'theme') {

		$this->init();
		$this->upgrade_strings();
		$this->cookies = $cookies;

		add_filter('upgrader_pre_install', array(&$this, 'current_before'), 10, 2);
		add_filter('upgrader_post_install', array(&$this, 'current_after'), 10, 2);

		if($type == 'framework')
			$destination = WP_CONTENT_DIR . '/themes/' . $themeName . '/themify';
		else
			$destination = WP_CONTENT_DIR . '/themes/' . $themeName;

		$options = array(
						'package' => $url,
						'destination' => $destination,
						'clear_destination' => true,
						'clear_working' => true,
						'hook_extra' => array(
											'theme' => $themeName,
											'type' => $type
											)
						);

		$this->run($options);

		if ( ! $this->result || is_wp_error($this->result) )
			return $this->result;

		return true;
	}

	function current_before($return, $theme) {

		if ( is_wp_error($return) )
			return $return;

		$theme = isset($theme['theme']) ? $theme['theme'] : '';

		if ( $theme != get_stylesheet() ) //If not current
			return $return;
		//Change to maintenance mode now.
		if ( ! $this->bulk )
			$this->maintenance_mode(true);

		return $return;
	}
	function current_after($return, $theme) {
		if ( is_wp_error($return) )
			return $return;

		$theme = isset($theme['theme']) ? $theme['theme'] : '';

		if ( $theme != get_stylesheet() ) //If not current
			return $return;

		//Time to remove maintenance mode
		if ( ! $this->bulk )
			$this->maintenance_mode(false);
		return $return;
	}

	function theme_info($theme = null) {

		if ( empty($theme) ) {
			if ( !empty($this->result['destination_name']) )
				$theme = $this->result['destination_name'];
			else
				return false;
		}
		return wp_get_theme( $theme, WP_CONTENT_DIR . '/themes/' );
	}

	function run($options) {

		$defaults = array( 	'package' => '', //Please always pass this.
							'destination' => '', //And this
							'clear_destination' => false,
							'clear_working' => true,
							'is_multi' => false,
							'hook_extra' => array() //Pass any extra $hook_extra args here, this will be passed to any hooked filters.
						);

		$options = wp_parse_args($options, $defaults);
		extract($options);

		//Connect to the Filesystem first.
		$res = $this->fs_connect( array(WP_CONTENT_DIR, $destination) );
		if ( ! $res ) //Mainly for non-connected filesystem.
			return false;

		if ( is_wp_error($res) ) {
			$this->skin->error($res);
			return $res;
		}

		if ( !$is_multi ) // call $this->header separately if running multiple times
			$this->skin->header();

		$this->skin->before();

		//Download the package (Note, This just returns the filename of the file if the package is a local file)
		$download = $this->download_package( $package );
		if ( is_wp_error($download) ) {
			$this->skin->error($download);
			$this->skin->after();
			return $download;
		}

		$delete_package = ($download != $package); // Do not delete a "local" file

		//Unzip's the file into a temporary directory
		$working_dir = $this->unpack_package( $download, $delete_package );
		if ( is_wp_error($working_dir) ) {
			$this->skin->error($working_dir);
			$this->skin->after();
			return $working_dir;
		}

		//With the given options, this installs it to the destination directory.
		$result = $this->install_package( array(
											'source' => $working_dir,
											'destination' => $destination,
											'clear_destination' => $clear_destination,
											'clear_working' => $clear_working,
											'hook_extra' => $hook_extra
										) );
		$this->skin->set_result($result);
		if ( is_wp_error($result) ) {
			$this->skin->error($result);
			$this->skin->feedback('process_failed');
		} else {
			//Install Suceeded
			$this->skin->feedback('process_success');
			echo 'Deleting transient for ' . $hook_extra['type'];
			if($hook_extra['type'] == 'framework'){
				delete_transient('themify_new_framework');
				themify_set_update_cookie('framework');
			}
			else{
				delete_transient('themify_new_theme');
				themify_set_update_cookie('theme');
			}
		}
		$this->skin->after();

		if ( !$is_multi )
			$this->skin->footer();

		return $result;
	}

	function download_package($package) {

		if ( ! preg_match('!^(http|https|ftp)://!i', $package) && file_exists($package) ) //Local file or remote?
			return $package; //must be a local file..

		if ( empty($package) )
			return new WP_Error('no_package', $this->strings['no_package']);

		$this->skin->feedback('downloading_package', $package);

		$download_file = $this->download_url($package);

		if ( is_wp_error($download_file) )
			return new WP_Error('download_failed', $this->strings['download_failed'], $download_file->get_error_message());

		return $download_file;
	}

	function download_url( $url, $timeout = 400 ) {
		//WARNING: The file is not automatically deleted, The script must unlink() the file.
		if ( ! $url )
			return new WP_Error('http_no_url', __('Invalid URL Provided.', 'themify'));

		$tmpfname = wp_tempnam($url);
		if ( ! $tmpfname )
			return new WP_Error('http_no_file', __('Could not create Temporary file.', 'themify'));

		$response = wp_remote_get( $url, array( 'cookies' => $this->cookies, 'timeout' => $timeout, 'stream' => true, 'filename' => $tmpfname ) );

		if ( is_wp_error( $response ) ) {
			unlink( $tmpfname );
			return $response;
		}

		if ( 200 != wp_remote_retrieve_response_code( $response ) ){
			unlink( $tmpfname );
			return new WP_Error( 'http_404', trim( wp_remote_retrieve_response_message( $response ) ) );
		}

		return $tmpfname;
	}
}