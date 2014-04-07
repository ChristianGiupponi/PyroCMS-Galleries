<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 * @author      Christian Giupponi STILOGO
 * @link		http://www.stilogo.it
 * @package 	PyroCMS
 * @subpackage  Galleries
 * @category	module
 */

class Galleries_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();		
	}
	
	public function count_galleries_by_category_id( $id )
	{
		$this->db->where('galleries_category', $id);
		return $this->db->count_all_result('galleries');
	}
	
	public function delete_galleries_by_category( $id )
	{
		$this->db->where('galleries_category', $id);
		return $this->db->delete('galleries');
	}
	
	public function get_images_by_folder_id( $id )
	{
		$this->db->select('*');
		$this->db->from('files');
		$this->db->where('folder_id', $id);
		$query = $this->db->get();
		
		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		
		return 0;
	}
}