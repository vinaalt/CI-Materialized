<footer>
    <center>&copy;Coppy right <?php echo date('Y');?></center>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.7.1.min.js"></script>
        <!--materialize js-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
        <!-- data-tables -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/data-tables/data-tablesscript.js"></script>
        
        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".button-collapse").sideNav();
            $('#alert_close').click(function(){
                $( "#alert_box" ).fadeOut( "slow", function() {});
            });
        })
    </script>
</footer>
