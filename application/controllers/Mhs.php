<?php 	
	class Mhs extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Proses');
			if($this->session->userdata('user')){

			}
			else{
				redirect('login');
			}
		}
		public function index(){
			$user=$this->session->userdata('user');
			$get_user=$this->Proses->get_user($user)->row();
			$data=array(
				'judul'=>'Home',
				'user'=>$get_user,
				'menu'=>'home'
			);
			$this->load->view('mhs/_header', $data);
			$this->load->view('mhs/_footer');
		}
		public function sesi(){
			$cek_sesi=$this->Proses->cek_sesi()->row();
			$cek=count($cek_sesi);
			if($cek>0){
				redirect('mhs/pmatkul/'.$cek_sesi->waktu);
			}
			else{
				redirect('mhs/psesi');
			}
		}
		public function psesi(){
			$user=$this->session->userdata('user');
			$get_user=$this->Proses->get_user($user)->row();
			$get_sesi=$this->Proses->get_sesi();
			$data=array(
				'judul'=>'Pilih Sesi',
				'user'=>$get_user,
				'waktu'=>$get_sesi->result(),
				'menu'=>'pmatkul'
			);
			$this->load->view('mhs/_header', $data);
			$this->load->view('mhs/page/psesi');
			$this->load->view('mhs/_footer');
		}
		public function pmatkul($sesi){
			$user=$this->session->userdata('user');
			$get_user=$this->Proses->get_user($user)->row();
			$data=array(
				'judul'=>'Pilih Matkul',
				'user'=>$get_user,
				'menu'=>'pmatkul'
			);
			$this->load->view('mhs/_header', $data);
			$this->load->view('mhs/page/pmatkul');
			$this->load->view('mhs/_footer');
		}
	}
 ?>