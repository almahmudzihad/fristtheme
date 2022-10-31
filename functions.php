<?php
// my theme function


// Theme title
add_theme_support('title-tag');


// Theme CSS and jQuery file calling
function main_css_call(){
  wp_enqueue_style( 'style_css_file', get_stylesheet_uri());
  wp_register_style( 'boosstrap', get_template_directory_uri().'/css/bootstrap.css', array(),'5.0.2', 'all');
  wp_enqueue_style('boosstrap');
  wp_register_style( 'custom_css', get_template_directory_uri().'/css/custom.css', array(),'1.0.0', 'all');
  wp_enqueue_style('custom_css');

  // jQuery
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array(),'5.0.2','true');
  wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array(),'5.0.2','true');
}
add_action('wp_enqueue_scripts','main_css_call');



// Theme function
function theme_customizar_register($wp_customize ){
  $wp_customize->add_section('zihad_header_logo', array(
    'title'=>__('Header Area','zihad'),
    'description'=> 'If you interested to update your header area, you can do it here.'
  ));
  $wp_customize->add_setting('zihad_logo', array(
    'default'=> get_bloginfo('template_directory').'/img/Zihad.logo.png',
  ));
  $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize,'zihad_logo', array(
    'label'=>'Logo Upload',
    'setting' => 'zihad_logo',
    'section' => 'zihad_header_logo'
  )));
}
add_action('customize_register','theme_customizar_register');
?>