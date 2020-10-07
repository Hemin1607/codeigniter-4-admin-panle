<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\admin\ContactModel;

class Contact extends BaseController
{
	var $CONTROLLER = 'contact';
	var $PAGEFORM = "contact";
	var $TABLENAME = "tbl_contact";
	var $PANEL = 'admin';
	var $TITLE = "Contact";
	var $FILEUPLOAD = "./public/uploads";
	var $CONTROLLERNAME ="contact";
	var $pageInfo = array('pageTitle' => "Admin : Contact");
	var $pageData =  array('tmp' => null,"title"=>"Contact");
	var $sideInfo = array('name' => "contact");
	var $fromvalues = array("id"=>"","email"=>"","contactno"=>"","address"=>"");
	var $ContactModel;
	function __construct()
    {	
		$this->ContactModel = new ContactModel();
		
	 	$this->checkAdminSession();
    }
	public function index()
	{	

		$this->pageData['formData']=$this->ContactModel->first();
		
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
		echo $this->ContactModel->save($_POST);
		
	}

	
}
