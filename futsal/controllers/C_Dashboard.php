<?php 

class C_Dashboard extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}

		$this->addFunction('web');
		$this->lapangan = $this->model('M_Lapangan');
		$this->pemesan = $this->model('M_Pemesan');
		$this->pesanan = $this->model('M_Pesanan');
		$this->akun = $this->model('M_Akun');
	}
	public function index(){
		$data = [
			'aktif' => 'dashboard',
			'judul' => 'Dashboard',
			'lapangan' => $this->lapangan->lihat(),
			'pemesan' => $this->pemesan->lihat(),
			'pesanan' => $this->pesanan->lihat(),
			'akun' => $this->akun->lihat(),
		];
		$this->view('dashboard', $data);
	}
}