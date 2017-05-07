<?php
class Model_Editlocations extends Model
{	
	public $db;
	public $table_locations;
	public function get_data()
	{
		$this->db=new SafeMySQL();
		$this->table_locations='locations';
		$this->res_locations=$this->db->getAll("SELECT * FROM ?n",$this->table_locations);
		$result=array($this->res_locations);
		return $result;
		}
	public function set_location($data){

		$this->db=new SafeMySQL();
		$this->table_locations='locations';
		$sql_count='SELECT COUNT(*) FROM ?n';
		$locations_count=$this->db->getAll("SELECT COUNT(*) FROM ?n",$this->table_locations);
		$locations_count=$locations_count[0]['COUNT(*)'];
		$locations_count++;
		
		$sql="INSERT INTO locations(location_id,location_name) VALUES(?i,?s)";
		$this->db->query($sql, $locations_count , $data);
	}
	
	public function delete_location($data){
		$this->db=new SafeMySQL();
		$data_id=substr($data, 5);
		$sql="DELETE FROM locations WHERE location_id=?s";
		$this->db->query($sql, $data_id);    
		$result = array(); 
		$result['id'] = $data_id;
		return json_encode($result);
		
	}
	public function update_location($id, $value){
		$this->db=new SafeMySQL();
		$sql="UPDATE locations SET location_name=?s WHERE location_id=?i";
		$this->db->query($sql, $value, $id);
		return $value; 
	}
		
}

