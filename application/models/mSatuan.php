<?php 
class mSatuan extends CI_Model {
  function getData(){
    return $this->db->get('tbl_m_satuan')->result();
  }
  // Menambahkan data (Create)
  function insertData($data){
    return $this->db->insert('tbl_m_satuan',$data);
  }
  // Untuk menampilkan data berdasarkan ID (Read)
  function getDataById($id){
    $this->db->where('id_satuan',$id);
    return $this->db->get('tbl_m_satuan')->row();
  }
  // Update data berdasarkan ID (Update)
  function updateData($id,$data) {
    $this->db->where('id_satuan',$id);
    return $this->db->update('tbl_m_satuan',$data);
  }
  // Menghapus data berdasarkan ID (Delete)
  function deleteData($id){
    $this->db->where('id_satuan',$id);
    return $this->db->delete('tbl_m_satuan');
  }
  // Validasi Data Duplikat
  function cekDuplicate($satuan) {
    $this->db->where('nama_satuan',$satuan);
    $query = $this->db->get('tbl_m_satuan');
    return $query->num_rows();
  }
}
