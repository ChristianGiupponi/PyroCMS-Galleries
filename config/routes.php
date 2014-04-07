<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 * @author      Christian Giupponi STILOGO
 * @link		http://www.stilogo.it
 * @package 	PyroCMS
 * @subpackage  Galleries
 * @category	module
 */

$route['galleries/admin/categories(:any)?'] = 'admin_categories$1';
$route['galleries/(:num)'] = 'galleries/index/$1';