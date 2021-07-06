<?php 

class Pengguna_model extends CI_Model
{
	
	 private $primary_key = 'id_pegawai';
     private $table_name  = 'pegawai';

	function __construct() {
        parent::__construct();
    }

   function cek_login($nik,$password){

   		$query=$this->db->query ("SELECT * From pegawai where nik ='{$nik}' AND password ='{$password}' ");
   		return $query->row();
   }
   function get_all() {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
  

    function get_data($id) {
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function get_data_where_idproyek($id) {
        $this->db->where('id_proyek', $id);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function count_all() {
        return $this->db->count_all($this->table_name);
    }

    function insert($data) {
        return $this->db->insert($this->table_name, $data);
    }

    function edit($id, $data) {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table_name, $data);
    }
    function edit_data($id, $data) {
        $this->db->where("id_proyek", $id);
        return $this->db->update($this->table_name, $data);
    }

    function delete($id) {
        return $this->db->delete($this->table_name, array($this->primary_key => $id));
    }
}
 ?>