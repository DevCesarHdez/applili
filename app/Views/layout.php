<!DOCTYPE html>
<html lang="es">
  <head>
    <?= view('templates/_header'); ?>

    <title>AppLili</title>
  </head>
  <body>

    <?php if (session('isLoggedIn')) {
      echo view('templates/_nav');
    } ?>

    <!-- Container 
    -------------------------------------------------->
    <div class="container mt-5">
      <?= $this->renderSection('main'); ?>
    </div>

    <?= view('templates/_footer'); ?>
    
  </body>
</html>