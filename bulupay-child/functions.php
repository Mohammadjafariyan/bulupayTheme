<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );


add_action( 'after_setup_theme', 'mj_bulupay_after_theme_setup' );


function mj_bulupay_after_theme_setup() {
	register_nav_menus(
		array(
			'footer' => __( 'Footer Menu', 'mj_bulupay' ),
			'footer-2' => __( 'Footer 2 Menu', 'mj_bulupay' ),
		)
	);
}



function mj_bulupay_customize_register( $wp_customize ) {
	//All our sections, settings, and controls will be added here

	$wp_customize->add_setting(
		'mj_bulupay_site_footer_description',
		array(
			'default'           => 'Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.			',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		)
	);

	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'mj_bulupay_site_footer_description',
			array(
				'label'       => __( 'Site Footer Description', 'mj_bulupay' ),
				'description' => __( 'Override Understrap\'s site info located at the footer of the page.', 'mj_bulupay' ),
				'section'     => 'understrap_theme_layout_options',
				'type'        => 'textarea',
				'priority'    => 30,
			)
		)
	);


	
	$wp_customize->add_setting(
		'mj_bulupay_site_footer_website_title',
		array(
			'default'           => 'bulupay',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		)
	);

	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'mj_bulupay_site_footer_website_title',
			array(
				'label'       => __( 'Site Footer Description', 'mj_bulupay' ),
				'description' => __( 'Override Understrap\'s site info located at the footer of the page.', 'mj_bulupay' ),
				'section'     => 'understrap_theme_layout_options',
				'type'        => 'text',
				'priority'    => 30,
			)
		)
	);
	$wp_customize->add_setting(
		'mj_bulupay_site_footer_address',
		array(
			'default'           => 'Tabriz Nesfe Rah',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		)
	);


	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'mj_bulupay_site_footer_address',
			array(
				'label'       => __( 'Site Footer Address', 'mj_bulupay' ),
				'description' => __( 'Override Understrap\'s site info located at the footer of the page.', 'mj_bulupay' ),
				'section'     => 'understrap_theme_layout_options',
				'type'        => 'textarea',
				'priority'    => 30,
			)
		)
	);
    //---------------------------------------------------------------------------------
    $wp_customize->add_setting(
		'mj_bulupay_site_footer_tel1',
		array(
			'default'           => '+ 98 901 040 9293',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		)
	);


	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'mj_bulupay_site_footer_tel1',
			array(
				'label'       => __( 'Site Footer Telephone 1 ', 'mj_bulupay' ),
				'description' => __( 'Override Understrap\'s site info located at the footer of the page.', 'mj_bulupay' ),
				'section'     => 'understrap_theme_layout_options',
				'type'        => 'text',
				'priority'    => 30,
			)
		)
	);

    //---------------------------------------------------------------------------------
    $wp_customize->add_setting(
		'mj_bulupay_site_footer_tel2',
		array(
			'default'           => '+ 98 914 898 0692',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		)
	);


	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'mj_bulupay_site_footer_tel2',
			array(
				'label'       => __( 'Site Footer Telephone 2 ', 'mj_bulupay' ),
				'description' => __( 'Override Understrap\'s site info located at the footer of the page.', 'mj_bulupay' ),
				'section'     => 'understrap_theme_layout_options',
				'type'        => 'text',
				'priority'    => 30,
			)
		)
	);
    //---------------------------------------------------------------------------------
    $wp_customize->add_setting(
		'mj_bulupay_site_footer_email',
		array(
			'default'           => 'admin@contact.com',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		)
	);


	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'mj_bulupay_site_footer_email',
			array(
				'label'       => __( 'Site Footer Email ', 'mj_bulupay' ),
				'description' => __( 'Override Understrap\'s site info located at the footer of the page.', 'mj_bulupay' ),
				'section'     => 'understrap_theme_layout_options',
				'type'        => 'email',
				'priority'    => 30,
			)
		)
	);


    $wp_customize=AddControl($wp_customize,'mj_bulupay_site_footer_github','github','text','#');
    $wp_customize=AddControl($wp_customize,'mj_bulupay_site_footer_linkedin','linkedin','text','#');
    $wp_customize=AddControl($wp_customize,'mj_bulupay_site_footer_instagram','instagram','text','#');
    $wp_customize=AddControl($wp_customize,'mj_bulupay_site_footer_google','google','text','#');
    $wp_customize=AddControl($wp_customize,'mj_bulupay_site_footer_twitter','twitter','text','#');
    $wp_customize=AddControl($wp_customize,'mj_bulupay_site_footer_facebook','facebook','text','#');
    $wp_customize=AddControl($wp_customize,'mj_bulupay_site_footer_social_text','social text','textarea','Get connected with us on social networks:');
 }

function AddControl($wp_customize,$name,$label,$type,$default)
{
    //---------------------------------------------------------------------------------
    $wp_customize->add_setting(
        $name,
        array(
            'default'           => $default,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
            'capability'        => 'edit_theme_options',
        )
    );


    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            $name,
            array(
                'label'       => __( $label, 'mj_bulupay' ),
                'description' => __( 'Override Understrap\'s site info located at the footer of the page.', 'mj_bulupay' ),
                'section'     => 'understrap_theme_layout_options',
                'type'        => $type,
                'priority'    => 30,
            )
        )
    );

    return $wp_customize;
 }

 add_action( 'customize_register', 'mj_bulupay_customize_register' );






if ( ! function_exists( 'mj_bulupay_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function mj_bulupay_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = get_theme_mod( 'mj_bulupay_site_footer_description' );

	
		echo $site_info; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}
