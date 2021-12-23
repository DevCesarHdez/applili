<?= $this->extend('layout'); ?>
<?= $this->section('main'); ?>
<?= view('templates/_alerts') ?>
<div class="row justify-content-center minh-100">
    <div class="col-12 col-md-8 col-lg-6 mx-auto mt-5">
		<div class="card bg-light py-4 px-2">
			<form method="POST" action="<?= site_url('usuarios/nuevo') ?>">
				<legend class="text-center">Crear nuevo usuario</legend>
			 	<div class="form-group row">
			   		<label for="" class="col-form-label col-sm-4 text-white">Nombre</label>
			   		<div class="col-sm-8">
			     		<input type="text" name="nombre" id="nombre" class="form-control" value="<?= old('nombre') ?>">
			   		</div>
			 	</div>
			 	<div class="form-group row">
			   		<label for="" class="col-form-label col-sm-4 text-white">Apellido</label>
			   		<div class="col-sm-8">
			     		<input type="text" name="apellido" id="apellido" class="form-control" value="<?= old('apellido') ?>">
			   		</div>
			 	</div>
			 	<div class="form-group row">
			   		<label for="" class="col-form-label col-sm-4 text-white">Email</label>
			   		<div class="col-sm-8">
			    		<input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>">
			 		</div>
			 	</div>
			 	<div class="form-group row">
			 		<label for="" class="col-form-label col-sm-4 text-white">Contraseña</label>
			 		<div class="col-sm-8">
			     		<input type="password" name="contraseña" id="contraseña" class="form-control">
			 		</div>
			 	</div>
			 	<div class="form-group row">
					<label for="" class="col-form-label col-sm-4 text-white">Tipo de usuario</label>
					<div class="col-sm-8">
						<select name="rol" id="rol" class="form-control">
							<option value="1">Administrador</option>
							<option value="2">Creador de contenido</option>
							<option value="3">Estudiante</option>
						</select>
					</div>
			 	</div>
				<div class="row mx-0 justify-content-end">
			    	<button class="btn btn-success text-right">Registrar usuario</button>
				</div>
			</form>
		</div>
    </div>
</div>
<?= $this->endSection(); ?>