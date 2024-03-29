<?php
/**
 * Template Callout
 * 
 * Access original fields: $mod_settings
 * @author Themify
 */

$fields_default = array(
	'mod_title_callout' => '',
	'appearance_callout' => '',
	'layout_callout' => '',
	'color_callout' => '',
	'heading_callout' => '',
	'text_callout' => '',
	'action_btn_link_callout' => '#',
	'action_btn_text_callout' => false,
	'action_btn_color_callout' => '',
	'action_btn_appearance_callout' => '',
	'css_callout' => ''
);

if ( isset( $mod_settings['appearance_callout'] ) ) 
	$mod_settings['appearance_callout'] = $this->get_checkbox_data( $mod_settings['appearance_callout'] );

if ( isset( $mod_settings['action_btn_appearance_callout']) ) 
	$mod_settings['action_btn_appearance_callout'] = $this->get_checkbox_data( $mod_settings['action_btn_appearance_callout'] );

$fields_args = wp_parse_args( $mod_settings, $fields_default );
extract( $fields_args, EXTR_SKIP );

$class = $layout_callout . ' ' . $color_callout . ' ' . $css_callout . ' ' . $appearance_callout . ' module-' . $mod_name;
$btn_appearance_class = $action_btn_color_callout . ' ' . $action_btn_appearance_callout;

?>
<!-- module callout -->
<div id="<?php echo $module_ID; ?>" class="ui module <?php echo $class; ?>">

	<?php if ( $mod_title_callout != '' ): ?>
	<h3 class="module-title"><?php echo $mod_title_callout; ?></h3>
	<?php endif; ?>

	<div class="callout-inner">
		<div class="callout-content">
			<h3 class="callout-heading"><?php echo $heading_callout; ?></h3>
			<?php
				echo apply_filters( 'themify_builder_tmpl_shortcode', $text_callout );
			?>
		</div>
		<!-- /callout-content -->

		<?php if ( $action_btn_text_callout ) : ?>
		<p class="callout-button">
			<a href="<?php echo $action_btn_link_callout; ?>" class="ui builder_button <?php echo $btn_appearance_class; ?>">
				<?php echo $action_btn_text_callout; ?>
			</a>
		</p>
		<?php endif; ?>
	</div>
	<!-- /callout-content -->
</div>
<!-- /module callout -->