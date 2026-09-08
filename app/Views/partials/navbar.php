<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 rounded px-3">
    <a class="navbar-brand" href="<?php echo site_url('portfolio'); ?>">Portfolio App</a>
    
    <div class="d-flex ms-auto align-items-center">
        <?php if (session()->get('isLoggedIn')): ?>
            <a href="<?php echo site_url('portfolio/create'); ?>" class="btn btn-outline-light btn-sm me-3">+ Tambah Portofolio</a>
            <span class="navbar-text me-3 text-white">Halo, <?php echo esc(session()->get('username')); ?></span>
            <a href="<?php echo site_url('logout'); ?>" class="btn btn-outline-danger btn-sm">Logout</a>
        <?php else: ?>
            <a href="<?php echo site_url('login'); ?>" class="btn btn-outline-primary btn-sm me-2">Login</a>
            <a href="<?php echo site_url('register'); ?>" class="btn btn-primary btn-sm">Register</a>
        <?php endif; ?>
    </div>
</nav>