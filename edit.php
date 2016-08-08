<?php
    include_once ('static/header.php');
    include_once ('libs/list_todo.php');
    include_once ('libs/edit.php');
    ?>
    <div class="container-fluid">
    <h2> Create ToDo</h2>

    <?php if(isset($error)){ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';} ?>
    <?php if(isset($success)){ echo '<div class="alert alert-success" role="alert">'.$success.'</div>';}?>

    <?php foreach ($list_todo AS $td)
    {
        $given_array = array("Inbox","read later","important");
        $selected_array = array($td['label']);
        $array_remaining = array_diff($given_array,$selected_array);
        ?>

    <form method="post" action="edit.php?id=<?=$td['id']?>">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="<?=$td['title'];?>">
        </div>
        <div class="form-group">
            <label>Description</label><small> (Optional)</small>
            <textarea class="form-control" rows="3" name="description"><?=$td['description'];?></textarea>
        </div>
        <div class="form-group">
            <label>Due Date</label>
            <input type="text" class="form-control"  id="datepicker" name="due_date" value="<?=$td['due_date'];?>">
        </div>
        <div class="form-group">
            <label>Lable Under</label>
            <select name="label_under" class="form-control">
                <?='<option value="'.$td['label'].'">'.$td['label'].'</option>'?>
                <?php foreach ($array_remaining as $ar)
                {
                echo '<option value="'.$ar.'">'.$ar.'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <div id="seekbar"></div>
            <div id="progress" value="<?=$td['progress'];?>">
                <input type="hidden" id="progress_value" name="progress_value" value="<?=$td['progress'];?>">
                </div>
            </div>
        <!-- end php here -->
        <?php } ?>
        <button type="submit" class="btn btn-default" name="edit_todo" id="edit_todo">Edit</button>
    </form>
</div>

<?php include_once ('static/footer.php'); ?>

<script>
    $( function() {
        $( "#datepicker" ).datepicker();
        var currentValue = $('#progress_value').val();
        $( "#seekbar" ).slider({
            range: "max",
            min: 0,
            max: 100,
            value: currentValue,
            slide: function( event, ui ) {
                $( "#progress" ).html( ui.value + '%');
                $( "#progress_value" ).val( ui.value );
            }
        });
        $( "#progress_value" ).val( $( "#seekbar" ).slider( "value" ) );
    } );
</script>

</body>
</html>