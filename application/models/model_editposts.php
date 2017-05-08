<?php
class Model_Editposts extends Model
{
    
    public $db;
    public $table_posts;
    public $table_locations;
    public $table_location_post_consistency;
    public $res_posts;
    public $res_location;
    public $res_location_post_consistency;
    
    public function get_data()
    {
        $this->db                              = new SafeMySQL();
        $this->table_posts                     = 'posts';
        $this->table_locations                 = 'locations';
        $this->table_location_post_consistency = 'location_post_consistency';
        $this->res_location_post_consistency   = $this->db->getAll("SELECT * FROM ?n", $this->table_location_post_consistency);
        $this->res_posts                       = $this->db->getAll("SELECT * FROM ?n", $this->table_posts);
        $this->res_locations                   = $this->db->getAll("SELECT * FROM ?n", $this->table_locations);
        
        $result = array(
            $this->res_locations,
            $this->res_posts,
            $this->res_location_post_consistency
        );
        return $result;
    }
    
    
    public function set_post($location_id, $post_name, $post_address, $post_number)
    {
        
        $this->db          = new SafeMySQL();
        $this->table_posts = 'posts';
        $sql_count         = 'SELECT COUNT(*) FROM ?n';
        
        
        $sql = "INSERT INTO posts(post_number,post_name,post_address ) VALUES(?i,?s,?s)";
        $this->db->query($sql, $post_number, $post_name, $post_address);
        
        //$posts_count=$this->db->getAll("SELECT COUNT(*) FROM ?n",$this->table_posts);
        $post_id = $this->db->getAll("SELECT * FROM ?n ORDER BY post_id DESC LIMIT 1", $this->table_posts);
        //$posts_count=$posts_count[0]['COUNT(*)'];
        
        $post_id = $post_id[0]['post_id'];
        //echo $post_id;
        //SELECT * FROM your_table ORDER BY id DESC LIMIT 1;
        $sql     = "INSERT INTO location_post_consistency(location_post_consistency_location_id,location_post_consistency_post_id) VALUES(?i,?i)";
        $this->db->query($sql, $location_id, $post_id);
    }
    public function delete_post($data)
    {
        $this->db = new SafeMySQL();
        
        $sql = "DELETE FROM posts WHERE post_id=?i";
        $this->db->query($sql, $data);
        $sql = "DELETE FROM location_post_consistency WHERE location_post_consistency_post_id=?i";
        $this->db->query($sql, $data);
        $result = array();
        
        echo "success";
        
    }
    
    public function update_post($number, $name, $address, $id)
    {
        $this->db = new SafeMySQL();
        $sql      = "UPDATE posts SET post_number=?i, post_name=?s, post_address=?s WHERE post_id=?i";
        $this->db->query($sql, $number, $name, $address, $id);
        return $value;
    }
}
