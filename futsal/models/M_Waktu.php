<?php 

class M_Waktu extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_waktu', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat(){
		$query = $this->get('tbl_waktu');
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_waktu', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_waktu', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_waktu', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_waktu', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}