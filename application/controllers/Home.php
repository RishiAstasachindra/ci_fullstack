<?php
class Home extends CI_Controller
{
	public function index()
	{
		//$this->load->view('home');	// memanggil file home php yang ada di folder view
		$data['page']		= "home";
		$data['judul']		= "Beranda";
		$data['deskripsi']	= "Full Stack Web Development System";
		$this->template->views('home', $data);
	}
}
?>
