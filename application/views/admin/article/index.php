<section>
	<h2>News articles</h2>
	<?php echo anchor('admin/article/edit', '<i class="glyphicon glyphicon-plus"></i> Add an article'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Publication date</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($articles)): foreach($articles as $article): ?>	
		<tr>
			<td><?php echo anchor('admin/article/edit/' . $article->article_id, $article->title); ?></td>
			<td><?php echo $article->pubdate; ?></td>
			<td><?php echo btn_edit('admin/article/edit/' . $article->article_id); ?></td>
			<td><?php echo btn_delete('admin/article/delete/' . $article->article_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td>We could not find any articles.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>