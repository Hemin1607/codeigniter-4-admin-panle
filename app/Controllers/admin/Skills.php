<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\admin\SkillModel;

class Skills extends BaseController
{
	var $CONTROLLER = 'skills';
	var $PAGEFORM = "skillForm";
	var $PAGELIST = "skillList";
	var $TABLENAME = "tbl_skills";
	var $PANEL = 'admin';
	var $TITLE = "Skills";
	var $FILEUPLOAD = "./public/uploads";
	var $CONTROLLERNAME ="skills";
	var $pageInfo = array('pageTitle' => "Admin :  Skill");
	var $pageData =  array('tmp' => null,"title"=>" Skill");
	var $sideInfo = array('name' => "skillForm");
	var $fromvalues = array("id"=> "","title"=>"","description"=>"","percentage" => "","cretated"=> "","updated"=>"");
	var $SkillModel;
	function __construct()
    {	
		$this->SkillModel = new SkillModel();	
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
		$this->sideInfo['name'] = "skillList";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGELIST, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function savedata()
	{
		
		$validation =  \Config\Services::validation();	
		$id = $this->request->getVar('id');
		$validationArray = array('title' => 'required',
		'description' => 'required',
		'percentage'=>"required|is_natural"
		);
		$val = $this->validate($validationArray);
		$date = date('Y-m-d H:i:s');
	    $data = array(
			'title' => $this->request->getVar('title'),
			'description' => $this->request->getVar('description'),
			'id' => $this->request->getVar('id'),
			"percentage" =>$this->request->getVar('percentage')
		);
	    if($val){
			
			$this->SkillModel->save($data);
			$session = session();
			$session->setFlashdata('successmsg', 'Data Save Successfully');
			return redirect()->to(base_url($this->PANEL."/skills/list") );
	    }else{
	    	$this->pageData['validation'] =  \Config\Services::validation();
            $this->pageData['formData'] = $data;
            $this->sideInfo['name'] = "skillForm";
			$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	    }
		
	}
	public function table_data(){
		$listing = $this->SkillModel->get_datatables();
		$data_count = $this->SkillModel->data_count();
		$count_filter = $this->SkillModel->count_filter();

		$data = array();
		$no = $_POST['start'];
		foreach ($listing as $key) {
			
			$no++;
			$row = array();
			$row[] = $key->title;
			$row[] = $key->description;
			$row[] = $key->percentage;
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
		
		$dataresutl = $this->SkillModel->where("id = ",$id)->first();
        $this->pageData['validation'] =  \Config\Services::validation();
        $this->pageData['formData'] = $dataresutl;
        $this->sideInfo['name'] = "skillForm";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function deleteData($id){
		$this->SkillModel->delete($id);
		echo "Data Deleted Succesfully";
	}

}
