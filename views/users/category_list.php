<?php
	
	if( $categories['total'] > 0 )
	{
		foreach( $categories['entries'] as $category )
		{
			$name 	= $category['galleries_categories_name'];
			$slug 	= $category['galleries_categories_slug'];
			
			
			//	To see the option avaiable use:
			//  var_dump($category);
?>			
			<h1><a href="<?php echo site_url("galleries/category/".$slug); ?>"> <?php echo $name; ?></a></h1>
<?php
		}
	}
	else
	{
		echo lang("galleries:view:index:no_data");
	}
	
?>