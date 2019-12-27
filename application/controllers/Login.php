<?php 
	class Login extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Proses');
		}
		public function index(){
			$data=array(
				'judul'=>'Login'
			);
			$this->load->view('mhs/login', $data);
		}
		public function auth(){
			$user=$_POST['nim'];
			$pass=md5($_POST['password']);
			$query=$this->Proses->cek($user,$pass)->row();
			$cek=count($query);
			$this->session->set_userdata('mhs', $user);
			if($cek>0){
				$this->session->set_userdata('user', $user);
				redirect('mhs');
			}
			else{
				redirect('login');
			}
		}
		public function logout(){
			$this->session->sess_destroy();
			redirect('login');
		}
	}
 ?>