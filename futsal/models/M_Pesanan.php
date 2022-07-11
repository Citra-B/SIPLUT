<?php 

class M_Pesanan extends Model{
	public function tambah($data){
		$query = $this->insert('tbl_pesanan', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat(){
		$query = $this->setQuery("SELECT tbl_pesanan.id, tbl_pemesan.nama AS nama_pemesan, tbl_lapangan.nama AS nama_lapangan, tbl_jenis_bayar.jenis_bayar FROM tbl_pesanan INNER JOIN tbl_pemesan ON tbl_pesanan.id_pemesan = tbl_pemesan.id INNER JOIN tbl_lapangan ON tbl_pesanan.id_lapangan = tbl_lapangan.id INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id");
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function ubah($data, $id){
		$query = $this->update('tbl_pesanan', $data, ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_pesanan', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->setQuery("SELECT tbl_pesanan.*, tbl_pemesan.nama AS nama_pemesan, tbl_lapangan.nama AS nama_lapangan, tbl_waktu.asal, tbl_waktu.tujuan, tbl_jenis_bayar.jenis_bayar FROM tbl_pesanan INNER JOIN tbl_pemesan ON tbl_pesanan.id_pemesan = tbl_pemesan.id INNER JOIN tbl_lapangan ON tbl_pesanan.id_lapangan = tbl_lapangan.id INNER JOIN tbl_jenis_bayar ON tbl_pesanan.id_jenis_bayar = tbl_jenis_bayar.id INNER JOIN tbl_waktu ON tbl_pesanan.id_waktu = tbl_waktu.id WHERE tbl_pesanan.id = $id");
		$query = $this->execute();
		return $query;
	}
}