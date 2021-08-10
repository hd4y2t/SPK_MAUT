<?php
class Nilai_akhir_model extends CI_Model
{
    private $primary_key = 'id_nilai_akhir';
    private $table_name  = 'nilai_akhir';

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

    function get_all()
    {
        $this->db->order_by($this->primary_key, "desc");
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_all_join($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('universitas', 'universitas.id_universitas=nilai_akhir.id_universitas');
        $this->db->join('jurusan', 'jurusan.id_jurusan=nilai_akhir.id_jurusan');
        $this->db->join('akademik', 'akademik.id_akademik=nilai_akhir.id_akademik');
        // $this->db->order_by('nilai_akhir',"desc");
        $this->db->where('id_pegawai', $id_pegawai);
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_join_nilai($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('universitas', 'universitas.id_universitas=nilai_akhir.id_universitas');
        $this->db->join('jurusan', 'jurusan.id_jurusan=nilai_akhir.id_jurusan');
        $this->db->join('akademik', 'akademik.id_akademik=nilai_akhir.id_akademik');
        $this->db->where('nilai_akhir.id_akademik', $id_pegawai);
        // $this->db->order_by('nilai_akhir',"desc");
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_join_dosen($id)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('universitas', 'universitas.id_universitas=nilai_akhir.id_universitas');
        $this->db->join('jurusan', 'jurusan.id_jurusan=nilai_akhir.id_jurusan');
        $this->db->order_by('nilai_akhir', "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_join_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('universitas', 'universitas.id_universitas=nilai_akhir.id_universitas');
        $this->db->join('jurusan', 'jurusan.id_jurusan=nilai_akhir.id_jurusan');
        $this->db->join('akademik', 'akademik.id_akademik=nilai_akhir.id_akademik');
        $this->db->where('nilai_akhir.id_nilai_akhir', $id);
        $this->db->order_by('nilai_akhir', "desc");
        $query = $this->db->get();
        return $query->row();
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

    function delete($id)
    {
        $this->db->delete('nilai', array('id_nilai_akhir' => $id));
        $this->db->delete('nilai_utility', array('id_nilai_akhir' => $id));
        return $this->db->delete($this->table_name, array('id_nilai_akhir' => $id));
    }

    function get_data_last()
    {
        $query = $this->db->query("SELECT $this->primary_key from $this->table_name order by $this->primary_key DESC LIMIT 1 ");
        return $query->row()->id_nilai_akhir;
    }

    function get_all_join1($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('universitas', 'universitas.id_universitas=nilai_akhir.id_universitas');
        $this->db->join('jurusan', 'jurusan.id_jurusan=nilai_akhir.id_jurusan');
        $this->db->join('akademik', 'akademik.id_akademik=nilai_akhir.id_akademik');
        $this->db->where('nilai_akhir.id_pegawai', $id_pegawai);
        $this->db->order_by('nilai_akhir', "desc");
        $query = $this->db->get();
        return $query->result();
    }
}
