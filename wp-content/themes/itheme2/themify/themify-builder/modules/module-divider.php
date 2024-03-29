<?php
/**
 * Module Name: Divider
 * Description: Display Divider
 */

///////////////////////////////////////
// Module Options
///////////////////////////////////////
$this->modules['divider'] = apply_filters( 'themify_builder_module_divider', array(
	'name' => __('Divider', 'themify'),
	'options' => array(
		array(
			'id' => 'mod_title_divider',
			'type' => 'text',
			'label' => __('Module Title', 'themify'),
			'class' => 'large'
		),
		array(
			'id' => 'style_divider',
			'type' => 'layout',
			'label' => __('Divider Style', 'themify'),
			'options' => array(
				array('img' => 'solid.png', 'value' => 'solid', 'label' => __('Solid', 'themify')),
				array('img' => 'dotted.png', 'value' => 'dotted', 'label' => __('Dotted', 'themify')),
				array('img' => 'dashed.png', 'value' => 'dashed', 'label' => __('Dashed', 'themify')),
				array('img' => 'double.png', 'value' => 'double', 'label' => __('Double', 'themify'))
			)
		),
		array(
			'id' => 'stroke_w_divider',
			'type' => 'text',
			'label' => __('Stroke Thickness', 'themify'),
			'class' => 'xsmall',
			'help' => 'px'
		),
		array(
			'id' => 'color_divider',
			'type' => 'text',
			'label' => __('Divider Color', 'themify'),
			'class' => 'small',
			'colorpicker' => true
		),
		array(
			'id' => 'top_margin_divider',
			'type' => 'text',
			'label' => __('Top Margin', 'themify'),
			'class' => 'xsmall',
			'help' => 'px'
		),
		array(
			'id' => 'bottom_margin_divider',
			'type' => 'text',
			'label' => __('Bottom Margin', 'themify'),
			'class' => 'xsmall',
			'help' => 'px'
		),
		array(
			'id' => 'css_divider',
			'type' => 'text',
			'label' => __('Additional CSS Class', 'themify'),
			'class' => 'large',
			'help' => __('Add additional CSS class(es) for custom styling', 'themify'),
			'separated' => 'top',
			'break' => true
		)
	)
) );

?>