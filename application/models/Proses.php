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
		public function get_matkul($wkt){
			$this->db->where('kelas.waktu', $wkt);
			$this->db->group_by('matkul.nama_matkul');
			$this->db->join('kelas', 'matkul.id_matkul=kelas.id_matkul');
			return $this->db->get('matkul');
		}
		public function get_kelas($param = null){
			$this->db->select('*');
			$this->db->from('kelas');
			if($param!=null){
				$this->db->where('kelas.waktu', $param['waktu']);
				$this->db->where('kelas.id_matkul', $param['id_matkul']);
			}
			$this->db->join('matkul', 'kelas.id_matkul=matkul.id_matkul');
			$this->db->join('waktu', 'kelas.waktu=waktu.waktu');
			$query = $this->db->get();
			return $query;
		}
		public function get_krs($nim){
			$this->db->where('krs.nim', $nim);
			$this->db->join('kelas', 'krs.id_kelas=kelas.id_kelas');
			$this->db->join('matkul', 'kelas.id_matkul=matkul.id_matkul');
			return $this->db->get('krs');
		}
		public function add_k($data, $sks){
			$param = array(
				'nim' => $data['nim'],
				'id_kelas' => $data['id_kelas']
			);
			$this->db->set('kuota_sks', 'kuota_sks - '. (int)$sks, FALSE);
			$this->db->where('nim', $data['nim']);
			$this->db->update('mhs');
			$this->db->insert('krs', $param);
		}
		public function del_krs($id, $nim, $sks){
			$this->db->set('kuota_sks', 'kuota_sks + '. (int)$sks, FALSE);
			$this->db->where('nim', $nim);
			$this->db->update('mhs');

			$this->db->where('id_krs', $id);
			$this->db->delete('krs');
		}
	}
 ?>