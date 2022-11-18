<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data orang</h2>
            <form action="/orang/update/<?= $orang['id']; ?>" method="post"  enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="slug" value="<?=$orang['slug'];?>">
            <input type="hidden" name="sampulLama" value="<?=$orang['sampul'];?>">
      <div class="form-group row">
        <label for="judul" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 
          'is-invalid' : ''; ?> " id="nama" name="nama" autofocus value="<?= old(('nama')) ? old('nama') : $orang['nama']; ?>">
           <div class="invalid-feedback">
          <?= $validation->getError('nama'); ?>
        </div>
      </div>
</div>
     <div class="form-group row">
         <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 
          'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old(('alamat')) ? old('alamat') : $orang['alamat']; ?>">
          <div class="invalid-feedback">
          <?= $validation->getError('kelas'); ?>
        </div>
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