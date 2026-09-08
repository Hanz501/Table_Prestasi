<?php echo $this->extend('layouts/main') ?>

<?php echo $this->section('content'); ?>

<h1>Register</h1>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<?php if (service('validation')->getErrors()): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo service('validation')->listErrors() ?>
    </div>
<?php endif; ?>

<form method="post" action="<?php echo site_url('register'); ?>" style="maxwidth:480px;">
    <?php echo csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo set_value('name') ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo set_value('username') ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password">
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
    <a class="btn btn-secondary" href="<?php echo site_url('login'); ?>">Sudah punya akun? Login</a>
</form>

<?php echo $this->endSection(); ?>