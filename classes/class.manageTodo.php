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
        /* line below sets ever showing */
        $this->link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        return $this->link;
    }

    function createTodo($username,$title,$description,$due_date,$created_on,$label)
    {
        // echo '<br>'. $username,' '. $title,' '. $description,' '. $due_date,' '. $created_on,' '. $label;
        // try {
        $query = $this->link->prepare("INSERT INTO todo (username,title,description,due_date,created_on,label)VALUES (?,?,?,?,?,?)");
        $values = array($username, $title, $description, $due_date, $created_on, $label);
        $query->execute($values);
        // }catch(PDOException $e) {
        // echo "error " + $e;
        // }
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
            $query = $this->link->query("SELECT * FROM todo WHERE username = '$username' AND label = '$status' ORDER BY id DESC");
        }
        else
        {
            $query = $this->link->query("SELECT * FROM todo WHERE username = '$username' ORDER BY id DESC");
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
    function editTodo($username, $id, $title, $description, $progress,$due_date, $label)
    {
        $query = $this->link->query("UPDATE todo SET title = '$title',description = '$description', progress = '$progress', due_date ='$due_date', label = '$label', WHERE username = '$username' AND id ='$id'");

        $counts = $query->rowCount();
        return $counts;
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

    /**
     * @param $param
     * @param $username
     * @return array|int
     */
    function listindTodo($param, $username)
    {
        foreach($param as $key => $value)
        {
            $query = $this->link->query("SELECT * FROM todo WHERE $key = '$value' AND username = '$username' LIMIT 1");
        }
        $counts = $query->rowCount();
        if($counts == 1)
        {
            $result = $query ->fetchAll();
        }
        else
        {
            $result = $counts;
        }
        return $result;
    }
}

?>