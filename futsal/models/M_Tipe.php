<?php 

class M_Tipe extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_tipe', ['tipe' => $data]);
		$query = $this->execute();
		return $query;
	}

	public function lihat(){
		$query = $this->get('tbl_tipe');
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_tipe', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($tipe, $id){
		$query = $this->update('tbl_tipe', ['tipe' => $tipe], ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_tipe', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_tipe', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}