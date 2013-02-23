<?php
/*
Plugin Name: Wordpress XBBC
Plugin URI: https://github.com/galedric/Wordpress_XBBC
Description: XBBC parser + UCode with Wordpress.
Version: 1.0
Author URI: http://galedric.me/
*/

require(dirname(__FILE__) . "/xbbc/xbbc.php");
require(dirname(__FILE__) . "/ucode/ucode.php");

$WP_XBBC_PARSER = new \XBBC\Parser(\XBBC\NO_SMILIES);
\UCode\Lib::load($WP_XBBC_PARSER);

add_filter("the_content", function($content) {
	global $WP_XBBC_PARSER;
	return $WP_XBBC_PARSER->Parse($content);
});
