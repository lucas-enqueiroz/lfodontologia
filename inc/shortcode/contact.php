<?php
//[contact]
function contact_shortcode(){
  get_template_part('parts/contact');
}
add_shortcode( 'contact', 'contact_shortcode' );

//[social]
function social_shortcode(){
  get_template_part('parts/social');
}
add_shortcode( 'social', 'social_shortcode' );