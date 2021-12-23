<?= $this->extend('layout'); ?>
<?= $this->section('main'); ?>
<?= view('templates/_alerts'); ?>
<div class="row justify-content-center align-items-center minh-100">
  <div class="col-12 col-md-8 col-lg-6 mx-auto">
    <div class="card bg-light py-4 px-2">
      <form method="POST" action="<?= base_url('iniciar-sesion'); ?>" accept-charset="UTF-8">
        <legend class="text-center">Inicio de sesión</legend>
        <div class="form-group row">
          <label for="" class="col-form-label col-sm-4 text-white">Nombre de usurio</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="name" id="name" value="<?= old('name') ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-fomr-label col-sm-4 text-white">Contraseña</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password" id="password" value="" required>
          </div>
        </div>
        <div class="row mx-0 justify-content-center">
          <button class="btn btn-success text-right">Iniciar sesión</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>