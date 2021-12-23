<?php namespace App\Validation;

/**
 * 
 */
class UserValidation
{
	// Validaciones para el registro.
	public $register = [
		'nombre' => 'required|alpha_space',
		'apellido' => 'required|alpha_space',
		'email' => 'required|valid_email',
		'contraseña' => 'required|min_length[8]',
		'rol' => 'required|in_list[1,2,3]|create_valid_role',
	];

	public $register_errors = [
		'nombre' => [
			'required' => 'El campo {field} es requeriro.',
			'alpha_space' => 'El campo {field} solo acepta letras y espacios.'
		],
		'apellido' => [
			'required' => 'El campo {field} es requeriro.',
			'alpha_space' => 'El campo {field} solo acepta letras y espacios.'
		],
		'email' => [
			'required' => 'El campo {field} es requeriro.',
			'valid_email' => 'Verifica que en el campo {field} tenga un email valido.'
		],
		'contraseña' => [
			'required' => 'El campo {field} es requeriro.',
			'min_length' => 'La {field} debe de ser de minimo 8 caracteres.'
		],
		'rol' => [
			'required' => 'El campo {field} es requeriro.',
			'in_list' => 'Verifica que el {field} sea valido.',
			'create_valid_role' => 'No puede crear usuarios con mayor privilegios que los suyos.'
		],	
	];

	// Validaciones para actualizar.
	public $update = [
		'nombre' => 'alpha_space',
		'apellido' => 'alpha_space',
	];

	public $update_errors = [
		'nombre' => ['alpha_space' => 'Verifica que el nombre no contenga acentos.'],
		'apellido' => ['alpha_space' => 'Verifica que los apellidos no contengan acentos.'],
	];

	// Validaciones para cambio de contraseña.
	public $password = [
		'contraseña' => 'required|min_lenght[8]',
		'contraseña_nueva' => 'required|min_lenght[8]',
		'repetir_contraseña' => 'required|min_lenght[8]|matches[contraseña_nueva]',
	];

	public $password_errors = [
		'contraseña' => [
			'required' => 'El campo {field} es requeriro.',
			'min_length' => 'La {field} debe de ser de minimo 8 caracteres.',
		],
		'contraseña_nueva' => [
			'required' => 'El campo {field} es requeriro.',
			'min_length' => 'La {field} debe de ser de minimo 8 caracteres.',
		],
		'repetir_contraseña' => [
			'required' => 'El campo {field} es requeriro.',
			'min_length' => 'La {field} debe de ser de minimo 8 caracteres.',
			'matches' => 'Las contraseñas no coinciden.',
		],
	];
}