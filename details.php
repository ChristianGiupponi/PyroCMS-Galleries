<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 * @author      Christian Giupponi STILOGO
 * @link		http://www.stilogo.it
 * @package 	PyroCMS
 * @subpackage  Galleries
 * @category	module
 */
class Module_Galleries extends Module 
{
	public $version = "1.0.0";
	
	public function __construct()
	{
		parent::__construct();
		
		//Load language
		$this->lang->load('galleries/galleries');
		
		//Load Streams
		$this->load->driver('Streams');	
	}
	
	public function info()
	{
		return array(
			'name' => array(
				'it' => 'Gallerie',
				'en' => 'Galleries',
			),
			'description' => array(
				'it' => 'Gestione Gallerie di Immagini',
				'en' => 'Manage images Galleries',
			),
			'author' => 'Christian Giupponi',
			'frontend' => true,
			'backend' => true,
			'menu' => 'content',
			'sections' => array(
				'galleries' => array(
					'name' => 'galleries:shortcuts:galleries',
					'uri' => 'admin/galleries/index',
					'shortcuts' => array(
						array(
							'name' => 'galleries:shortcuts:create',
							'uri' => 'admin/galleries/create',
							'class' => 'add'
						),
					),
				),
				'categories' => array(
					'name' => 'galleries:shortcuts:categories',
					'uri' => 'admin/galleries/categories/index',
					'shortcuts' => array(
						array(
							'name' => 'galleries:shortcuts:categories:create',
							'uri' => 'admin/galleries/categories/create',
							'class' => 'add'
						),
					),
				),
			),
		);
	}
	
