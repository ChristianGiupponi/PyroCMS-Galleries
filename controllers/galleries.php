<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 * @author      Christian Giupponi STILOGO
 * @link		http://www.stilogo.it
 * @package 	PyroCMS
 * @subpackage  Galleries
 * @category	module
 */

class Galleries extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		//Load lang
		$this->lang->load('galleries/galleries');
		
		$this->load->model('galleries/galleries_m');
	}
	
	/*
	 *	This function will create a list of all the galleries
	 *	saved into the DB.
	 *	The UI part is managed by a php file so users have a 
	 *	complete control over the design.
	 */
	public function index()
	{
		//Prepare the params for the select query
		$params = array(
			'stream' 		=> 'galleries',
            'namespace' 	=> 'galleries',
			'paginate' 		=> 'yes',
            'limit' 		=> 5,
            'pag_segment' 	=> 2,
            'disable'		=> 'created_by',
            'order_by'		=> 'id',
            'sort'			=> 'ASC',
            'where'			=> "`galleries_is_published`='yes'",
		);
		
		//Get all the galleries
		$galleries = $this->streams->entries->get_entries($params);
		
		//Render the UI
		$this->template
        				->title($this->module_details['name'])
        				->set('galleries', $galleries)
        				->build('users/index');
	}
	
	/*
	 *	This function will show a single gallery based on the galleries_slug field
	 *	If no slug is passed the function will redirect the users to 404 page.
	 *	Even in this case users have a complete control over the design.
	 */
	public function show( $slug = "" )
	{
		//Check if there is a slug
		if( trim($slug) == "" )
		{
			show_404();
			exit;
		}
		
		//Prepare the $where to use in streams query
		$where = "`galleries_slug` = '$slug' AND `galleries_is_published`='yes'";
				
		//Prepare the params for the select query
		$params = array(
			'stream'    => 'galleries',
            'namespace' => 'galleries',
            'disable'   => 'created_by',
            'where'     => $where,
		);	
		
		//Get all the galleries
		$gallery = $this->streams->entries->get_entries($params);
		
		//Check if there is a result
		if( $gallery['total'] > 0 )
		{
			//Fetch the result and get the SEO fields
			foreach( $gallery['entries'] as $g )
			{
				$title 			= ( $g['galleries_seo_title'] 		!= "" ) ? $g['galleries_seo_title'] 		: $g['galleries_name'];
				$description 	= ( $g['galleries_seo_description'] != "" ) ? $g['galleries_seo_description'] 	: $g['galleries_intro'];
				$keywords		= ( $g['galleries_seo_keywords'] 	!= "" ) ? $g['galleries_seo_keywords'] 		: $g['galleries_name'];
				
				$folder_id 		= $g['galleries_folder'];
				
				$comments = $g['galleries_comments_enabled']['key'];
				
				$id = $g['id'];
			}
			
			//Get all the images
			$images = $this->galleries_m->get_images_by_folder_id($folder_id);
					
			//We need coments?
			if( $comments == "yes" )
			{
			
				// We need to check if the comments are disabled in admin
				if (Settings::get('enable_comments'))
				{
					// Load Comments so we can work out what to do with them
					$this->load->library('comments/comments', array(
						'entry_id'    => $id,
						'entry_title' => $title,
						'module'      => 'galleries',
						'singular'    => 'gallery',
						'plural'      => 'galleries',
					));		
				}
			}
			
			//Render the UI
			$this->template
	        				->title($title)
	        				->set_metadata('keywords', $keywords)
	        				->set_metadata('description' , $description)
	        				->set('gallery', $gallery)
	        				->set('images', $images)
	        				->build('users/single');
		}
		else
		{
			show_404();
			exit;
		}
		
		
	}
	
	/*
	 *	This function will show a list of galleries based on a given category slug
	 *	If no slug is passed users are redirect to 404 page.
	 */
	public function category( $category_slug = "" )
	{
		//Check if there is a slug
		if( trim($category_slug) == "" )
		{
			show_404();
			exit;
		}
		
		$where = "`galleries_is_published`='yes' AND `rel_galleries_category`.`galleries_categories_slug`='$category_slug'";
		
		//Prepare the params for the select query
		$params = array(
			'stream'    => 'galleries',
            'namespace' => 'galleries',
            'disable'   => 'created_by',
            'where'     => $where
		);
		
		//Get all the galleries
		$galleries = $this->streams->entries->get_entries($params);
		
		//Get the cateory name
		foreach( $galleries['entries'] as $gallery )
		{
			$category_name = $gallery['galleries_category']['galleries_categories_name'];
			break;
		}
		//Render the UI
		$this->template
        				->title($this->module_details['name'])
        				->set('galleries', $galleries)
        				->set('category_name', $category_name)
        				->build('users/category');
	}
	
	public function categories()
	{
		//Prepare the params for the select query
		$params = array(
			'stream'    => 'galleries_categories',
            'namespace' => 'galleries_categories',
            'disable'   => 'created_by',
		);
		
		//Get all the categories
		$categories = $this->streams->entries->get_entries($params);
		
		//Render the UI
		$this->template
        				->title($this->module_details['name'])
        				->set('categories', $categories)
        				->build('users/category_list');
	}
}