<?
class Controller_Editposts extends Controller
{
	function __construct()
	{
		$this->model = new Model_Editposts();
		$this->view = new View();
	}
	function action_index()
	{	
		$data = $this->model->get_data();
		$this->view->generate('editposts_view.php', 'template_view.php', $data);
	}
	function action_setdata()
	{
		$post_name=$_POST['post_name'];
		$post_address=$_POST['post_address'];
		$location_id=$_POST['location_id'];
		$post_number=$_POST['post_number'];
		$this->model->set_post($location_id, $post_name, $post_address,$post_number);
		header('Location: http://localhost/editposts');
		
	}
}
