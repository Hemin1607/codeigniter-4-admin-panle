<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['url', 'file','comman_helper','form'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		//$this->session = \Config\Services::session();
	}
	function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL,$sideInfo = NULL, $footerInfo = NULL){
       echo view('admin\comman\header',$headerInfo);
       echo view('admin\comman\sidebar',$sideInfo);
	   echo view($viewName,$pageInfo);
       echo view('admin\comman\footer');
	}
	function loadSingleViews($viewName,$pageInfo){
		echo view($viewName,$pageInfo);
	}
	public function checkAdminSession()
    {
        $session = session();
		$tmp = $session->get('userlogin');
		if(!$tmp){
			$pageInfo = array("data"=>null);
			echo view('admin/login',$pageInfo);
			die;
		} 
    }
    public function adminLogout()
    { 
        $session = session();
		$session->destroy();
		$pageInfo = array("data"=>null);
		echo view('admin/login',$pageInfo);
		die;
    }
	
}
