<?php
/**
 * Include Template Functions
 *
 *
 * @package WordPress
 * @subpackage Ymedia
 */

function home_tag($h1, $p) {
 $src = get_template_directory();
 include($src.'/components/tag.php');
}

function grid($class) {
 $src = get_template_directory();
 include($src.'/components/grid.php');
}

function page_crumb() {
 $src = get_template_directory();
 include($src.'/components/page-crumb.php');
}

function counter($number, $class) {
 $src = get_template_directory();
 include($src.'/components/counter.php');
}

function video($id) {
 $src = get_template_directory();
 include($src.'/components/video.php');
}

function member() {
 $src = get_template_directory();
 include($src.'/components/corporativo/member.php');
}

function caso($size) {
 $src = get_template_directory($size);
 include($src.'/components/clientes/caso.php');
}