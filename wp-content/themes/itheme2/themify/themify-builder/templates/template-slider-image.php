<?php
/**
 * Template Slider Image
 * 
 * Access original fields: $settings
 * @author Themify
 */
global $_wp_additional_image_sizes;

$fields_default = array(
	'mod_title_slider' => '',
	'layout_display_slider' => '',
	'display_slider' => 'content',
	'img_content_slider' => array(),
	'layout_slider' => '',
	'image_size_slider' => '',
	'img_w_slider' => '',
	'img_h_slider' => '',
	'visible_opt_slider' => '',
	'auto_scroll_opt_slider' => 0,
	'scroll_opt_slider' => '',
	'speed_opt_slider' => '',
	'effect_slider' => 'scroll',
	'wrap_slider' => 'yes',
	'show_nav_slider' => 'yes',
	'show_arrow_slider' => 'yes',
	'left_margin_slider' => '',
	'right_margin_slider' => '',
	'css_slider' => ''
);

if ( isset( $settings['auto_scroll_opt_slider'] ) )	
	$settings['auto_scroll_opt_slider'] = $settings['auto_scroll_opt_slider'];

$fields_args = wp_parse_args( $settings, $fields_default );
extract( $fields_args, EXTR_SKIP );

$class = $css_slider . ' ' . $layout_slider . ' module-' . $mod_name;
$visible = $visible_opt_slider;
$scroll = $scroll_opt_slider;
$auto_scroll = $auto_scroll_opt_slider;
$arrow = $show_arrow_slider;
$pagination = $show_nav_slider;
$left_margin = ! empty( $left_margin_slider ) ? $left_margin_slider .'px' : '';
$right_margin = ! empty( $right_margin_slider ) ? $right_margin_slider .'px' : '';
$wrapper = $wrap_slider;
$effect = $effect_slider;

switch ( $speed_opt_slider ) {
	case 'slow':
		$speed = 4;
	break;
	
	case 'fast':
		$speed = '.5';
	break;

	default:
	 $speed = 1;
	break;
}
?>
<!-- module slider image -->
<div id="<?php echo $module_ID; ?>" class="module themify_builder_slider_wrap <?php echo $class; ?> clearfix">

	<?php if ( $mod_title_slider != '' ): ?>
	<h3 class="module-title"><?php echo $mod_title_slider; ?></h3>
	<?php endif; ?>
	
	<ul class="themify_builder_slider" 
		data-id="<?php echo $module_ID; ?>" 
		data-visible="<?php echo $visible; ?>" 
		data-scroll="<?php echo $scroll; ?>" 
		data-auto-scroll="<?php echo $auto_scroll; ?>"
		data-speed="<?php echo $speed; ?>"
		data-wrapper="<?php echo $wrapper; ?>"
		data-arrow="<?php echo $arrow; ?>"
		data-pagination="<?php echo $pagination; ?>" 
		data-effect="<?php echo $effect; ?>" >
		
		<?php foreach ( $img_content_slider as $content ): ?>
		<li style="<?php echo !empty($left_margin) ? 'margin-left:'.$left_margin.';' : ''; ?> <?php echo !empty($right_margin) ? 'margin-right:'.$right_margin.';' : ''; ?>">
			<?php if( ! empty( $content['img_url_slider'] ) ): ?>
			<div class="slide-image">
				<?php
				$image_url = $content['img_url_slider'];
				$image_w = $img_w_slider;
				$image_h = $img_h_slider;
				$image_title = $content['img_title_slider'];
				$param_image_src = 'src='.$image_url.'&w='.$image_w .'&h='.$image_h.'&alt='.$image_title.'&ignore=true';
				if ( $this->is_img_php_disabled() ) {
					// get image preset
					$preset = $image_size_slider != '' ? $image_size_slider : themify_get('setting-global_feature_size');
					if ( isset( $_wp_additional_image_sizes[ $preset ]) && $image_size_slider != '') {
						$image_w = intval( $_wp_additional_image_sizes[ $preset ]['width'] );
						$image_h = intval( $_wp_additional_image_sizes[ $preset ]['height'] );
					} else {
						$image_w = $image_w != '' ? $image_w : get_option($preset.'_size_w');
						$image_h = $image_h != '' ? $image_h : get_option($preset.'_size_h');
					}
					$image = '<img src="'.$image_url.'" alt="'.$image_title.'" width="'.$image_w.'" height="'.$image_h.'">';
				} else {
					$image = themify_get_image($param_image_src);
				}
				?>
				<?php if ( ! empty( $content['img_link_slider'] ) ): ?>
				<a href="<?php echo $content['img_link_slider']; ?>" alt="<?php echo $content['img_title_slider']; ?>">
					<?php echo $image; ?>
				</a>
				<?php else: ?>
					<?php echo $image; ?>
				<?php endif; ?>
			</div>
			<!-- /slide-image -->
			<?php endif; ?>

			<?php if ( isset( $content['img_link_slider'] ) || $image_title != '' || isset( $content['img_caption_slider'] ) ):  ?>
			<div class="slide-content">
				<?php if ( $image_title != '' ): ?>
				<h3 class="slide-title">
					<?php if ( isset( $content['img_link_slider'] ) && $content['img_link_slider'] != '' ): ?>
					<a href="<?php echo $content['img_link_slider']; ?>"><?php echo $image_title; ?></a>
					<?php else: ?>
					<?php echo $image_title; ?>
					<?php endif; ?>
				</h3>
				<?php endif; ?>
				
				<?php 
					if( isset( $content['img_caption_slider'] ) ) {
						echo apply_filters( 'themify_builder_tmpl_shortcode', $content['img_caption_slider'] );
					}
				?>
			</div>
			<!-- /slide-content -->
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
	</ul>
	<!-- /themify_builder_slider -->

</div>
<!-- /module slider image -->