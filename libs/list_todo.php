<?php
include_once ('/Users/joelee/PhpstormProjects/todoo/classes/class.manageTodo.php');
include_once('session.php');
$init = new ManageTodo();


if(isset($_GET['id']))
{
 $id = $_GET['id'];
    $list_todo = $init->listindTodo(array('id'=>$id),$session_name);

}
else
{
    if(isset($_GET['label']))
    {
        $label = $_GET['label'];
        $list_todo = $init->ListTodo($session_name,$label);
    }
    else
    {
        $list_todo = $init->listTodo($session_name);
    }
}

?>