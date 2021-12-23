<?php namespace App\Controllers;

use Config\Services;
use App\Models\ActivityModel;
use App\Models\UserModel;
use App\Models\InstitutionModel;
use App\Validation\Validation;

/**
 *
 */
class ActivityController extends BaseController
{
	
	function __construct()
	{
		$this->session = Services::session();
	}

	//------------------------------------------------------------

	public function activityView()
	{
		if (!$this->session->isLoggedIn) {
			return redirect()->route('iniciar-sesion');
		}

		$activity = new ActivityModel;
		return view('view-activity', [
			'activity' => $activity->select('activities.*')->select('institutions.name_institution')
							->join('institutions', 'id_institution = institution')
							->where('assigned', $this->session->get('userData.id'))
							->where('end <=', date("Y/m/d H:i", time()))
							->orderBy('start', 'ASC')
							->findAll(),
		]);
	}

	//------------------------------------------------------------

	public function activityForm()
	{
		if (!$this->session->isLoggedIn) {
			return redirect()->route('iniciar-sesion');
		}

		$users = new UserModel;
		$institutions = new InstitutionModel;
		return view('form-activity', [
			'usuarios' => $users->select('*')->where('role >= ', $this->session->get('userData.role'))->findAll(),
			'instituciones' => $institutions->select('*')->findAll(),
		]);
	}

	//------------------------------------------------------------

	public function activityRegister()
	{
		if (!$this->session->isLoggedIn) {
			return redirect()->route('iniciar-sesion');
		}

		if ($this->session->get('userData.role') > 2) {
			return print_r('no-permissions');
			//return view('no-permissions');
		}

		$validation = new Validation;
		if (!$this->validate($validation->activity, $validation->activity_errors)) {
			return redirect()->route('actividad-nueva')
					->withInput()
					->with('errors', $this->validator->getErrors());
		}

		$activities = new ActivityModel;
		$activity = [
			'institution' => $this->request->getPost('institucion'),
			'name_activity' => $this->request->getPost('nombre_actividad'),
			'link_activity' => $this->request->getPost('link_actividad'),
			'start' => $this->request->getPost('inicio_actividad'),
			'end' => $this->request->getPost('fin_actividad'),
			'description' => $this->request->getPost('descripcion'),
			'assigned' => $this->request->getPost('asignar'),
			'created_by' => $this->session->get('userData.id')
		];
		$activities->insert($activity);

		return redirect()->route($this->session->get('userData.redirect'))->with('success', 'Actividad registrada con exito.');
	}

	//------------------------------------------------------------
}