<?php namespace App\Models;

use CodeIgniter\Model;

/**
 *
 */
class UserModel extends Model
{
	protected $table 	  = 'users';
	protected $primaryKey = 'id_user';

	protected $returnType 	  = 'array';
	protected $useSoftDeletes = true;

	protected $allowedFields = ['id_user', 'first_name', 'last_name', 'email', 'password', 'active', 'redirect', 'permisiions', 'role'];

	protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'delete_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}