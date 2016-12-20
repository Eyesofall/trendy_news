<h3><?php echo empty($page->page_id) ? 'Add a new page' : 'Edit page ' . $page->title; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Parent</td>
		<td><?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id, 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>Template</td>
		<td><?php echo form_dropdown('template', array('page' => 'page', 'news_archive' => 'News archive', 'homepage' => 'Homepage', 'audio' => 'Audio', 'video' => 'Video'), $this->input->post('template') ? $this->input->post('template') : $page->template, 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td>Title</td>
		<?php
		$title_data = array(
			'class' => 'form-control',
			'name' => 'title',
			'id' => 'title',
			'value' => set_value('name', $page->title)
		);
		?>
		<td><?php echo form_input($title_data)?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<?php
		$slug_data = array(
			'class' => 'form-control',
			'name' => 'slug',
			'id' => 'slug',
			'value' => set_value('name', $page->slug)
		);
		?>
		<td><?php echo form_input($slug_data)?></td>
	</tr>
	<tr>
		<td>Body</td>
		<td><?php echo form_textarea('body', set_value('body', strip_tags($page->body)), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn  btn-block btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
