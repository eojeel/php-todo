<?php
include( 'class.database.php');

class ManageTodo
{
    public $link;

    /**
     * ManageUsers constructor.
     */
    function __construct()
    {
        $db_connection = new dbConnection();
        $this->link = $db_connection->connect();
        return $this->link;
    }

    function createTodo($username, $title, $description, $due_date,$created_on,$label)
    {
       $query = $this->link->prepare("INSERT INTO todo (username,title,description,due_date,create_date,status)VALUES (?,?,?,?,?,?)");

        $values = array($username, $title, $description, $due_date,$created_on,$label);
        $query->execute($values);
        $counts = $query->rowCount();
        return $counts;
    }

    /**
     * @param $username
     * @param $status
     * @return array|int
     */
    function ListTodo($username, $status=null)
    {
        if(isset($status))
        {
            $query = $this->link->query("SELECT * FROM todo WHERE username = '$username' AND status = '$status'");
        }
        else
        {
            $query = $this->link->query("SELECT * FROM todo WHERE username = '$username'");
        }
        $counts = $query->rowCount();
        if($counts >= 1)
        {
            $result = $query->fetchAll();
        }
        else
        {
            $result = $counts;
        }
        return $result;
    }

    /**
     * @param $username
     * @param $status
     * @return array
     */
    function CountTodo($username, $status)
    {
        $query = $this->link->query("SELECT count(*) AS TOTAL_TODO WHERE FROM todo WHERE username = '$username' AND status = '$status'");
        $query->setFetchMode(PDO::FETCH_OBJ);
        $counts = $query->fetchAll();
        return $counts;

    }

    // gets all the feilds in the array
    /**
     * @param $username
     * @param $id
     * @param $values
     * @return int
     */
    function editTodo($username, $id, $values)
    {
        $x=0;
        foreach ($values as $key -> $value)
        {
            $query = $this->link->query("UPDATE todo SET $key = '$value' WHERE username = '$username' AND id ='$id'");
            $x++;
        }
        return $x;
    }

    /**
     * @param $username
     * @param $id
     * @return int
     */
    function DeleteTodo($username, $id)
    {
        $query = $this->link->query("DELETE FROM todo WHERE username = '$username' AND id = '$id' LIMIT 1");
        $counts = $query->rowCount();
        return $counts;
    }

}

?>