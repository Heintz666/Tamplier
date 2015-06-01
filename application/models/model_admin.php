<?php
class Model_Admin extends Model
{
	
	public function get_data($par)
	{	
Session::init();
$userstatus = Session::get('userstatus');
if($userstatus=='superadmin'){
//info 




}else{
//not admin


}

	
	
	}
	
}	