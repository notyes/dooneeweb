<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Redeem extends SAMSUNG_Controller {
	public function __construct(){
		header("Content-type: Application/json; Charset:utf8;");
		parent::__construct();
		$this->load->config('samsung');
		$this->load->model('payment_model','mPayment');
		$this->load->model('package_model','mPackage');
		$this->load->model('user_model','mUser');
		$this->load->model('redeem_model','mRedeem');
	}

	public function index(){
		$uId = $this->input->get('uId');
		$redeemCode = $this->input->get('redeemCode');
		$user = array();
		// Validate user
		if(preg_match("#[a-z0-9]{32}#",$uId)){
			$user = $this->mUser->getUser($uId);
			if(!$user){
				echo json_encode(array('status'=>'error','statusCode'=>'20904','description'=>'invalid uid'));
				exit;
			}
		}else{
			echo json_encode(array('status'=>'error','statusCode'=>'20904','description'=>'invalid uid'));
			exit;
		}
		
		//Validate redeemCode
		if(preg_match("#[0-9]{11}#",$redeemCode)){
			if($this->mRedeem->getRedeem($redeemCode)){

				$data = array('uid'=>$uId,'use_date'=>date('Y-m-d H:i:s'));
				$userPackage = $this->mUser->getUserPackage($user['user_id']);
				if($userPackage){
					$expire_date = date('Y-m-d H:i:s',strtotime($userPackage['expire_date'])+2592000);//30 Days
				}else{
					$expire_date =  date('Y-m-d H:i:s',strtotime('+30 day'));
				}
				if($this->mPackage->setUserpackage(array(
					'user_id'=>$user['user_id'],
					'package_id'=>2,//30 days
					'expire_date'=>$expire_date
					))){
					$this->mRedeem->updateRedeem($redeemCode,$data);
				}
				
				echo json_encode(array('status'=>'ok','statusCode'=>'20100','description'=>'success'));
				exit;
			}
		}
		echo json_encode(array('status'=>'error','statusCode'=>'20903','description'=>'invalid redeem code'));
		exit;
	}
}