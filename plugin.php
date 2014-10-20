<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 * @author      Christian Giupponi STILOGO
 * @link		http://www.stilogo.it
 * @package 	PyroCMS
 * @subpackage  Galleries
 * @category	module
 */

class Plugin_galleries extends Plugin
{
	public $version = "1.0.0";
	
	public $name = array(
		'it' => "Gallerie",
		'en' => "Galleries"
	);
	
	public $description = array(
		'it' => "Permette di gestire le gallerie senza dover utilizzare il php",
		'en' => "Allow you to handle galleries without using php"
	);
	
	public function _self_doc()
	{
		$info = array(
			'show_gallery' => array(
				'description' => array(
					'en' => 'Print a single gallery',
					'it' => 'Stampa una singola galleria'
				),
				'single' => false,
				'double' => true,
				'variables' => 'galleries_name|galleries_slug|galleries_category|galleries_folder|galleries_cover|galleries_intro|galleries_description|galleries_is_published|galleries_comments_enabled|galleries_seo_title|galleries_seo_keywords|galleries_seo_description',
				'attributes' => array(
					'slug' => array(
						'type' => 'string',
						'flags' => '',
						'default' => '',
						'required' => true
					),
					'not_found' => array(
						'type' => 'string',
						'flags' => '',
						'default' => 'Gallery not found',
						'required' => false
					),
				),
			),
			'get_galleries' => array(
				'description' => array(
					'en' => 'Get all the galleries',
					'it' => 'Recupera tutte le gallerie'
				),
				'single' => false,
				'double' => true,
				'variables' => 'galleries_name|galleries_slug|galleries_category|galleries_folder|galleries_cover|galleries_intro|galleries_description|galleries_is_published|galleries_comments_enabled|galleries_seo_title|galleries_seo_keywords|galleries_seo_description',
				'attributes' => array(					
					'not_found' => array(
						'type' => 'string',
						'flags' => '',
						'default' => 'Galleries not found',
						'required' => false
					),
				),
			),
			'get_categories' => array(
				'description' => array(
					'en' => 'Get all the categories',
					'it' => 'Recupera tutte le categorie'
				),
				'single' => false,
				'double' => true,
				'variables' => 'galleries_categories_name|galleries_categories_slug',
				'attributes' => array(					
					'not_found' => array(
						'type' => 'string',
						'flags' => '',
						'default' => 'You do not have any Category yet',
						'required' => false
					),
					'order_by' => array(
						'type' => 'string',
						'flags' => 'created|id',
						'default' => 'created',
						'required' => false
					),
					'sort' => array(
						'type' => 'string',
						'flags' => 'asc|desc|random',
						'default' => 'asc',
						'required' => false
					),
				),
			),
		);
		
		return $info;
	}
	
	public function show_gallery()
	{
		$slug         = $this->attribute('slug');
		$not_found    = ( $this->attribute('not_found') != "" ) ? $this->attribute('not_found') : "Gallery not found";
		
		$params = array(
			'stream' => 'galleries',
			'namespace' => 'galleries',
			'where' => "`galleries_slug` = '$slug'"
		);
		
		$entry = $this->streams->entries->get_entries($params);
		
		if( $entry['total'] > 0 )
		{
			return $entry['entries'];
		}
		
		return $not_found;
	}
	
	public function get_galleries()
	{		
		$not_found    = ( $this->attribute('not_found') != "" ) ? $this->attribute('not_found') : "Galleries not found";
		
		
		$params = array(
			'stream' => 'galleries',
			'namespace' => 'galleries',
			'where'			=> "`galleries_is_published`='yes'",
		);
		
		$entry = $this->streams->entries->get_entries($params);
		
		if( $entry['total'] > 0 )
		{
			return $entry['entries'];
		}
		
		return $not_found;
	}
	
	public function get_categories()
	{
		$not_found    = ( $this->attribute('not_found') != "" ) ? $this->attribute('not_found') : "You do not have any Category yet.";
		$order_by 	  = ( $this->attribute('order_by') != "" ) ? $this->attribute('order_by') : "created";
		$sort 		  = ( $this->attribute('sort') != "" ) ? $this->attribute('sort') : "asc";
		
		$params = array(
			'stream' => 'galleries_categories',
			'namespace' => 'galleries_categories',
			'order_by'	=> $order_by,
			'sort' => $sort
		);
		
		$entry = $this->streams->entries->get_entries($params);
		
		if( $entry['total'] > 0 )
		{
			return $entry['entries'];
		}
		
		return $not_found;
	}
}
