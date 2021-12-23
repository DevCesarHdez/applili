<?= $this->extend('layout'); ?>
<?= $this->section('main'); ?>
<div class="row justify-content-center align-items-center minh-100">
	<?= view('templates/_alerts') ?>
    <div class="col-12">
		<div class="card bg-light py-4 px-2">
			<form method="POST" action="<?= site_url('instituciones/nueva') ?>">
				<legend class="text-center">Registro de nueva institución </legend>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 text-white">Nombre de la institución <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nombre_institucion" id="nombre_institucion" value="<?= old('nombre_institucion') ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="" class="col-fomr-label col-sm-4 text-white">Descripción</label>
					<div class="col-sm-8">
						<textarea name="descripcion" id="descripcion" class="form-control"><?= old('descripcion') ?></textarea>
					</div>
				</div>
				<div class="row mx-0 justify-content-end">
					<button class="btn btn-success text-right">Registrar institución</button>
				</div>
			</form>
		</div>
    </div>
</div>
<?= $this->endSection(); ?>