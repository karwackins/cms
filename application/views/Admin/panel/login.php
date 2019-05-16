<?php echo validation_errors(); ?>
<?php echo form_open('http://cms.local/admin/cPanel/login'); ?>
<table>
    <tr>
        <td>Email</td>
        <td><?php echo form_input('email'); ?></td>
    </tr>
    <tr>
        <td>Hasło</td>
        <td><?php echo form_input('password'); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_submit('submit', 'Zaloguj'); ?></td>
    </tr>
</table>

<?php echo form_close(); ?>

