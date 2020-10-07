<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\admin\ServiceModel;

class Service extends BaseController
{
	var $CONTROLLER = 'service';
	var $PAGEFORM = "serviceForm";
	var $PAGELIST = "serviceList";
	var $TABLENAME = "tbl_service";
	var $PANEL = 'admin';
	var $TITLE = "Service Skill";
	var $FILEUPLOAD = "./public/uploads";
	var $CONTROLLERNAME ="service";
	var $pageInfo = array('pageTitle' => "Admin : Service Skill");
	var $pageData =  array('tmp' => null,"title"=>"Service Skill");
	var $sideInfo = array('name' => "serviceForm");
	var $fromvalues = array("id"=> "","title"=>"","icon"=>"","desctiption"=>"");
	var $serviceModel;
	function __construct()
    {	
		$this->serviceModel = new serviceModel();
	 	$this->checkAdminSession();
    }
	public function index()
	{	
		$this->pageData['formData']=null;
		$this->pageData['validation'] =  \Config\Services::validation();
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData,$this->sideInfo , NULL);

	}
	public function list(){
		$this->pageData['data'] =null;
		$this->sideInfo['name'] = "serviceList";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGELIST, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function savedata()
	{
		
		$validation =  \Config\Services::validation();	
		$id = $this->request->getVar('id');
		$validationArray = array('title' => 'required',
        'icon' => 'required',
        'desctiption'=> 'required'
		);
		$val = $this->validate($validationArray);
		$date = date('Y-m-d H:i:s');
	    $data = array(
			'title' => $this->request->getVar('title'),
            'desctiption' => $this->request->getVar('desctiption'),
            'icon' => $this->request->getVar('icon'),
			'id' => $this->request->getVar('id'),
			"updated" => $date
        );
	    if($val){
			
			$this->serviceModel->save($data);
			$session = session();
			$session->setFlashdata('successmsg', 'Data Save Successfully');
			return redirect()->to(base_url($this->PANEL."/service/list") );
	    }else{
	    	$this->pageData['validation'] =  \Config\Services::validation();
            $this->pageData['formData'] = $data;
            $this->sideInfo['name'] = "serviceForm";
			$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	    }
		
	}
	public function table_data(){
		$listing = $this->serviceModel->get_datatables();
		$data_count = $this->serviceModel->data_count();
		$count_filter = $this->serviceModel->count_filter();

		$data = array();
		$no = $_POST['start'];
		foreach ($listing as $key) {
			$no++;
			$row = array();
			$row[] = $key->title;
            $row[] = "<button class='btn btn-mini'><i class= '".$key->icon."'></button>";
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
		
		$dataresutl = $this->serviceModel->where("id = ",$id)->first();
        $this->pageData['validation'] =  \Config\Services::validation();
        $this->pageData['formData'] = $dataresutl;
        $this->sideInfo['name'] = "serviceForm";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function deleteData($id){
		$this->serviceModel->delete($id);
		echo "Data Deleted Succesfully";
	}

}
