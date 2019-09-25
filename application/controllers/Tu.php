<?php 
	class Tu extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('proses');
		}
		public function index(){
			$data=array(
				'judul'=>'Login'
			);
			$this->load->view('tu/login', $data);
		}
		public function auth(){
			$id=$_POST['id'];
			$password=md5($_POST['password']);
			$query=$this->proses->cek_tu($id, $password)->row();
			$cek=count($query);
			if($cek>0){
				$this->session->set_userdata('id', $id);
				redirect('tu/home');
			}
			else{
				redirect('tu');
			}
		}
		public function home(){
			if($this->session->userdata('id')){
				$id=$this->session->userdata('id');
				$user=$this->proses->getusertu($id)->row();
				$data=array(
					'judul'=>'Home',
					'user'=>$user
				);
				$this->load->view('tu/_header', $data);
				$this->load->view('tu/page/home');
				$this->load->view('tu/_footer');
			}
			else{
				redirect('tu');
			}
		}
	}
 ?>