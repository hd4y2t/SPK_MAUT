<?php 
class kriteria_model extends CI_Model
{	
	 private $primary_key = 'id_kriteria';
     private $table_name  = 'kriteria';

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
        $this->db->order_by($this->primary_key);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_all_bobot()
    {
        $this->db->select('sum(bobot) as normal');
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->row()->normal;
    }

    function count_all()
    {
        return $this->db->count_all($this->table_name);
    }

    function insert($data) {
        return $this->db->insert($this->table_name, $data);
    }

    function edit($id, $data) {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table_name, $data);
    }

    function delete($id) {
        return $this->db->delete($this->table_name, array($this->primary_key => $id));
    }
    function get_data_last()
    {
        $query = $this->db->query("SELECT $this->primary_key from $this->table_name order by $this->primary_key DESC LIMIT 1 ");
        return $query->row()->id_kriteria;
    }

    function tambah_table($id_kriteria)
    {
        $this->load->dbforge();
        $field = array(
            $id_kriteria=> array(
            'type' => 'int',
            'constraint' => '10',
            'null' => TRUE));
        return $this->dbforge->add_column('ratting', $field);
        return $this->dbforge->add_column('matrik', $field);
    } 
    function delete_fields($id_kriteria){
     $this->load->dbforge();
        return $this->dbforge->drop_column('ratting', $id_kriteria);
        return $this->dbforge->drop_column('matrik', $id_kriteria);
    }    
}
