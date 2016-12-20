<h3><?php echo empty($article->article_id) ? 'Add a new article' : 'Edit article ' . $article->title; ?></h3>
<?php echo validation_errors(); ?>
<?php
	if ($errors != NULL){
		echo $errors;
	}
?>
<?php echo form_open_multipart(); ?>
<table class="table">
	<tr>
		<td>Title</td>
		<?php
		$title_data = array(
			'class' => 'form-control',
			'name' => 'title',
			'id' => 'title',
			'value' => set_value('name', $article->title)
		);
		?>
		<td><?php echo form_input($title_data)?></td>
	</tr>
	<tr>
		<td>Image</td>
		<?php
		$image_data = array(
			'type' => 'file',
			'name' => 'article_image',
			'id' => 'article_image',
			'value' => set_value('name', $article->image_name)
		);
		?>
		<td><?php echo form_input($image_data)?></td>
	</tr>
	<tr>
		<td>Publication date</td>
		<?php
		$pubdate_data = array(
			'class' => 'form-control datepicker',
			'name' => 'pubdate',
			'id' => 'pubdate',
			'value' => set_value('name', $article->pubdate)
		);
		?>
		<td><?php echo form_input($pubdate_data)?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<?php
		$slug_data = array(
			'class' => 'form-control',
			'name' => 'slug',
			'id' => 'slug',
			'value' => set_value('name', $article->slug)
		);
		?>
		<td><?php echo form_input($slug_data)?></td>
	</tr>
	<tr>
		<td>Body</td>
		<td><?php echo form_textarea('body', set_value('body', strip_tags($article->body)), 'class="form-control"'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-block btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>

<script>
	$(function () {
		$('.datepicker').datepicker({ format : 'yyyy-mm-dd' })
	})
</script>