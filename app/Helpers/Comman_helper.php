<?php 
/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}


/**
 * This function used to print array in proper style
 * @param {string,array,any} $data : any value for formet print
 */
if(!function_exists('printR')) {
	function printR($data){						
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}
if(!function_exists('loadViews')){
	function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
		echo view('admin\comman\header',$headerInfo);
		echo view('admin\comman\sidebar');
		echo view($viewName,$pageInfo);
		echo view('admin\comman\footer');
	 }
}

if(!function_exists('getIconList')){
	
	function getIconList(){
		$jsoniconlist = array(array("icon"=> 'icon-lightbulb', "name" => "Idea"),
			array("icon" => 'icon-desktop', "name" => "Application"),
			array("icon" => 'icon-building', "name" => "Mobile application"),
			array("icon" => 'icon-bullhorn', "name" => "Marketing"),
			array("icon" => 'icon-mobile-phone', "name" => "Phone"),
			array("icon" => 'icon-picture', "name" => "Image"),
			array("icon" => 'icon-film', "name" => "video"),
			array("icon" => 'icon-magnet', "name" => "Attract"),
			array("icon"=>  'icon-globe', 'name'=>"Globe")
		);
		return $jsoniconlist;
	}

}

?>