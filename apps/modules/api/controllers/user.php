<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(BASEPATH.'libraries/REST_Controller.php');
class User extends REST_Controller {

	public function index_get()
	{
		$this->response(array("rrrr"=>"wwwww"), 200);
		//$this->load->view('welcome_message');
	}

	public function test_get(){
		$this->response(array("rrrr"=>"wwwww"), 200);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */