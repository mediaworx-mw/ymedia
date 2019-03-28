<?php
/**
 * Include Template Functions
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

function home_tag($h1, $p, $class) {
 $src = get_template_directory();
 include($src.'/components/tag.php');
}

function grid($class) {
 $src = get_template_directory();
 include($src.'/components/grid.php');
}

function counter($number, $class) {
 $src = get_template_directory();
 include($src.'/components/counter.php');
}

function video($id) {
 $src = get_template_directory();
 include($src.'/components/video.php');
}

function member($size) {
 $src = get_template_directory();
 include($src.'/components/corporativo/member.php');
}

