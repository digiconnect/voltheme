<?php

// this code is meant to contain all the shortcodes used in the volunteer theme

// creating shortcode for blog title, url, etc. [bloginfo value='name'] [bloginfo value='url'] (i.e., Volunteer Halifax)
    function bloginfoSC( $atts ) {
             extract(shortcode_atts(array(       'value' => '',   ), $atts));
             return get_bloginfo($value);
		}

		add_shortcode('bloginfo', 'bloginfoSC');
		
// shortcode to get cityinfo

function cityinfo($atts){
	return get_theme_mod('city_setting','Halifax');
}
		add_shortcode('cityinfo', 'cityinfo');

// shortcode to get city_province_info

function cityprovinceinfo($atts){
	return get_theme_mod('city_province_setting','Halifax, Nova Scotia');
}
		add_shortcode('cityprovinceinfo', 'cityprovinceinfo');

// shortcode to get email

function emaillink($atts){
	return get_theme_mod('email_setting','info@volunteerhalifax.ca');
}
		add_shortcode('emaillink', 'emaillink');

// shortcode to get facebook

function facebooklink($atts){
	return get_theme_mod('facebook_setting','http://www.facebook.com');
}
		add_shortcode('facebooklink', 'facebooklink');

// shortcode to get twitter

function twitterlink($atts){
	return get_theme_mod('twitter_setting','http://www.twitter.com');
}
		add_shortcode('twitterlink', 'twitterlink');

// shortcode to get google+

function googlelink($atts){
	return get_theme_mod('google_setting','http://www.google.com');
}
		add_shortcode('googlelink', 'googlelink');

// shortcode to get pinterest

function pinterestlink($atts){
	return get_theme_mod('pinterest_setting','http://www.pinterest.com');
}
		add_shortcode('pinterestlink', 'pinterestlink');


?>