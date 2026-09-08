<?php echo $this->extend('layouts/main') ?>
<?php echo $this->section('content'); ?>
<div class="glass-panel">
    <h1>Edit Portfolio</h1>
    
    <!-- Menampilkan pesan error ketika data tidak valid -->
    <?php if(service('validation')->getErrors()):?>
    <div class="alert alert-danger" role="alert">
        <?= service('validation')->listErrors() ?>
    </div>
    <?php endif;?>

    <form method="post" action="/portfolio/update/<?php echo $portfolio->id; ?>" enctype="multipart/form-data">
        <?php echo csrf_field() ?>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo set_value('title', $portfolio->title) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4"><?php echo set_value('description', $portfolio->description) ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image (Biarkan kosong jika tidak ingin mengubah gambar)</label>
            <br>
            <?php if($portfolio->image): ?>
                <img src="<?php echo base_url('uploads/'.$portfolio->image); ?>" alt="Current Image" height="100" class="mb-2">
            <?php endif; ?>z
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-secondary" href="<?php echo site_url('portfolio');?>">Back</a>
    </form>
</div>
<?php echo $this->endSection(); ?>
