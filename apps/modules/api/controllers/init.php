<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require_once(BASEPATH.'libraries/REST_Controller.php');
class Init extends REST_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index_get(){
		$this->load->model('api/category_model','mCategory');
		$this->load->model('api/package_model','mPackage');

		$data = array();
		$data['categories'] = $this->mCategory->getCategories();
		unset($data['categories']['pageing']);
		$data['package'] = $this->mPackage->getPackages();
		unset($data['package']['pageing']);
		$this->response($data);
	}
	
}

/* End of file init.php */
/* Location: ./application/controllers/init.php */