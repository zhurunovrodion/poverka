<?php

class Model
{
	
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/

	// метод выборки данных
	public function get_data()
	{
		// todo
	}
	public function	set_data(){
		
	}
	public function get_count_of_table_rows(){
		
		$this->db=new SafeMySQL();
		$this->table_posts='posts';
		$this->table_locations='locations';
		$this->table_directions='directions';
        $this->table_device_list='device_list';
		
		$locations_count=$this->db->getAll("SELECT COUNT(*) FROM ?n",$this->table_locations);
		$posts_count=$this->db->getAll("SELECT COUNT(*) FROM ?n",$this->table_posts);
		$directions_count=$this->db->getAll("SELECT COUNT(*) FROM ?n",$this->table_directions);
		$device_list_count=$this->db->getAll("SELECT COUNT(*) FROM ?n",$this->table_device_list);
		$result=array($locations_count[0]['COUNT(*)'],$posts_count[0]['COUNT(*)'] , $directions_count[0]['COUNT(*)'] ,$device_list_count[0]['COUNT(*)']);

		return $result;
	}
}