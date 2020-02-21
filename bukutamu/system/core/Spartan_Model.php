<?php
class Spartan_Model extends CI_Model {

	protected $tableName = '';
	protected $primaryKey = '';

    function __construct($tableName, $primaryKey) {
        parent::__construct();

    	$this->tableName = $tableName;
    	$this->primaryKey = $primaryKey;
    }

    // query insert
    public function create($array){

    	$primaryKey = $this->primaryKey;
    	$tableName = $this->tableName;

    	$filtered_array = array();
    	
    	foreach ($array as $key => $value) {
    		$filtered_array[$key] = htmlentities($value);
    	}

    	// inserting data
    	$this->db->insert($tableName, $filtered_array);

    	// get inserted_id
    	$id = $this->db->insert_id();

    	// return current row
    	$this->db->from($tableName);
    	$this->db->where($primaryKey, $id);
    	$query = $this->db->get();

    	return $query->row_array();
    }
   	

}