<?= $this->extend('layout'); ?>
<?= $this->section('main'); ?>
<div class="row justify-content-center minh-100">
    <div class="col-12 col-md-8 col-lg-6 mx-auto mt-5">
		<table class="table table-striped table-hover">
			<caption>Lista de usuarios</caption>
			<thead class="thead-light">
				<tr>
				    <th scope="col">#</th>
				    <th scope="col">Nombre</th>
				    <th scope="col">Perfil</th>
				    <th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user): ?>
				<tr>
			  		<td>1</td>
				    <td><?= $user['first_name'] . ' ' . $user['last_name'] ?></td>
				    <td>Administrador</td>
				    <td>
				      <a href="#" class="btn btn-primary">Ed</a>
				      <a href="#" class="btn btn-danger">El</a>
				    </td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
    </div>
</div>
<?= $this->endSection(); ?>