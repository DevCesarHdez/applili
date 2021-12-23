<?php namespace App\Validation;

/**
 *
 */
class Validation
{
	public $activity = [
		'institucion'	   => 'required|is_not_unique[institutions.id_institution]',
		'nombre_actividad' => 'required|string',
		'link_actividad'   => 'required|valid_url',
		'inicio_actividad' => 'required|valid_date[Y/m/d H:i]|valid_current_date',
		'fin_actividad'	   => 'required|valid_date[Y/m/d H:i]|valid_current_date|date_greater_than[{inicio_actividad}]',
		'descripcion'	   => 'string',
		'asignar'		   => 'required|is_not_unique[users.id_user]',
	];

	public $activity_errors = [
		'institucion' => [
			'required' => 'Seleccione una institución.',
			'is_not_unique' => 'Selecione una institución valida, Si el problema persiste contacte al administrador.',
		],
		'nombre_actividad' => [
			'required' => 'Escriba el nombre de la actividad.',
			'string' => 'Verifique que el nombre no contenga caracteres especiales.',
		],
		'link_actividad' => [
			'required' => 'Escriba el link para la actividad.',
			'valid_url' => 'Verifique que el link sea valido.',
		],
		'inicio_actividad' => [
			'required' => 'Se requiere una fecha de inicio de la actividad.',
			'valid_date' => 'Verifique que el formato de la fecha del campo inicio de la actividad sea el correcto, Si el problema persiste contacte al administrador.',
			'valid_current_date' => 'La fecha de inico es atrasada.',
		],
		'fin_actividad' => [
			'required' => 'Se requiere la fecha de termino de la actividad.',
			'valid_date' => 'Verifique que el formato de la fecha del campo fin de la actividad sea el correcto, Si el problema persiste contacte al administrador.',
			'valid_current_date' => 'La fecha de termino es atrasada.',
			'date_greater_than' => 'La fecha de termino de la actividad no puede ser antes que la del inicio.',
		],
		'descripcion' => ['string' => 'Verifique que la descripción no contenga caracteres especiales.'],
		'asignar' => [
			'required' => 'Selecione a un usuario para la actividad.',
			'is_not_unique' => 'Usuario seleccionado no valido. Si el problema persiste contacte al administrador',
		],
	];
}