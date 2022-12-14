<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Tambah Data Buku</h2>
            <form action="/buku/save" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
      <div class="form-group row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 
          'is-invalid' : ''; ?> " id="judul" name="judul" autofocus value="<?= old(('judul')); ?>">
           <div class="invalid-feedback">
          <?= $validation->getError('judul'); ?>
        </div>
      </div>
</div>
     <div class="form-group row">
         <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('kelas')) ? 
          'is-invalid' : ''; ?>" id="kelas" name="kelas" value="<?= old(('kelas')); ?>">
          <div class="invalid-feedback">
          <?= $validation->getError('kelas'); ?>
        </div>
</div>
</div>
      <div class="form-group row">
        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 
          'is-invalid' : ''; ?>" id="penulis" name="penulis" value="<?= old(('penulis')); ?>">
          <div class="invalid-feedback">
          <?= $validation->getError('penulis'); ?>
        </div>
</div>
</div>
        <div class="form-group row">
        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 
          'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= old(('penerbit')); ?>">
           <div class="invalid-feedback">
          <?= $validation->getError('penerbit'); ?>
    </div>
      </div>
        </div>
        <div class="form-group row">
        <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
        <div class="col-sm-2">
          <img src="/img/default.jpg" alt="img" height="110" width="110" class="img-thumbnail img-priview">
</div>
        <div class="col-sm-8">
          <div class="custom-file">
         <input type="file" class="form-control  <?= ($validation->hasError('sampul')) ? 
          'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="priviewImg()">
           <div class="invalid-feedback">
          <?= $validation->getError('sampul'); ?>
          </div>
         <label class="input-group-text" for="sampul">Browser</label>
          </div>
            </div>
        </div>
      <div class="form-group row">
        <div class="col-sm-10 my-2">
          <button type="submit" class="btn btn-primary">Tambah Data Buku</button>
        </div>
  </div>
</form>
</div>
</div>
</div>
<?= $this->endSection('content'); ?>