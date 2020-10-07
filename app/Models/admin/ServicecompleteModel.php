<?php 
namespace App\Models\admin;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ServicecompleteModel extends Model
{
	protected $table = 'tbl_servicecomplete';
	protected $primaryKey = 'id';
	protected $allowedFields = [ 'cupsofcoffee','project','clients','partners'];

}

?>