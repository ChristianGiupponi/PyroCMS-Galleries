<?php

	$array_cat = array();

	//Fetch the category to create the dropdown for filters
	if( $categories['total'] > 0 )
	{
		$array_cat[0] = lang('global:select-all');
		foreach( $categories['entries'] as $category )
		{
			$array_cat[$category['id']] = $category['galleries_categories_name'];
		}
	}
?>

<section class="title">
	<h4><?php echo lang('galleries:view:index:title'); ?></h4>
</section>
<section class="item">
	<div class="content">
	
	<fieldset id="filters">
			<legend><?php echo lang('global:filters'); ?></legend>
				<?php echo form_open(); ?>
					<?php echo form_hidden('f_module', $module_details['slug']); ?>
					<ul>
						<li>
							<label><?php echo lang('galleries:fields:category'); ?></label>
							<?php echo form_dropdown('f_category', $array_cat ); ?>
						</li>	
						<li>
							<label><?php echo lang('galleries:fields:name'); ?></label>
							<input type="text" name="f_gallery_name" style="width: 300px;">
						</li>				
					</ul>
				<?php echo form_close(); ?>
		</fieldset>
	
		<div id="filter-stage">
		
		</div>
	</div>
</section>