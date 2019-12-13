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
			$nim=$this->session->userdata('user');
			$cek_sesi=$this->Proses->cek_sesi($nim)->row();
			$hitung=$this->Proses->cek_sesi($nim);
			$cek=$hitung->num_rows();
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
			$wkt = $this->uri->segment('3');
			$user=$this->session->userdata('user');
			$get_user=$this->Proses->get_user($user)->row();
			$getmatkul=$this->Proses->get_matkul($wkt);
			$getkrs = $this->Proses->get_krs($user);
			$data=array(
				'judul'=>'Pilih Matkul',
				'user'=>$get_user,
				'menu'=>'pmatkul',
				'matkul'=>$getmatkul->result(),
				'kelas'=>null,
				'krs' => $getkrs->result()
			);
			$this->load->view('mhs/_header', $data);
			$this->load->view('mhs/page/pmatkul');
			$this->load->view('mhs/_footer');
		}
		public function cari(){
			$param = array(
				'waktu'=>$_POST['waktu'],
				'id_matkul'=>$_POST['id_matkul']
			);
			$user=$this->session->userdata('user');
			$get_user=$this->Proses->get_user($user)->row();
			$getmatkul=$this->Proses->get_matkul($param['waktu']);
			$getkelas = $this->Proses->get_kelas($param);
			$getkrs = $this->Proses->get_krs($user);
			$data=array(
				'judul'=>'Pilih Matkul',
				'user'=>$get_user,
				'menu'=>'pmatkul',
				'matkul'=>$getmatkul->result(),
				'kelas' => $getkelas->result(),
				'waktu' => $param['waktu'],
				'krs' => $getkrs->result()
			);
			$this->load->view('mhs/_header', $data);
			$this->load->view('mhs/page/pmatkul');
			$this->load->view('mhs/_footer');
		}
		public function add_krs(){
			$waktu = $_POST['waktu'];
			$sks = $_POST['sks'];
			$input = $this->input->post(null, TRUE);
			$this->Proses->add_k($input, $sks);
			redirect('mhs/pmatkul/'.$waktu);
		}
		public function del_krs(){
			$waktu = $this->uri->segment('4');
			$id = $this->uri->segment('3');
			$nim = $this->uri->segment('5');
			$sks = $this->uri->segment('6');
			$this->Proses->del_krs($id, $nim, $sks);
			redirect('mhs/pmatkul/'.$waktu);
		}
	}
 ?>