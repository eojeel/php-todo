<?php

include_once ('/Users/joelee/PhpstormProjects/todoo/classes/class.Manageusers.php');

if(isset($_POST['register']))
{
    session_start();
    $users = new ManageUsers();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $date = date("m.d.y");
    $time = date("H:i:s");

    if(empty($username) || empty($password) || empty($repassword) || empty($email))
    {
        $error = "All fields are requred";
    }
    elseif($password !== $repassword)
    {
        $error = 'Password does not match';
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $error = 'Email is not valid';
    }
    else
    {
        $check_availability = $users->GetUserInfo($username);
        if ($check_availability == 0)
        {
            // MD5 Pasword
            //$password = md5($password);
            $register_user = $users->RegisterUsers($username, $email, $password, $ip_address, $time, $date);
            if($register_user == 1)
            {

                $make_sessions = $users->GetUserInfo($username);
                // for each to filter the arrays (passing peramiter)
                foreach($make_sessions as $userSessions) {
                    $_SESSION['todo_name'] = $userSessions['username'];
                    if(isset($_SESSION['todo_name']))
                    {
                        header("location: index.php");
                    }
                }

            }
        }
        else
        {
            $error = 'Username already exitst';
        }
    }
}

if(isset($_POST['login']))
{
    session_start();
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    if(empty($username) || empty($password))
    {
        $error = 'All feilds are required';
    }
    else
    {
        //$password = md5($password);
        $login_users = new ManageUsers();
        $auth_user = $login_users->LoginUsers($username,$password);

        if($auth_user == 1)
        {
            $make_sessions = $users->GetUserInfo($username);
            foreach($make_sessions as $userSessions) {
                $_SESSION['todo_name'] = $userSessions['username'];
                if(isset($_SESSION['todo_name']))
                {
                    header("location: index.php");
                }
            }
        }
        else
        {
            $error = 'Invalid Credentials';
        }
    }

    }




    ?>