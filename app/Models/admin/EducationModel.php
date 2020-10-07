<?php 
namespace App\Models\admin;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class EducationModel extends Model
{
	protected $table = 'tbl_education';
	protected $primaryKey = 'id';
	protected $allowedFields = [ "id","title","school_university","passing_year","description","address","grade_percentage" ,"cretated","updated"];
	var $order = array('id' => 'asc');
	function get_datatables(){
		// search
		if($_POST['search']['value']){
			$search = $_POST['search']['value'];
			$condition_search = "title LIKE '%$search%'";
		} else {
			$condition_search = "Id != ''";
		}

		// order
		if($_POST['order']){
			$result_order = $this->allowedFields[$_POST['order']['0']['column']];
			$result_dir = $_POST['order']['0']['dir'];
		} else if ($this->order){
			$order = $this->order;
			$result_order = key($order);
			$result_dir = $order[key($order)];
		}


		if($_POST['length']!=-1);
		$db = db_connect();
		$builder = $db->table($this->table);
		$query = $builder->select('*')
				->where($condition_search)
				->orderBy($result_order, $result_dir)
				->limit($_POST['length'], $_POST['start'])
				->get();
		return $query->getResult();

    }
    
    function data_count(){
		$sQuery = "SELECT COUNT(id) as countdata FROM ".$this->table;
		$db = db_connect();
		$query = $db->query($sQuery)->getRow();
		return $query;
    }
    function count_filter(){
		if($_POST['search']['value']){
			$search = $_POST['search']['value'];
            $condition_search = "AND  ( title LIKE '%$search%')";
		} else {
			$condition_search = "";
		}
		$sQuery = "SELECT COUNT(id) as countdata FROM ".$this->table." WHERE id != '' $condition_search";
		$db = db_connect();
		$query = $db->query($sQuery)->getRow();
		return $query;
	}
	
}

?>