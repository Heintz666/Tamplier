<?php
class Model_Login_out extends Model
{
    public function get_data()
    {	
    Session::destroy();
		print "<script>window.location.href='/'</script>";
	}

}
	