	public function install()
	{
	
		//Load file library
		$this->load->library('files/files');
		
		//We will create a root fodler that will contains all the
		//Galleries folder just to keep a clean view in the files module
		$root_folder = Files::create_folder(0 , lang('galleries:folder:name'));
		
		//Let's try to add a new stream for the galleries
		if ( ! $galleries_stream = $this->streams->streams->add_stream( lang('galleries:streams:galleries:name'), 'galleries', 'galleries', '', lang('galleries:streams:galleries:description')) ) 
		{
			//Something went wrong so uninstall the module
			$this->uninstall();
			
			return false;
		}
				
		//Let's try to add a new stream for the categories
		if ( ! $categories_stream = $this->streams->streams->add_stream( lang('galleries:streams:categories:name'), 'galleries_categories', 'galleries_categories', '', lang('galleries:streams:categories:description')) ) 
		{
			//Something went wrong so uninstall the module
			$this->uninstall();
			
			return false;
		}
		
		/*
		 *	This array will contains all the field we need for the main section.
		 *	What we need:
		 *		- Name
		 *		- Slug
		 *		- Intro
		 *		- Description
		 *		- Images folder ( One folder per gallery )
		 *		- Cover Image
		 *		- Category
		 *		- Enable comments
		 *		- Title SEO
		 *		- Keywords SEO
		 *		- Description SEP
		*/
		$str_enable_comments = "no : ".lang('global:no')."\nyes : ".lang('global:yes');
		$str_publish		 = "no : ".lang('global:no')."\nyes : ".lang('global:yes');
		
		$galleries_fields = array(
			array(
				'name' 			=> lang('galleries:fields:name'),
                'slug' 			=> 'galleries_name',
                'namespace' 	=> 'galleries',
                'type' 			=> 'text',
                'instructions' 	=> lang('galleries:fields:instr:name'),
                'assign' 		=> 'galleries',
                'title_column' 	=> true,
                'required' 		=> true,
                'unique' 		=> true
			),
			array(
				'name' 			=> lang('galleries:fields:slug'),
                'slug' 			=> 'galleries_slug',
                'namespace' 	=> 'galleries',
                'type' 			=> 'slug',
                'extra'         => array('space_type' => '-' , 'slug_field' => 'galleries_name'),
                'instructions' 	=> lang('galleries:fields:instr:slug'),
                'assign' 		=> 'galleries',
                'title_column' 	=> false,
                'required' 		=> true,
                'unique' 		=> true
			),
			array(
				'name' 			=> lang('galleries:fields:category'),
                'slug' 			=> 'galleries_category',
                'namespace' 	=> 'galleries',
                'type' 			=> 'relationship',
                'extra'         => array('choose_stream' => $categories_stream),
                'instructions' 	=> lang('galleries:fields:instr:category'),
                'assign' 		=> 'galleries',
                'title_column' 	=> false,
                'required' 		=> false,
                'unique' 		=> false
			),
			array(
				'name' 			=> lang('galleries:fields:folder'),
                'slug' 			=> 'galleries_folder',
                'namespace' 	=> 'galleries',
                'type' 			=> 'folders_list',
                'extra'			=> array('parent' => $root_folder['data']['id']),
                'instructions' 	=> lang('galleries:fields:instr:folder'),
                'assign' 		=> 'galleries',
                'title_column' 	=> false,
                'required' 		=> true,
                'unique' 		=> true
			),
			array(
				'name' 			=> lang('galleries:fields:cover'),
                'slug' 			=> 'galleries_cover',
                'namespace' 	=> 'galleries',
                'type' 			=> 'text',
                'instructions' 	=> lang('galleries:fields:instr:cover'),
                'assign' 		=> 'galleries',
                'title_column' 	=> false,
                'required' 		=> false,
                'unique' 		=> true
			),		
			array(
				'name' 			=> lang('galleries:fields:intro'),
                'slug' 			=> 'galleries_intro',
                'namespace' 	=> 'galleries',
                'type' 			=> 'wysiwyg',
                'extra'         => array('editor_type' => 'simple' , 'allow_tags' => 'y'),
                'instructions' 	=> lang('galleries:fields:instr:intro'),
                'assign' 		=> 'galleries',
                'title_column' 	=> false,
                'required' 		=> false,
                'unique' 		=> false
			),
			array(
				'name' 			=> lang('galleries:fields:description'),
                'slug' 			=> 'galleries_description',
                'namespace' 	=> 'galleries',
                'type' 			=> 'wysiwyg',
                'extra'         => array('editor_type' => 'advanced' , 'allow_tags' => 'y'),
                'instructions' 	=> lang('galleries:fields:instr:description'),
                'assign' 		=> 'galleries',
                'title_column' 	=> false,
                'required' 		=> false,
                'unique' 		=> false
			),
			array(
				'name' 			=> lang('galleries:fields:published'),
                'slug' 			=> 'galleries_is_published',
                'namespace' 	=> 'galleries',
                'type' 			=> 'choice',
                'extra'			=> array('choice_data' => $str_publish, 'choice_type' => 'dropdown', 'default_value' => 'yes'),
                'instructions' 	=> lang('galleries:fields:instr:published'),
                'assign' 		=> 'galleries',
                'title_column' 	=> false,
                'required' 		=> false,
                'unique' 		=> false
			),				
			array(
				'name' 			=> lang('galleries:fields:enable_comments'),
                'slug' 			=> 'galleries_comments_enabled',
                'namespace' 	=> 'galleries',
                'type' 			=> 'choice',
                'extra'			=> array('choice_data' => $str_enable_comments, 'choice_type' => 'dropdown', 'default_value' => 'no'),
                'instructions' 	=> lang('galleries:fields:instr:enable_comments'),
                'assign' 		=> 'galleries',
                'title_column' 	=> false,
                'required' 		=> false,
                'unique' 		=> false
			),
			array(
				'name' 			=> lang('galleries:fields:seo_title'),
                'slug' 			=> 'galleries_seo_title',
                'namespace' 	=> 'galleries',
                'type' 			=> 'text',
                'instructions' 	=> lang('galleries:fields:instr:seo_title'),
                'assign' 		=> 'galleries',
                'title_column' 	=> false,
                'required' 		=> false,
                'unique' 		=> false
			),			
			array(
				'name' 			=> lang('galleries:fields:seo_keywords'),
                'slug' 			=> 'galleries_seo_keywords',
                'namespace' 	=> 'galleries',
                'type' 			=> 'keywords',
                'extra'			=> array('return_type' => 'string'),
                'instructions' 	=> lang('galleries:fields:instr:seo_keywords'),
                'assign' 		=> 'galleries',
                'title_column' 	=> false,
                'required' 		=> false,
                'unique' 		=> false
			),
			array(
				'name' 			=> lang('galleries:fields:seo_description'),
                'slug' 			=> 'galleries_seo_description',
                'namespace' 	=> 'galleries',
                'type' 			=> 'textarea',
                'instructions' 	=> lang('galleries:fields:instr:seo_description'),
                'assign' 		=> 'galleries',
                'title_column' 	=> false,
                'required' 		=> false,
                'unique' 		=> false
			),						
		);
		
		/*
		 *	This array will contains all the fiedls we need to create the category section.
		 *	We just need:
		 *		- Name
		 *		- Slug
		 */
		$categories_fields = array(
			array(
				'name' 			=> lang('galleries:categories:fields:name'),
                'slug' 			=> 'galleries_categories_name',
                'namespace' 	=> 'galleries_categories',
                'type' 			=> 'text',
                'instructions' 	=> lang('galleries:categories:fields:instr:name'),
                'assign' 		=> 'galleries_categories',
                'title_column' 	=> true,
                'required' 		=> true,
                'unique' 		=> true
			),
			array(
				'name' 			=> lang('galleries:categories:fields:slug'),
                'slug' 			=> 'galleries_categories_slug',
                'namespace' 	=> 'galleries_categories',
                'type' 			=> 'slug',
                'extra'         => array('space_type' => '-' , 'slug_field' => 'galleries_categories_name'),
                'instructions' 	=> lang('galleries:categories:fields:instr:slug'),
                'assign' 		=> 'galleries_categories',
                'title_column' 	=> false,
                'required' 		=> true,
                'unique' 		=> true
			),
		);
		
		//Add the fields to the streams
        $this->streams->fields->add_fields($categories_fields);
        $this->streams->fields->add_fields($galleries_fields);
		
		//All done
		return true;
	}
	
	/*
	 *	This function will remove the module from the site.
	 *	Will remove:
	 *		- Namespace
	 *		- drop table
	 *	The image will not be deleted so users can get them from the upload folder if needed
	 */
	public function uninstall()
	{
		//Remove streams
		$this->streams->utilities->remove_namespace('galleries');
		$this->streams->utilities->remove_namespace('galleries_categories');
				
		//Remove tables
		$this->dbforge->drop_table('galleries');
		$this->dbforge->drop_table('galleries_categories');
		
		//All done		
		return true;
	}
	
	/*
	 *	This function will manage all the upgrades such as a new field or whatever we need
	 */
	public function upgrade( $old_version )
	{
		return true;
	}
}
