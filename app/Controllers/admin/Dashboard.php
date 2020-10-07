<?php namespace App\Controllers\admin;
use App\Controllers\BaseController;
class Dashboard extends BaseController
{
	function __construct()
    {	
	 	$this->checkAdminSession();
    }
	public function index()
	{
		$pageInfo['pageTitle'] = "Admin : Dashboard";
		$pageData['tmp'] = null;
		$sideInfo['name'] = "dashboard";
		$this->loadViews("admin\dashboard", $pageInfo, $pageData,$sideInfo , NULL);

	}

}
