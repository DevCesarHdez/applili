<?= $this->extend('layout'); ?>
<?= $this->section('main'); ?>
<div class="row justify-content-center align-items-center minh-100">
	<div class="col-12">
		<div class="jumbotron">
			<?php if (is_null($activity)): ?>
			<p class="lead">No tiene una actividad asignada a esta hora (<?= date("Y-m-d H:i", time()) ?>).</p>
			<?php else: ?>
			<h1 class="display-4"><?= $activity[0]['name_institution'] ?></h1>
			<p class="lead"><?= $activity[0]['description'] ?></p>
			<hr class="my-4">
			<a class="btn btn-primary btn-lg" href="<?= $activity[0]['link_activity'] ?>" target="_blank" role="button">Ir a la actividad</a>
			<?php endif ?>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>