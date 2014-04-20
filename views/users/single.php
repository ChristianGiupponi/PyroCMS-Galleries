<?php
	foreach( $gallery['entries'] as $g )
	{
		$name 	= $g['galleries_name'];
		$slug 	= $g['galleries_slug'];
		$text 	= $g['galleries_description'];
		
		$comments = $g['galleries_comments_enabled']['key'];
		

		
		echo "<h1>$name</h1>";
		echo "<p>$text</p>";
		
		if( is_array($images) )
		{
			foreach( $images as $image )
			{
				echo "<img src='".site_url('files/thumb/'.$image->id)."'>";
			}
		}
		else
		{
			echo "No images";
		}
		
		if( $comments == "yes" )
		{
?>
			<div id="comments">
				<div id="existing-comments">
					<h4><?php echo lang('comments:title') ?></h4>
					<?php echo $this->comments->display() ?>
				</div>
			
				
					<?php echo $this->comments->form() ?>
				
			</div>
<?php			
		}
	}
	
	
?>