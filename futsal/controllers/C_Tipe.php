<?php 

class C_Tipe extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}
		
		$this->addFunction('web');
		$this->addFunction('session');
		$this->req = $this->library('Request');
		$this->tipe = $this->model('M_Tipe');
	}

	public function index(){
		$data = [
			'aktif' => 'tipe',
			'judul' => 'Data Tipe',
			'data_tipe' => $this->tipe->lihat(),
			'no' => 1
		];
		$this->view('tipe/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('tipe');

		$tipe = $this->req->post('tipe');
		if($this->tipe->tambah($tipe)){
			setSession('success', 'Data berhasil ditambahkan!');
			redirect('tipe');
		} else {
			setSession('error', 'Data gagal ditambahkan!');
			redirect('tipe');
		}
	}

	public function ubah($id){
		if(!isset($id) || $this->tipe->cek($id)->num_rows == 0) redirect('tipe');

		$data = [
			'aktif' => 'tipe',
			'judul' => 'Ubah Tipe',
			'tipe' => $this->tipe->lihat_id($id)->fetch_object(),
		];
		$this->view('tipe/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->tipe->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('tipe');

		$tipe = $this->req->post('tipe');
		if($this->tipe->ubah($tipe, $id)){
			setSession('success', 'Data berhasil diubah!');
			redirect('tipe');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('tipe');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->tipe->cek($id)->num_rows == 0) redirect('tipe');

		if($this->tipe->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('tipe');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('tipe');
		}
	}
}