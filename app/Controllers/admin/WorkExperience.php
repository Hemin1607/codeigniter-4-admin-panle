<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\admin\WorkexperienceModel;

class WorkExperience extends BaseController
{
	var $CONTROLLER = 'workexperience';
	var $PAGEFORM = "workexperienceForm";
	var $PAGELIST = "workexperienceList";
	var $TABLENAME = "tbl_workexperience";
	var $PANEL = 'admin';
	var $TITLE = "Work Experience";
	var $FILEUPLOAD = "./public/uploads";
	var $CONTROLLERNAME ="workexperience";
	var $pageInfo = array('pageTitle' => "Admin :  Work Experience");
	var $pageData =  array('tmp' => null,"title"=>" Work Experience");
	var $sideInfo = array('name' => "workexperienceForm");
	var $fromvalues = array("id"=> "","title"=> "","yearmonth"=> "","description"=> "","address"=> "" );
	var $WorkexperienceModel;
	function __construct()
    {	
		$this->WorkexperienceModel = new WorkexperienceModel();	
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
		$this->sideInfo['name'] = "workexperienceList";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGELIST, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function savedata()
	{
		$validation =  \Config\Services::validation();	
		$id = $this->request->getVar('id');
		$validationArray = array('title' => 'required',
		'yearmonth'=>"required",
		"description"=>"required",
		"address"=>"required"
		);
		$val = $this->validate($validationArray);
		$date = date('Y-m-d H:i:s');
	    $data = array(
			'title' => $this->request->getVar('title'),
			'description' => $this->request->getVar('description'),
			'id' => $this->request->getVar('id'),
			'yearmonth' => $this->request->getVar('yearmonth'),
			"address" =>$this->request->getVar('address'),
			
		);
	    if($val){
			
			$this->WorkexperienceModel->save($data);
			$session = session();
			$session->setFlashdata('successmsg', 'Data Save Successfully');
			return redirect()->to(base_url($this->PANEL."/workexperience/list") );
	    }else{
	    	$this->pageData['validation'] =  \Config\Services::validation();
            $this->pageData['formData'] = $data;
            $this->sideInfo['name'] = "workexperienceForm";
			$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	    }
		
	}
	public function table_data(){
		$listing = $this->WorkexperienceModel->get_datatables();
		$data_count = $this->WorkexperienceModel->data_count();
		$count_filter = $this->WorkexperienceModel->count_filter();

		$data = array();
		$no = $_POST['start'];
		foreach ($listing as $key) {
			
			$no++;
			$row = array();
			$row[] = $key->title;
			$row[] = $key->yearmonth;
			$row[] = $key->description;
			$row[] = $key->address;
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
		
		$dataresutl = $this->WorkexperienceModel->where("id = ",$id)->first();
        $this->pageData['validation'] =  \Config\Services::validation();
        $this->pageData['formData'] = $dataresutl;
        $this->sideInfo['name'] = "workexperienceForm";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function deleteData($id){
		$this->WorkexperienceModel->delete($id);
		echo "Data Deleted Succesfully";
	}

}
