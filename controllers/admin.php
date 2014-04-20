<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 * @author      Christian Giupponi STILOGO
 * @link		http://www.stilogo.it
 * @package 	PyroCMS
 * @subpackage  Galleries
 * @category	module
 */

class Admin extends Admin_Controller
{
	protected $section = "galleries";
	
	function __construct()
	{
		parent::__construct();
		
		//Load lang
		$this->lang->load('galleries/galleries');
	}
	
	function index()
	{
		//There are any filter to use?
		$category     = $this->input->post('f_category');
		$gallery_name = ( $this->input->post('f_gallery_name') != "" ) ? $this->input->post('f_gallery_name') : "";
		
		/*
		 *	Prepare the Streams params.
		 *	We don't care about who create what.
		 *	We also required the pagination in case users 
		 *	creates many galleries
		 */
		$params = array(
        	'stream' 		=> 'galleries',
            'namespace' 	=> 'galleries',
            'paginate' 		=> 'yes',
            'limit' 		=> 10,
            'pag_segment' 	=> 4,
            'disable'		=> 'created_by'
        );
        
        //Default value
        $where = false;
        
        //Check if we have any category filter to consider
        if( $category != 0 )
        {
	        $where = "`rel_galleries_category`.`id` = '$category'";
        }
        
        //check if we have any name filter
        if( $gallery_name != "" )
        {
	        //We have the category filter?
	        if( $category != 0 )
	        {
		        //Yes we have, so we need to attach it to the previous one
		        $where .= " AND `galleries_name` LIKE '%$gallery_name%'";
	        }
	        else
	        {
	        	//We have only the name
		        $where = "`galleries_name` LIKE '%$gallery_name%'";
	        }
        }
        
        //We have something to filter?
        if( $where )
        {
	        $params['where'] = $where;   
        }        
        
        //Get all the entries based on $params
        $galleries = $this->streams->entries->get_entries($params);
        
        /*
		 *	Prepare the Streams params.
		 *	We don't care about who create what.
		 *	We also required the pagination in case users 
		 *	creates many galleries
		 */
        $params_category = array(
        	'stream' 		=> 'galleries_categories',
            'namespace' 	=> 'galleries_categories',
            'paginate' 		=> 'yes',
            'limit' 		=> 10,
            'pag_segment' 	=> 5,
            'disable'		=> 'created_by'
        );
        
        //Get all the entries based on $params
        $categories = $this->streams->entries->get_entries($params_category);
        
        //do we need to unset the layout because the request is ajax?
		$this->input->is_ajax_request() ? $this->template->set_layout(FALSE) : '';
        
        //Set the template fields
		$this->template
						->append_js('admin/filter.js')
						->set('categories', $categories)
						->set('galleries' , $galleries);
		
		//Load the view based on the request type
		$this->input->is_ajax_request() 
								? $this->template->build('admin/galleries/filter')
								: $this->template->build('admin/galleries/index');
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
			$success_message 	= lang('galleries:new:success');
			$failure_message 	= lang('galleries:new:failure');
			$form_title 		= lang('galleries:new:title');
		}
		else
		{
			//We need to update an existing entry
			$method 			= "edit";
			$success_message 	= lang('galleries:edit:success');
			$failure_message 	= lang('galleries:edit:failure');
			$form_title 		= lang('galleries:edit:title');
		}
		
		//Create the extra field to pass to the entry_form
		$extra = array(
			'return' 			=> 'admin/galleries/index',
			'success_message' 	=> $success_message,
			'failure_message' 	=> $failure_message,
			'title' 			=> $form_title
		);
		
		//No fields to skips
		$skips = array();
		
		//Let's divide fields in tabs to keep a clean UI
		$tabs = array(
			array(
				'title' 	=> lang("galleries:tabs:general"),
				'id' 		=> "general",
				'fields' 	=> array('galleries_name', 'galleries_slug' , 'galleries_category', 'galleries_folder', 'galleries_cover')
			),
			array(
				'title' 	=> lang("galleries:tabs:text"),
				'id' 		=> "text",
				'fields' 	=> array('galleries_intro', 'galleries_description')
			),			
			array(
				'title' 	=> lang("galleries:tabs:extra"),
				'id' 		=> "extra",
				'fields' 	=> array('galleries_is_published','galleries_comments_enabled')
			),			
			array(
				'title' 	=> lang("galleries:tabs:seo"),
				'id' 		=> "seo",
				'fields' 	=> array('galleries_seo_title','galleries_seo_keywords', 'galleries_seo_description')
			),
		);
		
		//Add js and css
		$this->template
						->append_css('module::image-picker.css')
						->append_js('module::image-picker.js')
						->append_js('module::galleries_admin.js');
		
		//We use the Streams built in form
		$this->streams->cp->entry_form('galleries', 'galleries', $method, $id, true, $extra, $skips, $tabs);
	}
	
	/*
	 *	This function will delete the selected Gallery.
	 *	We do not delete the images so users an get them in the file module or via ssh/ftp
	 */
	function delete( $id , $slug )
	{
		//Check if is numeric
		if( ! is_numeric($id) )
		{
			$this->session->set_flashdata('error', lang('galleries:error:no_numeric'));
			redirect('admin/galleries/index');
			exit;
		}
		
		//Try to remove the entry
		if( $this->streams->entries->delete_entry($id, 'galleries', 'galleries') )
		{
			$message 	= sprintf(lang('galleries:delete:success') , $slug);
			$type 		= "success";
			
		}
		else
		{
			$message 	= sprintf(lang('galleries:delete:failure') , $slug);
			$type 		= "error";
		}
		
		//Message and redirect
		$this->session->set_flashdata($type, $message);
		
		//Go back
		redirect('admin/galleries/index');
	}
	
	function create_cover()
	{
		if( ! $this->input->is_ajax_request() )
		{
			$result = array(
				'status' => false,
				'msg' => "cannot handle this request"
			);
			echo json_encode($result);
			exit;
		}
		
		//Get the folder id
		$folder_id = $this->input->post('folder_id');
		$cover_id = ( $this->input->post('cover_id') != "" ) ? $this->input->post('cover_id') : "";
		
		$this->db->select('id, name');
		$this->db->from('files');
		$this->db->where('folder_id', $folder_id);
		$query = $this->db->get();
		
		if( $query->num_rows() > 0 )
		{
			$str = "<select class=\"image-picker\" name=\"image_picker_select\">";
			$str .="<option value=\"\"></option>";						
			
			foreach( $query->result() as $img )
			{
				$selected = "";
				
				$url    = site_url('files/thumb/'.$img->id);
				$id     = $img->id;
				$name   = $img->name;
				
				if( $id == $cover_id )
				{
					$selected = "selected";
				}
				
				$str .= "<option data-img-src=\"$url\" value=\"$id\" $selected>$name</option>";
			}
			
			$str .= "</select>";			
			
			$result = array(
				'status' => true,
				'msg' => $str
			);
		}
		else
		{
			$result = array(
				'status' => false,
				'msg' => "Non ci sono immagini"
			);
		}
		
		echo json_encode($result);
		exit;
	}
}