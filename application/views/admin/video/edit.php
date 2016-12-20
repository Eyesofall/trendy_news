<h3><?php echo empty($video->video_id) ? 'Add a new video' : 'Edit video ' . $video->title; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Title</td>
		<?php
		$title_data = array(
			'class' => 'form-control',
			'name' => 'title',
			'id' => 'title',
			'value' => set_value('name', $video->title)
		);
		?>
		<td><?php echo form_input($title_data)?></td>
	</tr>
	<tr>
		<td>Youtube URL</td>
		<?php
		$url_data = array(
			'class' => 'form-control',
			'name' => 'youtube_url',
			'id' => 'youtube_url',
			'value' => set_value('name', $video->youtube_id)
		);
		?>
		<td><?php echo form_input($url_data)?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<?php
		$slug_data = array(
			'class' => 'form-control',
			'name' => 'slug',
			'id' => 'slug',
			'value' => set_value('name', $video->slug)
		);
		?>
		<td><?php echo form_input($slug_data)?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn  btn-block btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
