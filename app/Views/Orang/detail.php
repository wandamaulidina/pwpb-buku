<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
<div class="row">
    <div class="col">
        <h2>Detail orang</h2>
        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $orang['nama']; ?></h5>
        <p class="card-text"><b>Alamat : </b><?= $orang['alamat']; ?></p>
        <a href="/orang/edit/<?= $orang['slug']; ?>" class="btn btn-warning">Edit</a>
        <form action="/orang/<?= $orang['id']; ?>" method="post" class="d-inline">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Dihapus?');">Delete</button>
</form>
<br><br>
        <a href="/orang" class="btn btn-primary">Kembali ke daftar buku </a>

      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<?= $this->endsection('content'); ?>
