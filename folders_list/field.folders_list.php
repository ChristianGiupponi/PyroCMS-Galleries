<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 * @author      Christian Giupponi STILOGO
 * @link		http://www.stilogo.it
 * @package 	PyroCMS
 * @subpackage  Galleries
 * @category	Field type
 */

class Field_folders_list
{
	public $field_type_name		= 'Folders List';

	public $field_type_slug		= 'folder_list';
		
	public $custom_parameters 	= array('parent');
	
	public $db_col_type			= 'int';
	
	public $alt_process			= false;
	
	public $version				= '1.0';
	
	public $author				= array('name'=>'Christian Giupponi', 'url'=>'http://www.stilogo.it');
	
	public $input_is_file 		= false;
	
	//Output
	public function form_output($params , $entry_id, $field)
	{
		$this->CI->load->library('files/files');
		
		$parent = $field->field_data['parent'];
		
		$this->CI->db->select('id,name');
		$this->CI->db->from('file_folders');
		$this->CI->db->where('parent_id', $parent);
		$folders = $this->CI->db->get();
		
		$array[''] = lang('global:select-none');
		
		foreach($folders->result() as $folder)
		{
			$array[$folder->id] = $folder->name;
		}
		
		return form_dropdown($params['form_slug'], $array, $params['value']);
	}
	
	public function param_parent( $value = 0 )
	{
		return form_input('parent' , $value);
	}
}