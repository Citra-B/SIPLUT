<?php 

class M_Lapangan extends Model {
	public function lihat(){
		$query = $this->setQuery('SELECT nama, tbl_tipe.tipe AS tipe, jumlah, tbl_lapangan.id as id FROM tbl_lapangan INNER JOIN tbl_tipe ON tbl_tipe.id = tbl_lapangan.id_tipe');
		$query = $this->execute();
		return $query;
	}

	public function tambah($data){
		$query = $this->insert('tbl_lapangan', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->setQuery("SELECT *, tbl_lapangan.id AS id_lapangan, tbl_lapangan.id_tipe AS id_tipe FROM tbl_lapangan INNER JOIN tbl_tipe ON tbl_tipe.id = tbl_lapangan.id_tipe where tbl_lapangan.id = $id");
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_lapangan', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_lapangan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->setQuery("SELECT *, tbl_lapangan.id AS id_lapangan, tbl_lapangan.id_tipe AS id_tipe FROM tbl_lapangan INNER JOIN tbl_tipe ON tbl_tipe.id = tbl_lapangan.id_tipe where tbl_tipe.id = $id");
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_lapangan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}
}