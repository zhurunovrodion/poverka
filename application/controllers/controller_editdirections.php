<?
class Controller_Editdirections extends Controller
{
    function __construct()
    {
        $this->model = new Model_Editdirections();
        $this->view  = new View();
    }
    function action_index()
    {
        $count= $this->model->get_count_of_table_rows();
        $this->view->generate('editdirections_view.php', 'template_view.php', $data, $count);
    }
    function action_setdata()
    {
       
        
    }
    function action_deletepost()
    {
       
    }
    function action_updatepost()
    {
        
        }
}

