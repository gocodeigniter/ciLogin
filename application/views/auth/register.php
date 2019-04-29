<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

  <h3><?= $title ?></h3>

  <form action="<?= base_url('register') ?>" method="POST">
    <input class="form-control mb-1" type="text" name="name" placeholder="Name" autocomplete="off" value="<?php echo set_value('name'); ?>">
    <?php echo form_error('name', '<div class="alert red">', '</div>'); ?>
    <input class="form-control mb-1" type="text" name="username" placeholder="Username" autocomplete="off" value="<?php echo set_value('username'); ?>">
    <?php echo form_error('username', '<div class="alert red">', '</div>'); ?>
    <input class="form-control mb-1" type="password" name="password" placeholder="Password">
    <?php echo form_error('password', '<div class="alert red">', '</div>'); ?>
    <input class="form-control mb-1" type="password" name="confpassword" placeholder="Confirm Password">
    <?php echo form_error('confpassword', '<div class="alert red">', '</div>'); ?>
    <button type="submit" name="button">Register</button>
  </form>

</body>
</html>
