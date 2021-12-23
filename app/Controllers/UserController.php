<?php namespace App\Controllers;

use Config\Services;
use App\Models\UserModel;
use App\Validation\UserValidation;

/**
 * 
 */
class UserController extends BaseController
{	
	function __construct()
	{
		$this->session = Services::session();
	}

	//------------------------------------------------------------
	
	public function usersView()
	{
		if (!$this->session->isLoggedIn) 
			return redirect()->route('iniciar-sesion');

		if ($this->session->get('userData.role') != 1) 
			return print_r('no-permissions');

		$users = new UserModel;
		return view('view-users', [
			'users' => $users->select('*')->findAll(),
		]);
	}

	//------------------------------------------------------------
	
	public function userForm()
	{
		if (!$this->session->isLoggedIn) return redirect()->route('iniciar-sesion');

		if ($this->session->get('userData.role') > 2) return print_r('no-permissions');

		return view('form-user');
	}

	//------------------------------------------------------------
	
	public function userRegister()
	{
		if (!$this->session->isLoggedIn) return redirect()->route('iniciar-sesion');

		if ($this->session->get('userData.role') > 2) return print_r('no-permissions');

		$userValidation = new UserValidation;
		if (!$this->validate($userValidation->register, $userValidation->register_errors)) {
			return redirect()->route('usuario-nuevo')
					->withInput()
					->with('errors', $this->validator->getErrors());
		}

		$user = [
			'first_name' => $this->request->getPost('nombre'),
			'last_name' => $this->request->getPost('apellido'),
			'email' => $this->request->getPost('email'),
			'password' => password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT),
			'role' => $this->request->getPost('rol'),
			'active' => 1,
			'redirect' => 'actividades',
		];
		if ($this->request->getPost('rol') <= 2) 
			$user['redirect'] .= '/nueva';

		$users = new UserModel;
		$users->insert($user);

		return redirect()->route($this->session->get('userData.redirect'))->with('success', 'Usuatrio creado con éxito');
	}
}