<?php
class mPembelian extends CI_Model {

	// Membuat List Pencarian Data Supplier
	function searchSupplier($searchTerm=""){
		//fetch data
		$this->db->select('id_supp, nama_supp');
		$this->db->limit(5);
		$this->db->where("nama_supp like '%".$searchTerm."%'");
		$fetc_records = $this->db->get('tbl_m_supplier');
		$hasil = $fetc_records->result_array();

		//Inisialisasi data
		$data = array();
		foreach($hasil as $rows){
			$data[] = array("id"=>$rows['id_supp'], "text"=>$rows['nama_supp']);
		}
		return $data;
	}

	//Nomor Dinamis Faktur pembelian
	function getNoFaktur(){
		$query = $this->db->query("SELECT MAX(RIGHT(no_faktur,4)) AS nomor FROM tbl_beli_m WHERE DATE(created_date)=CURDATE()");
		if($query->num_rows()>0){
			foreach($query->result() as $k){
				$tmp = ((int)$k->nomor)+1;
				$nourut = sprintf("%04s",$tmp);
			}
		}else{
			$nourut = "0001";
		}
		$code="PB-".date('dmy')."-".$nourut;
		return $code;
	}

	//cek No Faktur
	function cekfaktur($no_faktur) {
		$this->db->where('no_faktur',$no_faktur);
		$query = $this->db->get('tbl_beli_m');
		$count_row = $query->num_rows();

		if ($count_row > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// Cek Double Item Barang
	function cekItemDuplicate($no_faktur, $id_produk) {
		$where = array('no_faktur' => $no_faktur, 'id_produk' => $id_produk);
		$this->db->where($where);
		$query = $this->db->get('tbl_beli_d');
		$count_row = $query->num_rows();

		if ($count_row > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// get list Barang di Beli
	function getBarangBeli($nomor){
		$this->db->select('b.*, brg.nama_produk, k.nama_kategori, s.nama_satuan');
		$this->db->from('tbl_beli_d b');
		$this->db->join('tbl_m_produk brg', 'b.id_produk = brg.id_produk');
		$this->db->join('tbl_m_kategori k', 'brg.id_kategori = k.id_kategori');
		$this->db->join('tbl_m_satuan s', 'brg.id_satuan = s.id_satuan');
		$this->db->where('b.no_faktur', $nomor);
		return $this->db->get()->result_array();
	}

	//Save tbl_beli_d (Detail Transaksi)
	function insertDetail($data){
		$this->db->trans_strict(TRUE);
		$this->db->trans_start();
		$this->db->trans_begin();
		$this->db->insert('tbl_beli_d', $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			return $this->db->trans_rollback();
		} else {
			return $this->db->trans_commit();
		}
	}

	// Save Transaksi Pembelian Master dan Detail
	function saveTransaksi($dataMaster, $dataDetail){
		$this->db->trans_strict(TRUE);
		$this->db->trans_start();
		$this->db->trans_begin();
		$this->db->insert('tbl_beli_m', $dataMaster);
		$this->db->insert('tbl_beli_d', $dataDetail);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			return $this->db->trans_rollback();
		} else {
			return $this->db->trans_commit();
		}
	}
	//Closing Transaksi (Final)
	function closingpembelian($no_faktur, $dataMaster){
		$this->db->trans_strict(TRUE);
		$this->db->trans_start();
		$this->db->trans_begin();
		$this->db->where('no_faktur', $no_faktur);
		$this->db->update('tbl_beli_m', $dataMaster);
		// Simpan Kartu Stok Produk
		//Tampilkan semua data transaksi berdasarkan no faktur yang selesai
		$tgl_beli = date_format(date_create($this->input->post('tgl_beli')), 'Y-m-d');
		$query = $this->db->query("SELECT * FROM tbl_beli_d WHERE no_faktur='$no_faktur'");
		foreach($query->result() as $row) {
			$kartu_stok = array(
				'no_ref' => $no_faktur,
				'tanggal' => $tgl_beli,
				'keterangan' => 'Pembelian barang No Faktur: ' . $no_faktur,
				'transaksi' => 'Pembelian Barang',
				'id_produk' => $row->id_produk,
				'is_dk' => '0', //Barang masuk
				'harga' => $row->harga_beli,
				'qty' => $row->qty
			);

			$this->db->insert('tbl_produk_kartu_stok', $kartu_stok);}
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return $this->db->trans_rollback();
		} else {
			return $this->db->trans_commit();
		}
	}

	//Menghapus item Barang
	function deleteItembarang($id_beli){
		$this->db->where('id_beli', $id_beli);
		return $this->db->delete('tbl_beli_d');
	}

	// Hapus Semua Data Transaksi Pembelian
	function deleteData($no_faktur){
		$this->db->trans_strict(TRUE);
		$this->db->trans_start();
		$this->db->trans_begin();
		$this->db->delete('tbl_beli_m', array('no_faktur' => $no_faktur));
		$this->db->delete('tbl_produk_kartu_stok', array('no_ref' => $no_faktur));
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE){
			return $this->db->trans_rollback();
		} else {
			return $this->db->trans_commit();
		}
	}

	//Menampilkan Faktur Pembelian
	function getFakturPembelian($no_faktur= false){
		$this->db->join("tbl_m_supplier","tbl_m_supplier.id_supp = tbl_beli_m.id_supp","left");
		$this->db->order_by('no_faktur','DESC');
		if($no_faktur === false){
			$query = $this->db->get('tbl_beli_m');
			return $query->result_array();
		}
		$query = $this->db->get_where('tbl_beli_m', array('no_faktur' => $no_faktur));
		return $query->row();
	}
}
