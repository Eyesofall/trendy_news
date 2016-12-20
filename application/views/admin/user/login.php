<div class="modal-content form-signin">
    <div class="modal-header">
        <h3 class="form-signin-heading">Login</h3>
        <p>Please login using your credentials</p>
    </div>
    <div class="modal-body">
        <?php echo validation_errors();?>

        <?php echo form_open()?>
        <table class="table">
            <tr>
                <td>Email</td>
                <?php
                $email_data = array(
                    'class' => 'form-control',
                    'name' => 'email',
                    'id' => 'email',
                    'value' => set_value('email')
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
                <td></td>
                <td><?php echo form_submit('submit', 'login', 'class="btn btn-block btn-primary"')?></td>
            </tr>
        </table>

        <?php echo form_close()?>

    </div>

    <div class="modal-footer">
        &copy; <?=$meta_title; ?>
    </div>
</div>

