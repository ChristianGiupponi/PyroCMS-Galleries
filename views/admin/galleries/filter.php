<div id="filter-stage">
	<?php if( $galleries['total'] > 0): ?>
		<table>
			<thead>
					<tr>
						<th><?php echo lang('galleries:fields:cover'); ?></th>
						<th><?php echo lang('galleries:fields:name'); ?></th>
						<th><?php echo lang('galleries:fields:category'); ?></th>
						<th><?php echo lang('galleries:fields:enable_comments'); ?></th>
						<th><?php echo lang('galleries:fields:published'); ?></th>
						<th><?php echo lang('ticket:global:actions'); ?></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="6">
							<div class="inner"><?php $this->load->view('admin/partials/pagination'); ?></div>
						</td>
					</tr>
				</tfoot>
				<tbody>
				<?php 
					foreach($galleries['entries'] as $gallery): 
					
						$id 		= $gallery['id'];
						$name		= $gallery['galleries_name'];
						$slug		= $gallery['galleries_slug'];
						$category 	= $gallery['galleries_category']['galleries_categories_name'];
						$comments 	= $gallery['galleries_comments_enabled']['key'];
						$published 	= $gallery['galleries_is_published']['key'];
						$cover		= $gallery['galleries_cover'];

				?>
					<tr>
						<td><img src="<?php echo site_url('files/thumb/'.$cover); ?>" alt=""></td>
						<td><?php echo $name; ?></td>
						<td><?php echo ( $category != ""	 ) ? $category : "N/D"; ?></td>
						<td><?php echo ( $comments == "yes"	 ) ? lang('global:yes') : lang('global:no'); ?></td>
						<td><?php echo ( $published == "yes" ) ? lang('global:yes') : lang('global:no'); ?></td>
						<td>
							<?php 
								echo
								      anchor('admin/galleries/create/'.$id, lang('global:edit'), 'class="btn orange"').' '.
								      anchor('admin/galleries/confirm_delete/'.$id.'/'.$slug, lang('global:delete'), 'class="confirm btn red" title="'.lang('galleries:view:categories:index:delete:popup').'"');
						    ?>						
						</td>
					</tr>		
				<?php endforeach; ?>
				</tbody>
			</table>	
	<?php else: ?>
		<div class="no_data"><?php echo lang('galleries:view:index:no_data'); ?></div>
	<?php endif; ?>

</div>