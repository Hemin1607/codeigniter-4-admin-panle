<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\admin\HomeModel;

class Home extends BaseController
{
	var $CONTROLLER = 'home';
	var $PAGEFORM = "homeForm";
	var $PAGELIST = "homeList";
	var $TABLENAME = "tbl_home";
	var $PANEL = 'admin';
	var $TITLE = "Home";
	var $FILEUPLOAD = "./public/uploads";
	var $CONTROLLERNAME ="home";
	var $pageInfo = array('pageTitle' => "Admin : Home");
	var $pageData =  array('tmp' => null,"title"=>"Home");
	var $sideInfo = array('name' => "homeForm");
	var $fromvalues = array("id"=> "","title"=>"","description"=>"","image"=>"");
	var $homeModel;
	function __construct()
    {	
		$this->homeModel = new HomeModel();
	 	$this->checkAdminSession();
    }
	public function index()
	{	$this->pageData['formData']=null;
		$this->pageData['validation'] =  \Config\Services::validation();
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData,$this->sideInfo , NULL);

	}
	public function list(){
		$this->pageData['data'] =null;
		$this->sideInfo['name'] = "homeList";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGELIST, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function savedata()
	{
		$this->pageData['validation'] =  \Config\Services::validation();
		$this->pageData['formData'] = $data;
		$this->sideInfo['name'] = "homeForm";
		$validation =  \Config\Services::validation();	
		$id = $this->request->getVar('id');
		$validationArray = array('title' => 'required',
			'description' => 'required',
			'profile-image'=>['uploaded[profile-image]',
			'mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png]'
			] 
		);
		if($id != ''){
			unset($validationArray['profile-image']);
		}
		$val = $this->validate($validationArray);
		$date = date('Y-m-d H:i:s');
	    $data = array(
			'title' => $this->request->getVar('title'),
			'description' => $this->request->getVar('description'),
			'id' => $this->request->getVar('id'),
			"updated" => $date
		);

		$avatar = $this->request->getFile('profile-image');
		if($avatar->isValid() &&  !$avatar->hasMoved()){
			$avatar->move($this->FILEUPLOAD);
			$data["image"] = $this->FILEUPLOAD."/".$avatar->getName();
		}
	    if($val){
			$this->homeModel->save($data);
			$session = session();
			$session->setFlashdata('successmsg', 'Data Save Successfully');
			return redirect()->to(base_url($this->PANEL."/home/list") );
	    }else{
	    	
			$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	    }
		
	}
	public function table_data(){
		$listing = $this->homeModel->get_datatables();
		$data_count = $this->homeModel->data_count();
		$count_filter = $this->homeModel->count_filter();

		$data = array();
		$no = $_POST['start'];
		foreach ($listing as $key) {
			$no++;
			$row = array();
			$row[] = $key->title;
			$row[] = $key->description;
			$row[] = "<div class='cust-height-width'><img src='".base_url().$key->image."' alt='".$key->title."'></div>";
			$row[] = "<a href=".base_url()."/".$this->PANEL."/".$this->CONTROLLERNAME."/edit/".$key->id." class='btn btn-primary btn-mini'><i class='icon-pencil'></i></a>
			&nbsp;&nbsp;<a   onclick=deleteData(".$key->id.",'".base_url()."/".$this->PANEL."/".$this->CONTROLLERNAME."/deleteData/".$key->id."','home_tbl')	class='btn btn-danger btn-mini'><i class='icon-trash'></i></a>";
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
		$dataresutl = $this->homeModel->where("id = ",$id)->first();
		$this->pageData['validation'] =  \Config\Services::validation();
		$this->pageData['formData'] = $dataresutl;
		$this->sideInfo['name'] = "homeForm";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $this->pageInfo, $this->pageData ,$this->sideInfo, NULL);
	}
	public function deleteData($id){
		$this->homeModel->delete($id);
		echo "Data Deleted Succesfully";
	}

}
