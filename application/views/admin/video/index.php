<section>
	<h2>Embedded Videos</h2>
	<?php echo anchor('admin/video/edit', '<i class="glyphicon glyphicon-plus"></i> Add a video'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Youtube ID</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($videos)): foreach($videos as $video): ?>	
		<tr>
			<td><?php echo anchor('admin/video/edit/' . $video->video_id, $video->title); ?></td>
			<td><?php echo $video->youtube_id; ?></td>
			<td><?php echo btn_edit('admin/video/edit/' . $video->video_id); ?></td>
			<td><?php echo btn_delete('admin/video/delete/' . $video->video_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td>We could not find any videos.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>