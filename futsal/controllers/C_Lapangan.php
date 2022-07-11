<?php 

class C_Lapangan extends Controller{
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
		$this->lapangan = $this->model('M_Lapangan');
	}

	public function index(){
		$data = [
			'aktif' => 'Lapangan',
			'judul' => 'Data Lapangan',
			'data_tipe' => $this->tipe->lihat(),
			'data_lapangan' => $this->lapangan->lihat(),
			'no' => 1
		];
		$this->view('lapangan/index', $data);
	}

	public function tambah(){
		if(!isset($_POST['tambah'])) redirect('lapangan');

		// proses upload
		$upload_dir = BASEPATH . DS . 'uploads' . DS;
		$asal = $_FILES['gambar']['tmp_name'];
		$ekstensi = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
		$error = $_FILES['gambar']['error'];

		$img_name = $this->req->post('nama');
		$img_name = $this->req->post('nama');
		$img_name = strtolower($img_name);
		$img_name = str_replace(' ', '-', $img_name);
		$img_name = $img_name . '-' . time();

		if($error == 0){
			if(file_exists($upload_dir . $img_name . '.' . $ekstensi)) unlink($upload_dir . $img_name . '.' . $ekstensi);
			
			if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
				$data = [
					'id_tipe' => $this->req->post('id_tipe'),
					'nama' => $this->req->post('nama'),
					'jumlah' => $this->req->post('jumlah'),
					'gambar' => $img_name . '.' . $ekstensi,
				];

				if($this->lapangan->tambah($data)){
					setSession('success', 'Data berhasil ditambahkan!');
					redirect('lapangan');
				} else {
					setSession('error', 'Data gagal ditambahkan!');
					redirect('lapangan');
				}
			} else die('gagal upload gambar');
		} else die('gambar error');
	}

	public function detail($id){
		if(!isset($id) || $this->lapangan->cek($id)->num_rows == 0) redirect('lapangan');

		$data = [
			'aktif' => 'lapangan',
			'judul' => 'Detail Lapangan',
			'lapangan' => $this->lapangan->detail($id)->fetch_object(),
		];

		$this->view('lapangan/detail', $data);
	}

	public function ubah($id){
		if(!isset($id) || $this->lapangan->cek($id)->num_rows == 0) redirect('lapangan');

		$data = [
			'aktif' => 'lapangan',
			'judul' => 'Ubah Lapangan',
			'lapangan' => $this->lapangan->lihat_id($id)->fetch_object(),
			'data_tipe' => $this->tipe->lihat(),
		];
		$this->view('lapangan/ubah', $data);
	}

	public function proses_ubah($id){
		if(!isset($id) || $this->lapangan->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('lapangan');

		$upload_dir = BASEPATH . DS . 'uploads' . DS;
		$asal = $_FILES['gambar']['tmp_name'];
		$ekstensi = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
		$error = $_FILES['gambar']['error'];

		$img_name = $this->req->post('nama');
		$img_name = $this->req->post('nama');
		$img_name = strtolower($img_name);
		$img_name = str_replace(' ', '-', $img_name);
		$img_name = $img_name . '-' . time();

		$data = [
			'id_tipe' => $this->req->post('id_tipe'),
			'nama' => $this->req->post('nama'),
			'jumlah' => $this->req->post('jumlah'),
			'gambar' => $img_name . '.' . $ekstensi,
		];

		$gambar_sebelumnya = $this->lapangan->detail($id)->fetch_object()->gambar;

		if($this->lapangan->ubah($data, $id)){
			unlink($upload_dir . $gambar_sebelumnya) or die('gagal hapus gambar lama');
			if($error == 0){
				if(file_exists($upload_dir . $img_name . '.' . $ekstensi)) unlink($upload_dir . $img_name . '.' . $ekstensi);
			
				if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
					setSession('success', 'Data berhasil diubah!');
					redirect('lapangan');
				} else die('gagal upload gambar');
			} else die('gambar error');
		} else {
			setSession('error', 'Data gagal diubah!');
			redirect('lapangan');
		}
	}

	public function hapus($id = null){
		if(!isset($id) || $this->lapangan->cek($id)->num_rows == 0) redirect('lapangan');

		$gambar	= $this->lapangan->detail($id)->fetch_object()->gambar;
		unlink(BASEPATH . DS . 'uploads' . DS . $gambar) or die('gagal hapus gambar!');
		if($this->lapangan->hapus($id)){
			setSession('success', 'Data berhasil dihapus!');
			redirect('lapangan');
		} else {
			setSession('error', 'Data gagal dihapus!');
			redirect('lapangan');
		}
	}
}