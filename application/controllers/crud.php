<?php

/**
 * 
 */
class Crud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
			$this->load->helper('url');
		# code...
	}
	function index()
	{
		$data['produk'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
	}
	function tambah(){
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$desk = $this->input->post('desk');

		$data = array(
			'nama' => $nama,
			'harga' => $harga,
			'desk' => $desk
		);
		$this->m_data->input_data($data,'produk');
		redirect('crud');
	}
	function hapus($id_produk){
		$where = array('id_produk'=> $id_produk);
		$this->m_data->hapus_data($where,'produk');
		redirect('crud');
	}
	function edit($id_produk){
		$id_produk = $this->input->post('id_produk');
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$desk = $this->input->post('desk');

		$data = array(
			'nama' => $nama,
			'harga' => $harga,
			'desk' => $desk
		);
		$where = array('id_produk'=> $id_produk);

		$this->m_data->edit_data($where,$data,'produk');
		redirect('crud');
	}
}

?>