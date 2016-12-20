
<section>

    <h2 class="sub-header">Users</h2>
    <?php echo anchor('admin/user/edit', '<i class="glyphicon glyphicon-plus"></i> Add a user'); ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($users)): foreach ($users as $user):?>
                <tr>
                    <td><?php echo anchor('admin/user/edit/'. $user->user_id, $user->email) ?></td>
                    <td><?php echo btn_edit('admin/user/edit/'. $user->user_id) ?></td>
                    <td><?php echo btn_delete('admin/user/delete/'. $user->user_id) ?></td>
                </tr>
            <?php endforeach;?>
            <?php else: ?>
                <tr>
                    <td>No users where found.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>