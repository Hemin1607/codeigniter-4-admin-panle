<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\admin\UserModel;

class usermanagement extends BaseController
{
	var $CONTROLLER = 'user';
	var $PAGEFORM = "userForm";
	var $PAGELIST = "userList";
	var $TABLENAME = "tbl_user";
	var $PANEL = 'admin';
	var $TITLE = "User";
	var $FILEUPLOAD = "uploads";
	var $CONTROLLERNAME ="usermanagement";
	function __construct()
    {	
	 	$this->checkAdminSession();
    }
	public function index()
	{			
		 $userModel = new UserModel();
		 $pageInfo['pageTitle'] = "Save : ".$this->CONTROLLER;
		 $pageData['validation'] =  \Config\Services::validation();
		 $pageData['tmp'] = null;
		 $pageData['formData'] = null;
		 $pageData['title'] = $this->TITLE;
		 $sideInfo['name'] = "usermanagementForm";
		 $this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $pageInfo, $pageData ,$sideInfo, NULL);
	}
	public function list()
	{
		$userModel = new UserModel();
		$pageInfo['pageTitle'] = "List : ".$this->CONTROLLER;
		$pageData['data'] =  null;
		$pageData['title'] = $this->TITLE;
		$pageData['successMeassage'] = "";
		$sideInfo['name'] = "usermanagementList";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGELIST, $pageInfo, $pageData ,$sideInfo, NULL);

	}

	public function savedata()
	{
		$userModel = new UserModel();
		$validation =  \Config\Services::validation();	
		$id = $this->request->getVar('id');
		$validationArray = array('firstname' => 'required',
		'lastname' => 'required',
		'email'  => 'required|valid_email|is_unique[tbl_user.email,id,'.$id.']',
		'password' => 'required',
		'role'  => 'required');
		if($id != ''){
			unset($validationArray['password']);
		}
		$val = $this->validate($validationArray);
	    $data = array(
			'firstname' => $this->request->getVar('firstname'),
			'lastname' => $this->request->getVar('lastname'),
			'email' => $this->request->getVar('email'),
			'password' => getHashedPassword($this->request->getVar('password')),
			'role' => $this->request->getVar('role'),
			'id' => $this->request->getVar('id')
		);
		$avatar = $this->request->getFile('profile-image');
		if($avatar->isValid() &&  !$avatar->hasMoved()){
			$avatar->move(WRITEPATH . $this->FILEUPLOAD);
			$data["img_url"] = $this->FILEUPLOAD."/".$avatar->getName();
		}
	    if($val){
			$session = session();
			$session->setFlashdata('successmsg', 'Data Save Successfully');
			return redirect()->to(base_url($this->PANEL."/usermanagement/list") );
	    }else{
	    	$pageInfo['pageTitle'] = "Form : ".$this->CONTROLLER;
			$pageData['validation'] =  \Config\Services::validation();
			$pageData['formData'] = $data;
			$pageData['title'] = $this->TITLE;
			$sideInfo['name'] = "usermanagementForm";
			$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $pageInfo, $pageData ,$sideInfo, NULL);
	    }
		
	}
	public function edit($id = ''){
		$userModel = new UserModel();
		$dataresutl = $userModel->where("id = ",$id)->first();
		$pageInfo['pageTitle'] = "Edit : ".$this->CONTROLLER;
		$pageData['validation'] =  \Config\Services::validation();
		$pageData['formData'] = $dataresutl;
		$pageData['title'] = $this->TITLE;
		$sideInfo['name'] = "usermanagementForm";
		$this->loadViews($this->PANEL."/".$this->CONTROLLER."/".$this->PAGEFORM, $pageInfo, $pageData ,$sideInfo, NULL);
	}
	public function table_data(){
		$model = new UserModel();
		$listing = $model->get_datatables();
		$data_count = $model->data_count();
		$count_filter = $model->count_filter();

		$data = array();
		$no = $_POST['start'];
		foreach ($listing as $key) {
			$no++;
			$row = array();
			$row[] = $key->firstname;
			$row[] = $key->lastname;
			$row[] = $key->email;
			$row[] = $key->role;
			$row[] = $key->img_url;
			$row[] = "<a href=".base_url()."/".$this->PANEL."/".$this->CONTROLLERNAME."/edit/".$key->id." class='btn btn-primary btn-mini'><i class='icon-pencil'></i></a>
			&nbsp;&nbsp;<a   onclick=deleteData(".$key->id.",'".base_url()."/".$this->PANEL."/".$this->CONTROLLERNAME."/deleteData/".$key->id."','table_id')	class='btn btn-danger btn-mini'><i class='icon-trash'></i></a>";
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
	public function deleteData($id){
		$userModel = new UserModel();
		$userModel->delete($id);
		echo "Data Deleted Succesfully";
	}

}
