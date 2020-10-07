<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\admin\LoginModel;

class login extends BaseController
{
	var $CONTROLLER = 'login';
	var $PAGEFORM = "login";
	var $TABLENAME = "tbl_user";
	var $PANEL = 'admin';
	var $TITLE = "Authentication";
    var $CONTROLLERNAME ="login";
    var $pageInfo = array("data"=>null);
    
	public function index()
	{
        $this->loadSingleViews($this->PANEL."/".$this->PAGEFORM, $this->pageInfo);
    }
    public function checkLogin(){
        $model = new LoginModel();
        $session = session();
        $user = $model->where('email', $this->request->getVar('email'))->first();
        if($user){
            $res = verifyHashedPassword($this->request->getVar('password'),$user['password']);
            if($res){
                $session = session();
                $session->set('userlogin', $user);
                return redirect()->to(base_url($this->PANEL.'/dashboard'));
            }else{
                //password wrong
                $session->setFlashdata('errormsg', 'Wrong Password,Try again..!');
                $this->loadSingleViews($this->PANEL."/".$this->PAGEFORM, $this->pageInfo);
            }
        }else{
            //user not found
            $session->setFlashdata('errormsg', 'Wrong Username and Password,Please try again');
            $this->loadSingleViews($this->PANEL."/".$this->PAGEFORM, $this->pageInfo);
        }  
    }
    public function logoutadmin()
    {
       
        $this->adminLogout();
    }
}