<?php
class Nilai_utility_model extends CI_Model
{
    private $primary_key = 'id_utility';
    private $table_name  = 'nilai_utility';

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
    function get_data_kiteria($id, $id1)
    {
        $this->db->where('id_nilai_akhir', $id);
        $this->db->where('id_kriteria', $id1);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }
    function get_min($id)
    {
        $this->db->select('min(nilai_kriteria) as min');
        $this->db->where("id_kriteria", $id);
        $query = $this->db->get($this->table_name);
        return $query->row()->min;
    }
    function get_max($id)
    {
        $this->db->select('MAX(nilai_kriteria) as MAX');
        $this->db->where("id_kriteria", $id);
        $query = $this->db->get($this->table_name);
        return $query->row()->MAX;
    }
    function get_data1($id, $code_sub)
    {
        $this->db->where("id_peserta", $id);
        $this->db->where("code_sub", $code_sub);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function get_rata($id_nilai)
    {

        $this->db->select('SUM(nilai_normalisasi) as nilai_akhir');
        $this->db->where("id_nilai_akhir", $id_nilai);
        $query = $this->db->get($this->table_name);
        return $query->row()->nilai_akhir;
    }

    function get_all()
    {
        $this->db->order_by('nilai_utility', "desc");
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_all_join()
    {
        $this->db->order_by($this->primary_key, "desc");
        $this->db->join('kriteria', 'kriteria.id_kriteria=nilai_utility.id_kriteria');
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function count_all()
    {
        return $this->db->count_all($this->table_name);
    }

    function insert($data)
    {
        return $this->db->insert($this->table_name, $data);
    }

    function edit($id, $data)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table_name, $data);
    }

    function edit_nilai($id_kriteria, $id, $data)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->where('id_nilai_akhir', $id);
        return $this->db->update($this->table_name, $data);
    }

    function delete($id)
    {
        return $this->db->delete($this->table_name, array('id_peserta' => $id));
    }

    function get_data_tanggal($id)
    {
        $this->db->select('tgl_lahir');
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function get_data_last()
    {
        $query = $this->db->query("SELECT $this->primary_key from $this->table_name order by $this->primary_key DESC LIMIT 1 ");
        return $query->row()->id_utility;
    }
    function get_all_year($id)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('nilai_akhir', 'nilai_akhir.id_nilai_akhir=nilai_utility.id_nilai_akhir');
        $this->db->where("id_akademik", $id);
        $query = $this->db->get();
        return $query->result();
    }
    function get_all_user_nilai($id)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('nilai_akhir', 'nilai_akhir.id_nilai_akhir=nilai_utility.id_nilai_akhir');
        // $this->db->where("id_pegawai", $id);
        $query = $this->db->get();
        return $query->result();
    }
}
