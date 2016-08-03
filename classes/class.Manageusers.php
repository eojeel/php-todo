<?php
    include( 'class.database.php');

    class ManageUsers{
        public $link;

        /**
         * ManageUsers constructor.
         */
        function __construct(){
            $db_connection = new dbConnection();
            $this->link = $db_connection->connect();
            return $this->link;
        }


        /**
         * @param $username
         * @param $password
         * @param $ip_address
         * @param $time
         * @param $date
         * @return int
         */
        function RegisterUsers($username, $email, $password, $ip_address, $time, $date)
        {
            // creating a prepared statment
            $query = $this->link->prepare("INSERT INTO users (username,email,password,ip_address,time,date) VALUES (?,?,?,?,?,?);");
            $values = array($username, $email, $password, $ip_address, $time, $date);
            // execure the prepared query
            $query->execute($values);
            // check effected rows
            $counts = $query->rowCount();
            return $counts;
        }

        /**
         * @param $username
         * @param $password
         */
        function LoginUsers($username, $password){
            $query = $this->link->query("SELECT *  FROM users WHERE username = '$username' AND password = '$password'");
            $rowcount = $query->rowCount();
            return $rowcount;

        }

        /**
         * @param $username
         */
        function GetUserInfo($username){
            $query = $this->link->query("SELECT * FROM users WHERE username = '$username'");
            $rowcount = $query->rowCount();
            if ($rowcount == 1)
            {
                $result = $query->fetchAll();
                return $result;
            }
            else
            {
                return $rowcount;
            }
        }
    }

    $users = new ManageUsers();
    //echo $users->RegisterUsers('bob','bob','127.0.0.1','12:00','29-02-2015');



?>