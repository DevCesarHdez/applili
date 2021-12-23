<?php namespace App\Controllers;

use Config\Services;
use App\Models\UserModel;

class LoginController extends BaseController
{
	
	function __construct()
	{
		$this->session = Services::session();
	}

	//------------------------------------------------------------

	public function login()
	{
		if ($this->session->isLoggedIn) {
			return redirect()->to($this->session->get('userData.redirect'));
		}

		return view('login');
	}

	//------------------------------------------------------------
	
	public function verifyLogin()
	{
		// Validación de la respuestas.
		$rules = [
			'name' 		=> 'required',
			'password'  => 'required|min_length[8]',
		];

		$messages = [
			'name' => ['required' => 'El campo nombre no debe estar vacio.'],
			'password' => ['required' => 'El campo contraseña no debe estar vacio.', 'min_length' => 'La contraseña es de minimo 8 caracteres.']
		];

		if (!$this->validate($rules, $messages)) {
			return redirect()->to('iniciar-sesion')
					->withInput()
					->with('errors', $this->validator->getErrors());
		}

		// Verificando credenciales.
		$users = new UserModel;
		$user = $users->where('first_name', $this->request->getPost('name'))->first();
		if (
			is_null($user) ||
			!password_verify($this->request->getPost('password'), $user['password'])
		) {
			$message = is_null($user)?'Usuario no encontrado':'Contraseña incorrecta';
			return redirect()->to('iniciar-sesion')->withInput()->with('error', $message);
		}

		// Verificando usuario activo.
		if (!$user['active']) {
			return redirect()->to('iniciar-sesion')->withInput()->with('error', 'Usuario inactivo, verifica tu correo para activar');
		}

		// Inicio de sesión correcto.
		$this->session->set('isLoggedIn', true);
		$this->session->set('userData', [
			'id'		  => $user['id_user'],
			'username'	  => $user['first_name'] . ' ' . $user['last_name'],
			'email'		  => $user['email'],
			'role'		  => $user['role'],
			'permissions' => $user['permissions'],
			'redirect'	  => $user['redirect']
		]);

		return redirect()->to($this->session->get('userData.redirect'));
	}

	//------------------------------------------------------------
	
	public function logout()
	{
		$this->session->remove(['isLoggedIn', 'userData']);

		return redirect()->to('iniciar-sesion');
	}
}