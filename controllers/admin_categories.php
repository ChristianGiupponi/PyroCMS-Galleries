<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 * @author      Christian Giupponi STILOGO
 * @link		http://www.stilogo.it
 * @package 	PyroCMS
 * @subpackage  Galleries
 * @category	module
 */

class Admin_Categories extends Admin_Controller
{
	protected $section = "categories";
	
	function __construct()
	{
		parent::__construct();
		
		//Load language
		$this->lang->load('galleries/galleries');
		
		//Load Streams
		$this->load->driver('Streams');	
	}
	
	/*
	 *	This function will show the categories list.
	 *	I don't like the default Streams view, I prefer use a custom one
	 *	and decide what and how show entries.
	 */
	function index()
	{
		/*
		 *	Prepare the Streams params.
		 *	We don't care about who create what.
		 *	Event if I don't think that users will create so many categories
		 *	I prefer paginate it
		 */
		$params = array(
        	'stream' 		=> 'galleries_categories',
            'namespace' 	=> 'galleries_categories',
            'paginate' 		=> 'yes',
            'limit' 		=> 10,
            'pag_segment' 	=> 5,
            'disable'		=> 'created_by'
        );
        
        //Get all the entries based on $params
        $categories = $this->streams->entries->get_entries($params);

		//Build the custom template
		$this->template
						->set('categories', $categories)
						->build('admin/categories/index');
	}
	
	/*
	 *	This has a double function:
	 *		- If the ID is NULL it means that we need to create a new entry
	 *		  so we will show the create form
	 *		- If ID is set we need to show the edit form
	 */
	function create( $id = NULL )
	{
		//Check if we have an ID
		if( $id == NULL )
		{
			//If we have the ID we need to prepare the stream to insert a new entry
			$method 			= "new";
			$success_message 	= lang('galleries:categories:new:success');
			$failure_message 	= lang('galleries:categories:new:failure');
			$form_title 		= lang('galleries:categories:new:title');
		}
		else
		{
			//We need to update an existing entry
			$method 			= "edit";
			$success_message 	= lang('galleries:categories:edit:success');
			$failure_message 	= lang('galleries:categories:edit:failure');
			$form_title 		= lang('galleries:categories:edit:title');
		}
		
		//Create the extra field to pass to the entry_form
		$extra = array(
			'return' 			=> 'admin/galleries/categories/index',
			'success_message' 	=> $success_message,
			'failure_message' 	=> $failure_message,
			'title' 			=> $form_title
		);
		
		//We use the Streams built in form
		$this->streams->cp->entry_form('galleries_categories', 'galleries_categories', $method, $id, true, $extra, $skips = array());
	}
	
	/*
	 *	This function is between the categories list and the delete function.
	 *	In this way we can check if one or more galleries are connected to this category.
	 *	If we find one or more galleries will show a user a confirmation page and let's inform
	 *	that all the galleries (not the images) will be removed.
	 */
	function confirm_delete( $id , $slug )
	{
		//Check if the ID is numeri. If not show error
		if( ! is_numeric($id) )
		{
			$this->session->set_flashdata('error', lang('galleries:error:no_numeric'));
			redirect('admin/galleries/categories/index');
		}		
		
		//Prepare the DB call
		$params = array(
        	'stream' 		=> 'galleries',
            'namespace' 	=> 'galleries',
			'where'			=> "`galleries_category` = '$id'"
        );
        
        //Get all the entries based on $params
        $galleries = $this->streams->entries->get_entries($params);
        
        
        //Check the total
        if( $galleries['total'] > 0 )
        {
	        //We have some galleries connected to this category
	        //So display a new view
	        $this->template
	        				->set('category_id', $id)
	        				->set('category_slug' , $slug)
	        				->set('total', $galleries['total'])
	        				->build('admin/categories/confirm');
	        				
        }
        else
        {
        	//We can safetly delete the cateogry
	        $this->delete($id, 0, $slug);
        }
	}
	
	/*
	 *	This function will delete the category referenced by the id
	 *	and will also delete all the galleries associated to it.
	 *	Users can arrives here in two ways:
	 *		- Frome the confirm_delete function
	 *		- Directly from the confirm view
	 *	So I prefer check again if the id is numeric just to be sure.
	 *
	 */
	function delete( $id , $total , $slug )
	{
		//Check if is numeric
		if( ! is_numeric($id) || ! is_numeric($total) )
		{
			$this->session->set_flashdata('error', lang('galleries:error:no_numeric'));
			redirect('admin/galleries/categories/index');
		}
		
		//Check if we need to remove any gallery
		if( $total > 0 )
		{
			//Load model
			$this->load->model('galleries_m');
			
			//Delete all the galleries
			$delete_gall_result = $this->galleries_m->delete_galleries_by_category($id);
		}
		
		//Delete the category
		$delete_cat_result = $this->streams->entries->delete_entry($id, 'galleries_categories', 'galleries_categories');
		
		
		if( $delete_cat_result )
		{
			$message 	= sprintf(lang('galleries:categories:delete:success') , $slug, $total);
			$type 		= "success";
			
		}
		else
		{
			$message 	= sprintf(lang('galleries:categories:delete:failure') , $slug, $total);
			$type 		= "error";
		}
		
		$this->session->set_flashdata($type, $message);
		redirect('admin/galleries/categories/index');
	}
}