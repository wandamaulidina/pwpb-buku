<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>

  <body>
  <nav class="navbar navbar-expand-lg bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Wanda Maulidina</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="/">Home</a>
        <a class="nav-link" href="/pages/about">About</a>
        <a class="nav-link" href="/pages/contact">Contact</a>
        <a class="nav-link" href="/buku">Buku</a>
        <a class="nav-link" href="/orang">Orang</a>
      </div>
    </div>
  </div>
</nav>
<?= $this->renderSection('content'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
  function previewImg() {
    const sampul = document.querySelector('#sampul');
    const sampulLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');
  
    sampulLabel.textContent = sampul.files[0].name;
  
    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(sampul.files[0]);
  
    fileSampul.onload = function(e) {
      imgPreview.src = e.target.result;
    }
  }

</script>
  </body>
</html>