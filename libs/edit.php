<?php
include_once('/Users/joelee/PhpstormProjects/todoo/classes/class.manageTodo.php');
include_once('session.php');
$init = new ManageTodo();


if(isset($_POST['edit_todo']))
{
    $id = $_GET['id'];
    $title = $_POST['title'];
    $username = $session_name;
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $label = $_POST['label_under'];
    $progress = '100';

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

?>