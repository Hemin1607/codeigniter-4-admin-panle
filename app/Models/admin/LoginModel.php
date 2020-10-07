<?php 
namespace App\Models\admin;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class LoginModel extends Model
{
	protected $table = 'tbl_user';
	protected $primaryKey = 'id';
    protected $allowedFields = [ 'firstname','lastname','password','email','role','img_url'];
}

?>