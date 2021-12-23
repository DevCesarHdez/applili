<?= $this->extend('layout'); ?>
<?= $this->section('main'); ?>
<div class="row justify-content-center align-items-center minh-100">
<?= view('templates/_alerts'); ?>
	<div class="col-12">
		<div class="card bg-light py-4 px-2">
			<form method="POST" action="<?= site_url('actividades/nueva'); ?>" accept-charset="UTF-8">
				<legend class="text-center">Nueva actividad</legend>
				<div class="form-group row">
					<label class="col-form-label col-sm-4 text-white">Institución <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<select class="form-control" name="institucion" id="institucion" aria-describedby="intitucionAyudaCrear">
						<?php foreach ($instituciones as $institucion): ?>
							<option value="<?= $institucion['id_institution'] ?>"><?= $institucion['name_institution'] ?></option>
						<?php endforeach; ?>
						</select>
						<small id="intitucionAyudaCrear" class="form-text text-white-50">¿No ves la institución que necesitas? <a href="/instituciones/nueva">registar una nueva institución</a></small>
					</div>
				</div>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 text-white">Nombre de la actividad <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nombre_actividad" id="nombre_actividad" value="<?=old('nombre_actividad')?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 text-white">Link de la actividad <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<input type="url" name="link_actividad" id="link_actividad" class="form-control" value="<?=old('link_actividad')?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 text-white">Fecha de inicio <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control datetimepicker_mask" name="inicio_actividad" id="inicio_actividad" value="<?=old('inicio_actividad')?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 text-white">Fecha de termino <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<input type="text" class="form-control datetimepicker_mask" name="fin_actividad" id="fin_actividad" value="<?=old('fin_actividad')?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 text-white">Breve descripción</label>
					<div class="col-sm-8">
						<textarea name="descripcion" id="descripcion" class="form-control"><?=old('descripcion')?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 text-white">Asignar a <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<select name="asignar" id="asignar" class="form-control">
						<?php foreach ($usuarios as $usuario): ?>
							<option value="<?= $usuario['id_user'] ?>"><?= $usuario['first_name'] ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="row mx-0 justify-content-end">
					<?= csrf_field() ?>
					<button type="submit" class="btn btn-success text-right">Registrar actividad</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
	$.datetimepicker.setLocale('es');
    $('.datetimepicker_mask').datetimepicker({
        mask:'9999/19/39 29:59',
        step:30,
        theme:'dark',
        //format:'d/m/Y H:i',
        //lang: 'es'
    });
</script>
<?= $this->endSection() ?>