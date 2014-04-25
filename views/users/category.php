<h1><?php echo $category_name; ?></h1>
<?php
	
	if( $galleries['total'] > 0 )
	{
		foreach( $galleries['entries'] as $gallery )
		{
			$name 	= $gallery['galleries_name'];
			$slug 	= $gallery['galleries_slug'];
			$intro 	= $gallery['galleries_intro']; 
			$image  = $gallery['galleries_cover'];
			
			
			//	To see the option avaiable use:
			//  var_dump($gallery);
?>			
			<h1><a href="<?php echo site_url("galleries/show/".$slug); ?>"> <?php echo $name; ?></a></h1>
			<p><img src="<?php echo site_url("files/thumb/".$image); ?>"></p>
			<p><?php echo $intro; ?></p>
<?php
		}
	}
	else
	{
		echo lang("galleries:view:index:no_data");
	}
	
?>