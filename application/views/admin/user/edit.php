<div class="modal-header">
    <h3><?php echo empty($user->user_id) ? 'Add a new user' : 'Edit user: ' . $user->name ?></h3>
</div>
<div class="modal-body">
    <?php echo validation_errors();?>
    <?php echo form_open()?>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <td>Name</td>
                <?php
                $name_data = array(
                    'class' => 'form-control',
                    'name' => 'name',
                    'id' => 'name',
                    'value' => set_value('name', $user->name)
                );
                ?>
                <td><?php echo form_input($name_data)?></td>
            </tr>
            <tr>
                <td>Email</td>
                <?php
                $email_data = array(
                    'class' => 'form-control',
                    'name' => 'email',
                    'id' => 'email',
                    'value' => set_value('email', $user->email)
                );
                ?>
                <td><?php echo form_input($email_data)?></td>
            </tr>
            <tr>
                <td>Password</td>
                <?php
                $password_data = array(
                    'class' => 'form-control',
                    'name' => 'password',
                    'id' => 'password',
                    'type' => 'password',
                    'value' => set_value('password')
                );
                ?>
                <td><?php echo form_input($password_data)?></td>
            </tr>
            <tr>
                <td>Confirm password</td>
                <?php
                $confirm_password_data = array(
                    'class' => 'form-control',
                    'name' => 'password_confirm',
                    'id' => 'password_confirm',
                    'type' => 'password',
                    'value' => set_value('password_confirm')
                );
                ?>
                <td><?php echo form_input($confirm_password_data)?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo form_submit('submit', 'save', 'class="btn btn-block btn-primary"')?></td>
            </tr>
        </table>
    </div>

    <?php echo form_close()?>

</div>

