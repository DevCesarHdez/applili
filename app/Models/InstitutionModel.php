<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class InstitutionModel extends Model
{
	protected $table 	  = 'institutions';
	protected $primaryKey = 'id_institution';

	protected $returnType	  = 'array';
	protected $useSoftDeletes = true;

	protected $allowedFields = ['name_institution', 'description'];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField	 = 'updated_at';
	protected $deletedField	 = 'deleted_at';

	protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}