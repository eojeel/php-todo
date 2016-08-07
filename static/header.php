<?php include ('/Users/joelee/PhpstormProjects/todoo/libs/session.php'); ?>
<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Todo Maker</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>

<div id="wrapper">

    <div class="container">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <ul class="nav nav-list">
                        <li><a href="index.php?label=inbox">Inbox</a></li>
                        <li><a href="index.php?label=read later">Read Later</a></li>
                        <li><a href="index.php?label=important">Important</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                            <h2>Manage ToDo</h2>
                            <a href="index.php" class="btn btn-success">Home</a>
                            <a href="add_new.php" class="btn btn-success">Add New</a>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        </div>