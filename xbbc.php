<?php
/*
Plugin Name: XBBC Parser
Description: XBBC Parser for Wordpress
Author: Bastien Clément
License: MIT
*/

$root_path = plugin_dir_path(__FILE__);

require "{$root_path}parser/xbbc.php";
require "{$root_path}ucode/ucode.php";

use XBBC\Parser;
use UCode\Lib;

$XBBC_PARSER = new Parser(SMILIES_OPTIMIZER);
Lib::load($XBBC_PARSER);

add_filter('the_content', function($content) {
	global $XBBC_PARSER;
	$content = preg_replace('%(<(?<tag>a|span).*?"more-[^"]+".*?>.*</\k<tag>>)%', '[html]$1[/html]', $content);
	return $XBBC_PARSER->Parse($content).$append;
}, 1);

wp_enqueue_style('ucode-style', plugins_url('ucode.css', __FILE__));
wp_enqueue_script('ucode-script', plugins_url('ucode.js', __FILE__), array('jquery'));
wp_enqueue_script('wowhead-script', 'http://static.wowhead.com/widgets/power.js');
