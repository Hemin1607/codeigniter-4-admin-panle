<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\admin\EducationModel;

class Education extends BaseController
{
	var $CONTROLLER = 'education';
	var $PAGEFORM = "educationForm";
	var $PAGELIST = "educationList";
	var $TABLENAME = "tbl_skills";
	var $PANEL = 'admin';
	var $TITLE = "Education";
	var $FILEUPLOAD = "./public/uploads";
	var $CONTROLLERNAME ="education";
	var $pageInfo = array('pageTitle' => "Admin :  Education");
	var $pageData =  array('tmp' => null,"title"=>" Education");
	var $sideInfo = array('name' => "educationForm");
	var $fromvalues = array("id"=> "","title"=> "","school_university"=> "","passing_year"=> "","description"=> "","address"=> "","grade_percentage"=> "" );
	var $EducationModel;
	function __construct()
    {	
		$this->EducationModel = new EducationModel();	
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
		$this->sideInfo['name'] = "educationList";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGELIST, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function savedata()
	{
		$validation =  \Config\Services::validation();	
		$id = $this->request->getVar('id');
		$validationArray = array('title' => 'required',
		'school_university' => 'required',
		'passing_year'=>"required",
		"description"=>"required",
		"address"=>"required",
		"grade_percentage"=>"required"
		);
		$val = $this->validate($validationArray);
		$date = date('Y-m-d H:i:s');
	    $data = array(
			'title' => $this->request->getVar('title'),
			'description' => $this->request->getVar('description'),
			'id' => $this->request->getVar('id'),
			'school_university' => $this->request->getVar('school_university'),
			'passing_year' => $this->request->getVar('passing_year'),
			"address" =>$this->request->getVar('address'),
			"grade_percentage" =>$this->request->getVar('grade_percentage')
		);
	    if($val){
			
			$this->EducationModel->save($data);
			$session = session();
			$session->setFlashdata('successmsg', 'Data Save Successfully');
			return redirect()->to(base_url($this->PANEL."/education/list") );
	    }else{
	    	$this->pageData['validation'] =  \Config\Services::validation();
            $this->pageData['formData'] = $data;
            $this->sideInfo['name'] = "educationForm";
			$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	    }
		
	}
	public function table_data(){
		$listing = $this->EducationModel->get_datatables();
		$data_count = $this->EducationModel->data_count();
		$count_filter = $this->EducationModel->count_filter();

		$data = array();
		$no = $_POST['start'];
		foreach ($listing as $key) {
			
			$no++;
			$row = array();
			$row[] = $key->title;
			$row[] = $key->school_university;
			$row[] = $key->passing_year;
			$row[] = $key->grade_percentage;
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
		
		$dataresutl = $this->EducationModel->where("id = ",$id)->first();
        $this->pageData['validation'] =  \Config\Services::validation();
        $this->pageData['formData'] = $dataresutl;
        $this->sideInfo['name'] = "educationForm";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function deleteData($id){
		$this->EducationModel->delete($id);
		echo "Data Deleted Succesfully";
	}

}
