<?php 
class Sub_kiteria_model extends CI_Model
{	
	 private $primary_key = 'id_sub';
     private $table_name  = 'sub_kiteria';

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
    
    function get_data_all($id)
    {
        $this->db->where('id_kiteria', $id);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_all()
    {
        $this->db->order_by($this->primary_key);
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

    function get_all_data($id)
    {
        $this->db->where('id_kiteria', $id);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function edit($id, $data)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table_name, $data);
    }

    function delete($id)
    {
        return $this->db->delete($this->table_name, array($this->primary_key => $id));
    }

    function get_join_all()
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('kiteria','kiteria.id_kiteria=sub_kiteria.id_kiteria');
        $query = $this->db->get();
        return $query->result();
    }

    function get_data_last() {
        $query = $this->db->query("SELECT $this->primary_key from $this->table_name order by $this->primary_key DESC LIMIT 1 ");
        return $query->row()->id_sub;
    }

    function get_code($id) {
        $query = $this->db->query("SELECT code from kiteria where id_kiteria= $id ");
        return $query->row()->code;
    }   
}
?>