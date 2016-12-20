<section>
	<h2>Audio files</h2>
	<?php echo anchor('admin/audio/edit', '<i class="glyphicon glyphicon-plus"></i> Upload an audio'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Artist</th>
				<th>Location</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($audios)): foreach($audios as $audio): ?>	
		<tr>
			<td><?php echo anchor('admin/audio/edit/' . $audio->audio_id, $audio->title); ?></td>
			<td><?php echo $audio->artist; ?></td>
			<td><?php echo $audio->location; ?></td>
			<td><?php echo btn_edit('admin/audio/edit/' . $audio->audio_id); ?></td>
			<td><?php echo btn_delete('admin/audio/delete/' . $audio->audio_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td>We could not find any audios.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>