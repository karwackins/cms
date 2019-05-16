<?php // TODO: zmienic site_url z konfiguracji bo kieruje na 127.0.0.1
echo anchor(site_url(), 'Strona główna '); ?>
<?php if($loggedin): ?>
<?php echo anchor('http://cms.local/admin/cPanel', 'Panel Administracyjny');?>
<?php echo anchor('http://cms.local/admin/cUser', 'Użytkownicy');?>
<?php echo anchor('http://cms.local/admin/cPanel/logout', 'Wyloguj');?>
<?php else: ?>
    <?php echo anchor('http://cms.local/admin/cPanel/login', 'Zaloguj');?>
<?php endif; ?>

