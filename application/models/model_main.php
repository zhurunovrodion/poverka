<?php
class Model_Main extends Model
{
	
	public $db;
	public $table_posts;
	public $table_locations;
	public $table_location_post_consistency;
	public $table_directions;
	public $table_device_list;
	public $res_posts;
	public $res_location;
	public $res_location_post_consistency;
	public $res_directions;
	public $res_device_list;
	public function get_data()
	{	
		$this->db=new SafeMySQL();
		$this->table_posts='posts';
		$this->table_locations='locations';
		$this->table_directions='directions';
        $this->table_device_list='device_list';
		$this->table_location_post_consistency='location_post_consistency';
		$this->table_device_list='stripes';

		$this->res_posts=$this->db->getAll("SELECT * FROM ?n",$this->table_posts);
		$this->res_locations=$this->db->getAll("SELECT * FROM ?n",$this->table_locations);
		$this->res_location_post_consistency=$this->db->getAll("SELECT * FROM ?n",$this->table_location_post_consistency);
		$this->res_directions=$this->db->getAll("SELECT * FROM ?n",$this->table_directions);
		$this->res_device_list=$this->db->getAll("SELECT * FROM ?n INNER JOIN devices ON stripes.stripe_device_id=devices.device_id INNER JOIN device_list ON devices.device_list_id=device_list.device_list_id ",$this->table_device_list);
		$result=array($this->res_posts, $this->res_locations, $this->res_location_post_consistency, $this->res_directions, $this->res_device_list);

		return $result;
	}

}
//SELECT * FROM stripes INNER JOIN devices ON stripes.stripe_device_id=devices.device_id INNER JOIN device_list ON devices.device_list_id=device_list.device_list_id
