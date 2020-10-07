<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\admin\AboutModel;

class About extends BaseController
{
	var $CONTROLLER = 'about';
	var $PAGEFORM = "aboutForm";
	var $PAGELIST = "aboutList";
	var $TABLENAME = "tbl_about";
	var $PANEL = 'admin';
	var $TITLE = "About";
	var $FILEUPLOAD = "./public/uploads";
	var $CONTROLLERNAME ="about";
	var $pageInfo = array('pageTitle' => "Admin : About");
	var $pageData =  array('tmp' => null,"title"=>"About");
	var $sideInfo = array('name' => "aboutForm");
	var $fromvalues = array("id"=> "","title"=>"","description"=>"");
	var $homeModel;
	function __construct()
    {	
		$this->aboutModel = new AboutModel();
	 	$this->checkAdminSession();
    }
	public function index()
	{	$this->pageData['formData']=null;
		$this->pageData['validation'] =  \Config\Services::validation();
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData,$this->sideInfo , NULL);

	}
	public function list(){
		$this->pageData['data'] =null;
		$this->sideInfo['name'] = "aboutList";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGELIST, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function savedata()
	{
		$this->pageData['validation'] =  \Config\Services::validation();
		$this->pageData['formData'] = $data;
		$this->sideInfo['name'] = "aboutForm";
		$validation =  \Config\Services::validation();	
		$id = $this->request->getVar('id');
		$validationArray = array('title' => 'required',
		'description' => 'required',
		);
		$val = $this->validate($validationArray);
		$date = date('Y-m-d H:i:s');
	    $data = array(
			'title' => $this->request->getVar('title'),
			'description' => $this->request->getVar('description'),
			'id' => $this->request->getVar('id'),
			"updated" => $date
		);
		$avatar = $this->request->getFile('profile-image');
	    if($val){
			$this->aboutModel->save($data);
			$session = session();
			$session->setFlashdata('successmsg', 'Data Save Successfully');
			return redirect()->to(base_url($this->PANEL."/about/list") );
	    }else{
	    	
			$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	    }
		
	}
	public function table_data(){
		$listing = $this->aboutModel->get_datatables();
		$data_count = $this->aboutModel->data_count();
		$count_filter = $this->aboutModel->count_filter();

		$data = array();
		$no = $_POST['start'];
		foreach ($listing as $key) {
			$no++;
			$row = array();
			$row[] = $key->title;
			$row[] = $key->description;
			$row[] = "<a href=".base_url()."/".$this->PANEL."/".$this->CONTROLLERNAME."/edit/".$key->id." class='btn btn-primary btn-mini'><i class='icon-pencil'></i></a>
			&nbsp;&nbsp;<a   onclick=deleteData(".$key->id.",'".base_url()."/".$this->PANEL."/".$this->CONTROLLERNAME."/deleteData/".$key->id."','about_tbl')	class='btn btn-danger btn-mini'><i class='icon-trash'></i></a>";
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $data_count->countdata,
			"recordsFiltered" => $count_filter->countdata,
			"data" => $data
		);
		echo json_encode($output);
	}
	public function edit($id = ''){
		$dataresutl = $this->aboutModel->where("id = ",$id)->first();
        $this->pageData['validation'] =  \Config\Services::validation();
        $this->pageData['formData'] = $dataresutl;
        $this->sideInfo['name'] = "aboutForm";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function deleteData($id){
		$this->aboutModel->delete($id);
		echo "Data Deleted Succesfully";
	}

}
