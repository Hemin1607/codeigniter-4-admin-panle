<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\admin\ServicecompleteModel;

class ServiceComplete extends BaseController
{
	var $CONTROLLER = 'servicecomplete';
	var $PAGEFORM = "servicecompleteview";
	var $TABLENAME = "tbl_servicecomplete";
	var $PANEL = 'admin';
	var $TITLE = "Service Complete";
	var $FILEUPLOAD = "./public/uploads";
	var $CONTROLLERNAME ="service";
	var $pageInfo = array('pageTitle' => "Admin : Service Complete");
	var $pageData =  array('tmp' => null,"title"=>"Service Complete");
	var $sideInfo = array('name' => "servicecompleteview");
	var $fromvalues = array("id"=> "","title"=>"","icon"=>"","desctiption"=>"");
	var $ServicecompleteModel;
	function __construct()
    {	
		$this->ServicecompleteModel = new ServicecompleteModel();
	 	$this->checkAdminSession();
    }
	public function index()
	{	

        $this->pageData['formData']=$this->ServicecompleteModel->first();
		$this->pageData['validation'] =  \Config\Services::validation();
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData,$this->sideInfo , NULL);

	}
	
	public function savedata()
	{
		//printR($_POST);
		// $data = array(
		// 	'title' => $this->request->getVar('title'),
        //     'desctiption' => $this->request->getVar('desctiption'),
        //     'icon' => $this->request->getVar('icon'),
		// 	'id' => $this->request->getVar('id'),
		// 	"updated" => $date
        // );
		echo $this->ServicecompleteModel->save($_POST);
		
	}

	
}
