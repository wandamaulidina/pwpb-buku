<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Tambah Data Buku</h2>
            <form action="/orang/save" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
      <div class="form-group row">
        <label for="Nama" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 
          'is-invalid' : ''; ?> " id="nama" name="nama" autofocus value="<?= old(('nama')); ?>">
           <div class="invalid-feedback">
          <?= $validation->getError('nama'); ?>
        </div>
      </div>
</div>
     <div class="form-group row">
         <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 
          'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old(('alamat')); ?>">
          <div class="invalid-feedback">
          <?= $validation->getError('alamat'); ?>
        </div>
</div>
</div>
      <div class="form-group row">
        <div class="col-sm-10 my-2">
          <button type="submit" class="btn btn-primary">Tambah Data karyawan</button>
        </div>
  </div>
</form>
</div>
</div>
</div>
<?= $this->endSection('content'); ?>