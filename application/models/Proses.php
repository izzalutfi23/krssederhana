<?php 
	class Proses extends CI_Model{
		public function cek($user, $pass){
			$query=$this->db->get_where('mhs', array('nim'=>$user, 'password'=>$pass));
			return $query;
		}
		public function get_user($user){
			$query=$this->db->get_where('mhs', array('nim'=>$user));
			return $query;
		}
		public function cek_tu($id, $password){
			$query=$this->db->get_where('tu', array('id_tu like BINARY'=>$id, 'password like BINARY'=>$password));
			return $query;
		}
		public function get_sesi(){
			$query=$this->db->get('waktu');
			return $query;
		}
		public function getusertu($id){
			$this->db->where('id_tu', $id);
			$query=$this->db->get('tu');
			return $query;
		}
		public function cek_sesi($nim){
			$this->db->select('*');
			$this->db->from('krs');
			$this->db->where('nim', $nim);
			$this->db->join('kelas', 'kelas.id_kelas=krs.id_kelas');
			$query=$this->db->get();
			return $query;
		}
	}
 ?>