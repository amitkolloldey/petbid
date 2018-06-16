<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<?php if (isset($_GET['id']) && $_GET['id'] != NULL){
$id = $_GET['id'];
}else{
echo "<script>window.location.assign('allBlogCategories.php')</script>";
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Edit Blog Category
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
        <?php
        $query = "SELECT * FROM blog_categories WHERE id='$id'";
        $select = $db->select($query);
        while($row = $select->fetch_assoc()){
        ?>
        <form class="form-horizontal" method="POST" action="" >
          <fieldset>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Blog Category Name</label>
              <div class="col-md-10">
                <input id="title" name="name" placeholder="Enter Blog Category Name" class="form-control input-md" type="text" value="<?php echo $row['name']; ?>">
                <span class="help-block">Enter Blog Category Name</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="submit"></label>
              <div class="col-md-10">
                <input id="submit" name="submit" class="btn btn-primary" type="submit" value="Edit">
              </div>
            </div>
          </fieldset>
        </form>
        <?php }?>
<?php
/* Update Query */
if(isset($_POST['submit'])){
$name = mysqli_real_escape_string ($db->connect,$_POST['name']);
if($name == ''){
echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
}else{
$query = "UPDATE blog_categories SET name = '$name' WHERE id = '$id'";
$updated_rows = $db->update($query);
}
}
?>        
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('inc/footer.php');?>