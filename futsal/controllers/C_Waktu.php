<?php 

class C_Waktu extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->waktu = $this->model('M_Waktu');
	}

	public function index(){
		$data = [
			'aktif' => 'waktu',
			'judul' => 'Data Waktu',
			'data_waktu' => $this->waktu->lihat(),
			'no' => 1
		];
		$this->view('waktu/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('waktu');
		
		$data = [
			'awal' => $this->req->post('awal'),
			'akhir' => $this->req->post('akhir'),
			'lama' => $this->req->post('lama'),
		];

		if($this->waktu->tambah($data)){
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('waktu');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('waktu');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->waktu->cek($id)->num_rows == 0) redirect('waktu');

		$data = [
			'aktif' => 'waktu',
			'judul' => 'Ubah Waktu',
			'waktu' => $this->waktu->lihat_id($id)->fetch_object(),
		];
		$this->view('waktu/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->waktu->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('waktu');

		$data = [
			'awal' => $this->req->post('awal'),
			'akhir' => $this->req->post('akhir'),
			'lama' => $this->req->post('lama'),
		];
		if($this->perjalanan->ubah($data, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('waktu');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('waktu');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->waktu->cek($id)->num_rows == 0) redirect('waktu');

		if($this->waktu->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('waktu');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('waktu');
		}
	}
}