  <footer class="main-footer"> 
    <?php $query = "SELECT copyright FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){echo $row['copyright'];}}?>
  </footer>
 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!--Jquery Datatables JS-->  
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script> 
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script> 

<!--CK editor-->
<script src="plugins/ckeditor/ckeditor.js"></script> 

<!--Jquery Datatables-->
<script>
$(document).ready(function() {
    $('#allposts').DataTable();
    $( "#date" ).datepicker( {
    dateFormat: 'yy-mm-dd'
} );    
} );
</script> 
</body>
</html>
