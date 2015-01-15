<?php

// ------------- Theme Customizer  ------------- //

add_action( 'customize_register', 'radius_theme_customizer_register' );

function radius_theme_customizer_register( $wp_customize ) {

	class Radius_Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';

	    public function render_content() {
	        ?>
	        <label>
		        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>
	        <?php
	    }
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = __( 'Select a page:', 'radius' );
	foreach ( $options_pages_obj as $page ) {
		$options_pages[$page->ID] = $page->post_title;
	}

	//Radius Style Options

	$wp_customize->add_section( 'radius_theme_customizer_basic', array(
		'title'		=> __( 'Theme Options', 'radius' ),
		'priority'	=> 1
	) );

	//Logo Image
	$wp_customize->add_setting( 'radius_theme_customizer_logo', array(
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'radius_theme_customizer_logo', array(
		'label'		=> __( 'Logo Upload', 'radius' ),
		'section'	=> 'radius_theme_customizer_basic',
		'settings'	=> 'radius_theme_customizer_logo',
		'priority'	=> 1
	) ) );

	//Link Color
	$wp_customize->add_setting( 'radius_theme_customizer_link', array(
		'default'	=> '#F5461E',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'radius_theme_customizer_link', array(
		'label'		=> __( 'Link Color', 'radius' ),
		'section'	=> 'radius_theme_customizer_basic',
		'settings'	=> 'radius_theme_customizer_link',
		'priority'	=> 2
	) ) );

	//Accent Color
	$wp_customize->add_setting( 'radius_theme_customizer_accent', array(
		'default'	=> '#f16e4f',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'radius_theme_customizer_accent', array(
		'label'		=> __( 'Accent Color', 'radius' ),
		'section'	=> 'radius_theme_customizer_basic',
		'settings'	=> 'radius_theme_customizer_accent',
		'priority'	=> 3
	) ) );

    //Custom CSS
	$wp_customize->add_setting( 'radius_theme_customizer_css', array(
        'default'	=> '',
    ) );

    $wp_customize->add_control( new Radius_Customize_Textarea_Control( $wp_customize, 'radius_theme_customizer_css', array(
	    'label'		=> __( 'Custom CSS', 'radius' ),
	    'section'	=> 'radius_theme_customizer_basic',
	    'settings'	=> 'radius_theme_customizer_css',
	    'priority'	=> 4
	) ) );

}