<?php
include_once('/Users/joelee/PhpstormProjects/todoo/classes/class.manageTodo.php');
include_once ('session.php');
$init = new ManageTodo();



if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $delete = $init->DeleteTodo($session_name, $id);
    if ($delete == 1)
    {
        $success = 'You have deleted it successfully';
    }
    else
    {
        $error = 'Sorry there was an error';
    }
}

?>