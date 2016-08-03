<?php
include_once ('static/header.php');
include_once ('libs/create_todo.php');
?>

<div class="container-fluid">
    <h2> Create ToDo</h2>

    <?php if(isset($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';} ?>
    <?php if(isset($success)){ echo '<div class="alert alert-success" role="alert">'.$success.'</div>';}?>
    <form method="post" action="add_new.php">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label>Description</label><small> (Optional)</small>
            <textarea class="form-control" rows="3" name="description"></textarea>
        </div>
        <div class="form-group">
            <label>Due Date</label>
            <input type="text" class="form-control"  id="datepicker" name="due_date">
        </div>
        <div class="form-group">
        <label>Lable Under</label>
        <select name="label_under" class="form-control">
            <option value="">select</option>
            <option value="Inbox">Inbox</option>
            <option value="Read Later">Read Later</option>
            <option value="Important">Important</option>
        </select>
            </div>
        <button type="submit" class="btn btn-default" name="create_todo" id="create_todo">Submit</button>
    </form>
</div>

<?php include_once ('static/footer.php'); ?>

<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>

</body>
</html>