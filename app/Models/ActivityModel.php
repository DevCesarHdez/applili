<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * 
 */
class ActivityModel extends Model
{
	protected $table 	  = 'activities';
	protected $primaryKey = 'id_activity';

	protected $returnType 	  = 'array';
	protected $useSoftDeletes = true;

	protected $allowedFields = ['institution','name_activity','link_activity','start','end','description','assigned','created_by'];

	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}