<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 * @author      Christian Giupponi STILOGO
 * @link		http://www.stilogo.it
 * @package 	PyroCMS
 * @subpackage  Galleries
 * @category	module
 */

//Sections 
$lang['galleries:shortcuts:galleries'] 	= "Galleries";
$lang['galleries:shortcuts:categories'] = "Categories";

//Shortcuts
$lang['galleries:shortcuts:categories:create']  = "Create Category";
$lang['galleries:shortcuts:create']				= "Create Gallery";

//Stream
$lang['galleries:streams:galleries:name'] 			= "Galleries";
$lang['galleries:streams:galleries:description'] 	= "Create and Manage photo Galleries.";
$lang['galleries:streams:categories:name'] 			= "Categories";
$lang['galleries:streams:categories:description'] 	= "Create and manage Categories for Galleries Module";

//Folder
$lang['galleries:folder:name'] = "Galleries Folder";

//Install - Fields
$lang['galleries:fields:name'] 				= "Name";
$lang['galleries:fields:slug'] 				= "Slug";
$lang['galleries:fields:description'] 		= "Description";
$lang['galleries:fields:category'] 			= "Category";
$lang['galleries:fields:enable_comments'] 	= "Comments";
$lang['galleries:fields:published']			= "Puslish";
$lang['galleries:fields:folder']			= "Folder";
$lang['galleries:fields:cover']				= "Cover";
$lang['galleries:fields:intro']				= "Intro";
$lang['galleries:fields:seo_title']			= "Title";
$lang['galleries:fields:seo_keywords'] 		= "Keywords";
$lang['galleries:fields:seo_description']	= "Description";

//Install - Fields - Instructions
$lang['galleries:fields:instr:name'] 			= "Insert the Gallery name.";
$lang['galleries:fields:instr:slug'] 			= "Automatic Field. Gallery link.";
$lang['galleries:fields:instr:description'] 	= "Full Gallery description.";
$lang['galleries:fields:instr:category'] 		= "Choose the Cateogry.";
$lang['galleries:fields:instr:enable_comments'] = "Do you want to enable comments?";
$lang['galleries:fields:instr:folder']			= "From which folder do you want to get images?";
$lang['galleries:fields:instr:published']		= "To you want to publish the gallery?";
$lang['galleries:fields:instr:intro']			= "Short introduction of the gallery.";
$lang['galleries:fields:instr:seo_title']		= "Insert the SEO title.";
$lang['galleries:fields:instr:seo_keywords']	= "Insert the SEO keywords.";
$lang['galleries:fields:instr:seo_description']	= "Insert the SEO description.";
$lang['galleries:fields:instr:cover']			= "Choose a cover image.";


//Install - Fields - Categories
$lang['galleries:categories:fields:name'] = "Nome";
$lang['galleries:categories:fields:slug'] = "Slug";

//Install - Fields - Categories - Instructions
$lang['galleries:categories:fields:instr:name'] = "Insert the Category name.";
$lang['galleries:categories:fields:instr:slug'] = "Automatic Field. Category link.";


//Categories - Session
$lang['galleries:categories:new:success'] 		= "The Category has been created successfully.";
$lang['galleries:categories:new:failure'] 		= "An error occoured during the creation of the Category.";
$lang['galleries:categories:new:title'] 		= "New Category";
$lang['galleries:categories:edit:success'] 		= "The Category has been edited successfully.";
$lang['galleries:categories:edit:failure'] 		= "An error occoured during the edit of the Category.";
$lang['galleries:categories:edit:title'] 		= "Edit Category";
$lang['galleries:categories:delete:failure'] 	= "An error accoured during the delete process of the '%s' Category and the %d associated galleries.";
$lang['galleries:categories:delete:success'] 	= "The '%s' Category and the %d associated Galleries has been deleted.";

//Galleries - Session
$lang['galleries:new:success'] 		= "The Gallery has been created successfully.";
$lang['galleries:new:failure'] 		= "An error occoured during the creation of the Gallery.";
$lang['galleries:new:title'] 		= "New Gallery";
$lang['galleries:edit:success'] 	= "The Gallery has been edited successfully.";
$lang['galleries:edit:failure'] 	= "An error occoured during the edit of the Gallery.";
$lang['galleries:edit:title'] 		= "Edit Gallery";
$lang['galleries:delete:failure'] 	= "An error occoured during the delete process of the '%s' galelry";
$lang['galleries:delete:success'] 	= "The '%s' Gallery has been delete.";


//Categories - View - Index
$lang['galleries:view:categories:index:title']	 = "Categories List";
$lang['galleries:view:categories:index:no_data'] = "There are no Category. <a href=\"admin/galleries/categories/create\">Add one</a>.";

//Galleries - View - Index
$lang['galleries:view:index:title']	 = "Galleries List";
$lang['galleries:view:index:no_data'] = "There are no Galleries. <a href=\"admin/galleries/create\">Add one</a>.";


//Categories - View - Confirm
$lang['galleries:view:categories:confirm:title'] 	= "Attention!";
$lang['galleries:view:categories:confirm:text'] 	= "There are <b>'%s'</b> Galleries associated to the <b>'%s'</b> category, are you sure you want to proced? All the associated Galleries will be deleted!<br><br>";

//Delete message
$lang['galleries:view:categories:index:delete:popup'] = "Are you sure you want to delete the category? This cannot be undone.";
$lang['galleries:view:index:delete:popup'] = "Are you sure you want to delete the category? This cannot be undone.";

//Error messages
$lang['galleries:error:no_numeric'] = "Not numeric ID";

//Tabs
$lang['galleries:tabs:general'] = "General";
$lang['galleries:tabs:text'] = "Text";
$lang['galleries:tabs:extra'] = "Extra";
$lang['galleries:tabs:seo'] = "SEO";
