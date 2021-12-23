<?php namespace App\Controllers;

use Config\Services;
use App\Models\UserModel;
use App\Validation\UserValidation;

/**
 * 
 */
class AccountController extends BaseController
{
	
	function __construct()
	{
		$this->session = Services::session();
	}

	//------------------------------------------------------------

	public function view()
	{
		if (!$this->session->isLoggedIn) return redirect()->route('iniciar-sesion');

		return view('account', [
			'userData' => $this->session->userData,
		]);
	}

	//------------------------------------------------------------

	public function updateAccount()
	{
		if (!$this->session->isLoggedIn) return redirect()->route('iniciar-sesion');

		$userValidation = new UserValidation;
		if (!$this->validate($userValidation->update, $userValidation->update_errors)) {
			return redirect()->back()
					->withInput()
					->with('errors', $this->validator->getErrors());
		}

		$users = new UserModel;
		$user = [
			'id_user' => $this->session->get('userData.id'),
			'first_name' => $this->request->getPost('nombre'),
			'last_name' => $this->request->getPost('apellido'),
		];
		$users->save($user);

		$this->session->push('userData', $user);

		return redirect()->route('perfil')->with('success', 'Datos actualizado con éxito.');
	}

	//------------------------------------------------------------
	
	public function changeEmail()
	{
		if ( !$this->session->isLoggedIn ) 
		{
			return redirect()->route('iniciar-sesion');
		}

		$userValidation = new UserValidation;
		if ( !$this->validate($userValidation->email, $userValidation->email_errors) ) 
		{
			return redirect()->back()
					->withInput()
					->with('errors', $this->validator->getErrors());
		}

		$users = new UserModel;
		$user = [
			'id_user' => $this->session->get('userData.id'),
			'email' => $this->request->getPost('email'),
		];
		$users->save($user);

		$this->session->push('userData', $user);

		return redirect()->route('perfil')->with('success', 'Datos actualizado con éxito.');
	}

	//------------------------------------------------------------
	
	public function changePassword()
	{
		if ( !$this->session->isLoggedIn ) 
		{
			return redirect()->route('iniciar-sesion');
		}

		$userValidation = new UserValidation;
		if ( !$this->validate($userValidation->password, $userValidation->password_errors) ) 
		{
			return redirect()->route('perfil')
					->withInput()
					->with('errors', $this->validator->getErrors());
		}

		$users = new UserModel;
		$user = $users->find($this->session->get('userData.id'));
		if (
			!$user ||
			!verify_password($this->request->getPost('contraseña'), $user['password'] )
		) {
			return redirect()->to('perfil')
					->withInput()
					->with('error', 'Credenciales invalidas.');
		}

		$userUpdate = [
			'id_user' => $this->session->get('userData.id'),
			'password' => password_hash($this->request->getPost('contraseña_nueva'), PASSWORD_DEFAULT),
		];
		$users->save($userUpdate);

		return redirect()->route('perfil')->with('success', 'Contraseña actualizada con éxito.')
	}

	//------------------------------------------------------------
}