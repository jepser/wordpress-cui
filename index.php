<?php
/*
Plugin Name:  Typeform Conversations
Plugin URI:   https://labs.typeform.com/cui/
Description:  Typeform new interface plugin, learn more at the <a href="https://labs.typeform.com/cui/">project page</a>.
Version:      1.0
Author:       Typeform
Author URI:   https://www.typeform.com/
Text Domain:  cui
Domain Path:  /languages
*/

define('CUI_PLUGIN_URL', plugin_dir_url( __FILE__ ));

class Cui {
  public static function registerScript() {
    wp_enqueue_script('typeform/cui', 'https://labs-assets.typeform.com/cui/cui-embed.js', [], null, true);
  }

  public static function createShortcode($atts) {

    // var_dump($atts);
    $options = shortcode_atts(array(
      'height'      => '400px',
      'theme'       => '',
      'avatar'      => '',
      'uid'         => '',
      'background'  => ''
    ), $atts);

    extract($options);

    var_dump($theme);

    if(!$uid) return;

    return "<div
      class='cui-embed'
      data-cui-uid='$uid'
      data-cui-height='$height'
      data-cui-avatar='$avatar'
      data-cui-theme='$theme'
      data-cui-background='$background'
    ></div>";
  }
}

add_action('wp_enqueue_scripts', ['Cui', 'registerScript']);
add_shortcode('cui', ['Cui', 'createShortcode']);
