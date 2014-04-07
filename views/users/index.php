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
			
			echo "<h1><a href=\"".base_url()."galleries/show/$slug\">$name</a></h1>";
			echo "<p><img src=\"".base_url()."files/thumb/$image\"></p>";
			echo "<p>$intro</p>";
		}
	}
	else
	{
		echo lang("galleries:view:index:no_data");
	}
	
?>