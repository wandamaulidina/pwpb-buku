<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Buku</h2>
            <form action="/buku/update/<?= $buku['id']; ?>" method="post"  enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="slug" value="<?=$buku['slug'];?>">
            <input type="hidden" name="sampulLama" value="<?=$buku['sampul'];?>">
      <div class="form-group row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 
          'is-invalid' : ''; ?> " id="judul" name="judul" autofocus value="<?= old(('judul')) ? old('judul') : $buku['judul']; ?>">
           <div class="invalid-feedback">
          <?= $validation->getError('judul'); ?>
        </div>
      </div>
</div>
     <div class="form-group row">
         <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('kelas')) ? 
          'is-invalid' : ''; ?>" id="kelas" name="kelas" value="<?= old(('kelas')) ? old('kelas') : $buku['kelas']; ?>">
          <div class="invalid-feedback">
          <?= $validation->getError('kelas'); ?>
        </div>
</div>
</div>
      <div class="form-group row">
        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 
          'is-invalid' : ''; ?>" id="penulis" name="penulis" value="<?= old(('penulis')) ? old('penulis') : $buku['penulis']; ?>">
          <div class="invalid-feedback">
          <?= $validation->getError('penulis'); ?>
        </div>
</div>
</div>
        <div class="form-group row">
        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 
          'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= old('penerbit')  ? old('penerbit') : $buku['penerbit'] ; ?>">
           <div class="invalid-feedback">
          <?= $validation->getError('penerbit'); ?>
        </div>
</div>
        </div>
        <div class="form-group row">
        <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
        <div class="col-sm-10 my-2">
              <img src="/img/<?= $buku['sampul']; ?>"  alt="img" height="110" width="110" class="img-thumbnail img-preview">
</div>
            <div class="col-sm-8">
            <div class="custom-file">
          <input type="file" class="custom-file-input  <?= ($validation->hasError('sampul')) ? 
          'is-invalid' : ''; ?>" id="sampul" name="sampul" value="<?= old('sampul')  ? old('sampul') : $buku['sampul'] ; ?>">
           <div class="invalid-feedback">
          <?= $validation->getError('sampul'); ?>
        </div>
        <label class="input-group-text" for="sampul"><?= $buku['sampul']; ?></label>
        </div>
      </div>
</div>
      <div class="form-group row">
        <div class="col-sm-10 my-2">
          <button type="submit" class="btn btn-primary">Ubah Data Buku</button>
        </div>
  </div>
</form>
</div>
</div>
</div>
<?= $this->endSection('content'); ?>