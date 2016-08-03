<?php
include_once ('/Users/joelee/PhpstormProjects/todoo/classes/class.manageTodo.php');
$init = new ManageTodo();

if(isset($_POST['create_todo']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $label = $_POST['label_under'];

    if(empty($title) || empty($due_date) || empty($label))
    {
        $error = 'All feilds are requred accept the option one';
    }

    else
    {
        $title = strip_tags($title);
        $description = strip_tags($description);
        $title = mysqli_real_escape_string($init->link, $title);
        $description = mysqli_real_escape_string($init->link, $description);

        $username = 'joe';
        $created_on = date('Y-m-d');

        $init->createTodo($username,$title,$description,$due_date,$created_on,$label);
        if ($create_todo == 1)
        {
            $success = 'Todo Created Sucessfully';
        }
        else
        {
         $error = 'There was an error';
        }
    }


}

?>