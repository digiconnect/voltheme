<?php
// This file handles the WP Customizer tool (e.g., colours, custom text, etc.)

//Theme Customization API
/*Text for footer*/
add_action('customize_register', 'theme_footer_customizer');
function theme_footer_customizer($wp_customize){
 //adding sections in wordpress customizer for location (e.g., Halifax and Halifax, Nova Scotia) 
$wp_customize->add_section('location_settings_section', array(
  'title'          => 'Location'
 ) );
//adding setting for city text area 
$wp_customize->add_setting('city_setting', array(
 'default'        => 'City',
 ) );

$wp_customize->add_control('city_setting', array(
 'label'   => 'City Text Here',
  'section' => 'location_settings_section',
 'type'    => 'textarea',
) ); 
// City and province (i.e., Halifax, Nova Scotia)
$wp_customize->add_setting('city_and_province_setting', array(
 'default'        => 'City, Province',
) );
 
$wp_customize->add_control('city_and_province_setting', array(
 'label'   => 'City, Province Text Here',
 'section' => 'location_settings_section',
 'type'    => 'textarea',
) );

//adding sections for Facebook, Twitter, Google+, Pinterest, Email

$wp_customize->add_section('contact_section', array(
  'title'          => 'Contact Info'
 ) );

//adding setting for email address 
$wp_customize->add_setting('email_setting', array(
 'default'        => 'info@volunteerhalifax.ca',
 ) );

$wp_customize->add_control('email_setting', array(
 'label'   => 'Email:',
  'section' => 'contact_section',
 'type'    => 'textarea',
) );

//adding setting for facebook 
$wp_customize->add_setting('facebook_setting', array(
 'default'        => 'http://www.facebook.com',
 ) );

$wp_customize->add_control('facebook_setting', array(
 'label'   => 'Facebook:',
  'section' => 'contact_section',
 'type'    => 'textarea',
) );

//adding setting for twitter 
$wp_customize->add_setting('twitter_setting', array(
 'default'        => 'http://www.twitter.com',
 ) );

$wp_customize->add_control('twitter_setting', array(
 'label'   => 'Twitter:',
  'section' => 'contact_section',
 'type'    => 'textarea',
) );

//adding setting for google+ 
$wp_customize->add_setting('google_setting', array(
 'default'        => 'http://www.google.com',
 ) );

$wp_customize->add_control('google_setting', array(
 'label'   => 'Google+:',
  'section' => 'contact_section',
 'type'    => 'textarea',
) );

//adding setting for pinterest 
$wp_customize->add_setting('pinterest_setting', array(
 'default'        => 'http://www.pinterest.com',
 ) );

$wp_customize->add_control('pinterest_setting', array(
 'label'   => 'Pinterest:',
  'section' => 'contact_section',
 'type'    => 'textarea',
) );
//adding section for logo upload
$wp_customize->add_section( 'themeslug_logo_section' , array(
    'title'       => __( 'Logo', 'themeslug' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) ); 
$wp_customize->add_setting( 'themeslug_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'settings' => 'themeslug_logo',
) ) );
}//end of theme_footer_customizer
?>