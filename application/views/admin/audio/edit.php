<h3><?php echo empty($audio->audio_id) ? 'Add a new audio' : 'Edit audio ' . $audio->title; ?></h3>
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
			'value' => set_value('name', $audio->title)
		);
		?>
		<td><?php echo form_input($title_data)?></td>
	</tr>
	<tr>
		<td>Artist</td>
		<?php
		$artist_data = array(
			'class' => 'form-control',
			'name' => 'artist',
			'id' => 'artist',
			'value' => set_value('name', $audio->artist)
		);
		?>
		<td><?php echo form_input($artist_data)?></td>
	</tr>

	<tr>
		<td>audio</td>
		<?php
		$audio_data = array(
			'type' => 'file',
			'name' => 'audio',
			'id' => 'audio',
			'value' => set_value('name', $audio->location)
		);
		?>
		<td><?php echo form_input($audio_data)?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn  btn-block btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>

<script>
	$(function () {
		$('.datepicker').datepicker({ format : 'yyyy-mm-dd' })
	})
</script>