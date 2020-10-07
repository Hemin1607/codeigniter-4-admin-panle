<?php 
namespace App\Models\admin;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ContactModel extends Model
{
	protected $table = 'tbl_contact';
	protected $primaryKey = 'id';
	protected $allowedFields = ["email","contactno","address","created","updated"];

}

?>