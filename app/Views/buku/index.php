<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
          <a href="/buku/create" class="btn btn-primary mt-3">Tambah Data Buku</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
              <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
              </div> 
              <?php endif ?>
            <table class="table">
            <div class="row">
    <div class="col-6">
    <h2 class="mt-2">Daftar buku</h2>
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
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Sampul</th>
      <th scope="col">Judul</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $d = 1 + (3 * ($currentPage - 1)); ?>
    <?php foreach ($buku as $k) : ?>
    <tr>
      <th scope="row"><?= $d++; ?></th>
      <td><img src="/img/<?= $k['sampul']; ?>" alt="" class="sampul"></td>
      <td><?= $k['judul']; ?></td>
      <td>
      <a href="/buku/<?= $k['slug']; ?>" class="btn btn-primary">Detail</div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        <?= $pager->links('buku', 'buku_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>