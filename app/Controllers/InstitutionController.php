<?php namespace App\Controllers;

use Config\Services;
use App\Models\InstitutionModel;

/**
 * 
 */
class InstitutionController extends BaseController
{
	
	public function __construct()
	{
		$this->session = Services::session();
	}

	//------------------------------------------------------------
	
	public function institutionForm()
	{
		if (!$this->session->isLoggedIn) return redirect()->route('iniciar-sesion');

		return view('form-institution');
	}

	//------------------------------------------------------------
	
	public function institutionRegister()
	{
		if (!$this->session->isLoggedIn) 
			return redirect()->route('iniciar-sesion');

		if ($this->session->get('userData.role') > 2) 
			return print_r('no-permissions');

		$rules = [
			'nombre_institucion' => 'required|string',
			'descripcion' => 'string',
		];

		$messages = [
			'nombre_institucion' => [
				'required' => 'El nombre de la institucion es requerido.',
				'string' => 'Verifica que el nombre de la institucion no tenga caracteres especiales invalidos.'
			],
			'descripcion' => ['string' => 'Verifica que la descripción no tenga caracteres especiales invalidos.']
		];

		if (!$this->validate($rules, $messages)) {
			return redirect()->back()
					->withInput()
					->with('errors', $this->validator->getErrors());
		}

		$institution = [
			'name_institution' => $this->request->getPost('nombre_institucion'),
			'description' => $this->request->getPost('descripcion'),
		];
		$institutions = new InstitutionModel;
		$institutions->insert($institution);

		return redirect()->route($this->session->get('userData.redirect'))->with('success', 'Institución registrada con éxito');
	}

	//------------------------------------------------------------
}