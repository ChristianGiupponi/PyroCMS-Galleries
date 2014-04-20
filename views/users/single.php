<?php
	foreach( $gallery['entries'] as $g )
	{
		$name 	= $g['galleries_name'];
		$slug 	= $g['galleries_slug'];
		$text 	= $g['galleries_description'];
		
		$comments = $g['galleries_comments_enabled'];
		

		
		echo "<h1>$name</h1>";
		echo "<p>$text</p>";
		
		if( is_array($images) )
		{
			foreach( $images as $image )
			{
				echo "<img src='".base_url('files/thumb/'.$image->id)."'>";
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
			
				<?php if ($form_display): ?>
					<?php echo $this->comments->form() ?>
				<?php else: ?>
				<?php echo sprintf(lang('blog:disabled_after'), strtolower(lang('global:duration:'.str_replace(' ', '-', $post[0]['comments_enabled'])))) ?>
				<?php endif ?>
			</div>
<?php			
		}
	}
	
	
?>