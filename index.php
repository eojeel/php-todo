<?php
include_once ('static/header.php');
include_once ('libs/list_todo.php');
include_once ('libs/delete.php');
?>

<?php if(isset($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';} ?>
<?php if(isset($success)){ echo '<div class="alert alert-success" role="alert">'.$success.'</div>';}?>

<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
        <tr class="success">
            <td>Title</td>
            <td>Snippet</td>
            <td>Due Date</td>
            <td>Time Left</td>
            <td>Progress</td>
            <td>Activation</td>
        </tr>
        </thead>
        <tbody>
            <?php
            if($list_todo !== 0)
            {
                foreach ($list_todo as $key => $value)
                {
                    $today = strtotime("now");
                    $due_date = strtotime($value['due_date']);
                    if ($due_date > $today)
                    {
                        $hours = $due_date - $today;
                        $hours = $hours / 3600;
                        $time_left = $hours / 24;
                        if ($time_left < 1)
                        {
                            $time_left = 'Less that 1 day';
                        } else
                            {
                            $time_left = round($time_left) . ' days remaining';
                        }
                    } else {
                        $time_left = 'Expired';
                    }

                    ?>
                    <tr>
                    <td><?=$value['title'];?></td>
                    <td><?=$value['description'];?></td>
                    <td><?=$value['due_date'];?></td>
                    <td><?=$time_left?></td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?=$value['progress'];?>">
                            </div>
                        </div>

                    </td>
                    <td><a href="edit.php?id=<?=$value['id']?>" title="<?=$value['title'];?>">Edit</a> | <a href="index.php?delete=<?=$value['id']?> title="<?=$value['title'];?>">Delete</a></td>
                        </tr>
                    <?php
                }
            }
            else
            {
                echo('<td>Sorry no more todos</td>');
            }
            ?>
        </tbody>
    </table>
</div>
</div>

<?php include_once ('static/footer.php'); ?>

</body>
</html>