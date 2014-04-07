<section class="title">
	<h4><?php echo lang('galleries:view:categories:confirm:title'); ?></h4>
</section>
<section class="item">
	<div class="content">
		<?php  
				echo sprintf(lang('galleries:view:categories:confirm:text'), $total, $category_slug); 
				echo
					anchor('admin/galleries/categories/index', lang('cancel_label'), 'class="btn orange"').' '.
					anchor('admin/galleries/categories/delete/'.$category_id.'/'.$total.'/'.$category_slug, lang('global:delete'), 'class="btn red"');
		?>
	</div>
</section>