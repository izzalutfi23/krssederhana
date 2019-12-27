<?php 

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

require APPPATH . 'libraries/Format.php';

class Api extends REST_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Proses');
	}


	public function krs_get(){
		$user=$this->session->userdata('mhs');
		$getkrs = $this->Proses->get_krs($user)->result();
			// $data = array(
			// 	'krs' => $getkrs->result()
			// );
			// return json_encode($data);

		$this->response([
			'data' => $getkrs
		], REST_Controller::HTTP_OK);
	}
}
?>