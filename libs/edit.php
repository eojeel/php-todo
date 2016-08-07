<?php
include_once('/Users/joelee/PhpstormProjects/todoo/classes/class.manageTodo.php');
include_once('session.php');
$init = new ManageTodo();

if(isset($_POST['edit_todo']))
{
    $username = $session_name;
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $label = $_POST['label_under'];
    $progress = $_POST['progress_value'];

    echo $username.' ', $id.' ',$title.' ';

    $edit = $init->editTodo($username, $id, $title, $description, $progress,$due_date, $label);

        if ($edit == 1)
        {
            header ("location: edit.php?id=".$id);
        }
        else
        {
            $error = 'Sorry therew as an error updating';
        }

}

?>®