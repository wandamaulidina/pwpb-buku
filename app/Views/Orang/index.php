<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-6">
    <h1 class="mt-2">Daftar Pendidik dan Tenaga Kependidikan</h1>
    <form action="" method="post"> 
    <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Masukan Keyword Pencarian.." 
    name="keyword">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
  </div>
</div>
</form>
</div>
</div>
    <div class="row">
        <div class="col"> 
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $d = 1 + (6 * ($currentPage - 1)); ?>
    <?php foreach ($orang as $o) : ?>
    <tr>
      <th scope="row"><?= $d++; ?></th>
      <td><?= $o['nama']; ?></td>
      <td><?= $o['alamat']; ?></td>
      <td>
      <a href="/orang/detail/<?= $o['id'] ?>" class="btn btn-primary">Detail</div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        <?= $pager->links('orang', 'orang_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>