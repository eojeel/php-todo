<div>
</div>
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="../js/js.cookie.js" type="text/javascript"></script>
<!-- Menu Toggle Script -->


<script>
    $(function() {
        // get previous state and initiate the class
        if(Cookies.get('toggleState') == "toggled") {
            $("#wrapper").toggleClass("toggled");
        } else {
            $("#wrapper").removeClass("toggled");
            Cookies.remove('toggleState');
        }

        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        if(Cookies.get('toggleState') == "toggled") {
            $("#wrapper").removeClass("toggled");
            Cookies.remove('toggleState');
        }else {
            $("#wrapper").toggleClass("toggled");
            Cookies.set('toggleState', 'toggled');
        }
    });

    });
</script>