<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

  <h3><?= $title ?></h3>

  <?php if( $this->session->msg ) : ?>
    <div class="alert <?= isset( $this->session->msg_class ) ? 'red' : '' ?>">
      <?= $this->session->msg ?>
    </div>
  <?php endif; ?>

  <form action="<?= base_url('login') ?>" method="POST">
    <input class="form-control mb-1" type="text" name="username" placeholder="Username" autocomplete="off" value="<?php echo set_value('username'); ?>">
    <?php echo form_error('username', '<div class="alert red">', '</div>'); ?>
    <input class="form-control mb-1" type="password" name="password" placeholder="Password">
    <?php echo form_error('password', '<div class="alert red">', '</div>'); ?>
    <button type="submit" name="button">Login</button>
  </form>

</body>
</html>
