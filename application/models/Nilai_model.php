<?php 
class Nilai_model extends CI_Model
{
    
     private $primary_key = 'id_nilai';
     private $table_name  = 'nilai';

    function __construct()
    {
        parent::__construct();
    }

    function get_data($id)
    {
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }
    function get_rata($id,$id_nilai)
    {

        $this->db->select('AVG(nilai) as nilai_kiteria');
        $this->db->join('sub_kiteria','sub_kiteria.code_sub=nilai.code_sub');
        $this->db->where("id_kiteria", $id);
        $this->db->where("id_nilai_akhir", $id_nilai);
        $query = $this->db->get($this->table_name);
        return $query->row()->nilai_kiteria;
    }

    function get_data1($id,$code_sub)
    {
        $this->db->where("id_peserta", $id);
        $this->db->where("code_sub", $code_sub);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }
    function get_data_edit($id_kriteria,$id)
    {
        $this->db->where("id_nilai_akhir", $id);
        $this->db->where("id_kriteria", $id_kriteria);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function get_all()
    {
        $this->db->order_by('nilai',"desc");
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
    function edit_nilai($id,$code, $data)
    {
        $this->db->where('id_nilai_akhir', $id);
        $this->db->where('code_sub', $code);
        return $this->db->update($this->table_name, $data);
    }

    function delete($id) {
        return $this->db->delete($this->table_name, array('id_peserta' => $id));
    }
    
    function get_data_tanggal($id)
    {
        $this->db->select('tgl_lahir');
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }
    
    function get_data_last() {
        $query = $this->db->query("SELECT $this->primary_key from $this->table_name order by $this->primary_key DESC LIMIT 1 ");
        return $query->row()->id_nilai;
    }     
}
?>