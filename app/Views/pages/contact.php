<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
    <div class="col">
    <h1>Contact Skanic</h1>
    <?php foreach($alamat as $c) : ?>
<ul>
    <li><?= $c['tipe']; ?></li>
    <li><?= $c['alamat']; ?></li>
    <li><?= $c['kab']; ?></li>
</ul>
    <?php endforeach; ?>
</div>
</div>
</div>
<?= $this->endsection(); ?>