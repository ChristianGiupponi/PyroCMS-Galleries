<section class="title">
	<h4><?php echo lang('galleries:view:categories:index:title'); ?></h4>
</section>
<section class="item">
	<div class="content">
			<?php
				//Check if we have something to show 
				if( $categories['total'] > 0 )
				{ 
			?>
					<table>
						<tr>
							<th><?php echo lang('galleries:categories:fields:name'); ?></th>	
							<th><?php echo lang('global:action'); ?></th>		
						</tr>
				<?php
						foreach( $categories['entries'] as $category )
						{
							$id 	= $category['id'];
							$name 	= $category['galleries_categories_name'];
							$slug	= $category['galleries_categories_slug'];
				?>
							<tr>
								<td>
									<?php echo $name; ?>
								</td>
								<td class="actions">
									<?php 
										echo
										      anchor('admin/galleries/categories/create/'.$id, lang('global:edit'), 'class="btn orange"').' '.
										      anchor('admin/galleries/categories/confirm_delete/'.$id.'/'.$slug, lang('global:delete'), 'class="confirm btn red" title="'.lang('galleries:view:categories:index:delete:popup').'"');
								    ?>
								</td>
							</tr>
			
				<?php
						}//end foreach	
				?>
				
					</table>				
				
			<?php
				} //Endif	
				else
				{
					echo "<div class=\"no_data\">".lang('galleries:view:categories:index:no_data')."</div>";
				}
			?>

	</div>
</section>