<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Add New Pet Location
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" method="POST" action="">
          <fieldset>
            
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Location Name</label>
              <div class="col-md-10">
                <input id="title" name="name" placeholder="Enter Location Name" class="form-control input-md" type="text">
                <span class="help-block">Enter Location Name</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="submit"></label>
              <div class="col-md-10">
                <input id="submit" name="submit" class="btn btn-primary" type="submit" value="Add">
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
/*
Insert Query
*/
if(isset($_POST['submit'])){
$name = mysqli_real_escape_string ($db->connect,$_POST['name']);
if($name == ''){
echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
}else{
$query = "insert into pet_locations(name) values('$name')";
$inserted_rows = $db->insert($query);
}
}?>
<?php include('inc/footer.php');?>