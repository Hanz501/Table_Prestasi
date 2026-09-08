<?php echo $this->extend('layouts/main'); ?>

<?php echo $this->section('content'); ?>
<!-- sini pesan flashdata sukses -->
<?php if (session()->getFlashdata('success_message')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo session()->getFlashdata('success_message'); ?>
    </div>
    <?php endif; ?>

<div class="d-flex justify-content-between align-items-center mt-3 mb-2">
    <h2 class="mb-0">Daftar Portofolio</h2>
    <a href="<?php echo site_url('portfolio/create'); ?>" class="btn btn-success">+ Tambah Portofolio</a>
</div>

<!-- sini menampilkan list data portfolio -->
<div class="row gx-5 gy-5 mt-1">
    <?php foreach ($portfolios as $portfolio): ?>
        <div class="col col-6">
            <div class="card">
                <img src="<?php echo base_url('uploads/' . $portfolio->image);?>" alt="<?php echo ($portfolio->title);?>" height="200px" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $portfolio->title; ?></h5>
                    <p class="card-text"><?php echo $portfolio->description; ?></p>
                    <a href="<?php echo site_url('portfolio/edit/' . $portfolio->id); ?>" class="btn btn-primary">Edit</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $portfolio->id; ?>">
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Delete -->
        <div class="modal fade" id="deleteModal<?php echo $portfolio->id; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-dark">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus portofolio "<?php echo $portfolio->title; ?>"?
                    </div>
                    <div class="modal-footer">
                        <form action="<?php echo site_url('portfolio/delete/' . $portfolio->id); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php echo $this->endSection(); ?>