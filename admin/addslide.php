<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Add Slide Image
    </h1> 
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
          <fieldset>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="title">Slide Title</label>
              <div class="col-md-10">
                <input id="title" name="title" placeholder="Enter Slide Title" class="form-control input-md" type="text">
                <span class="help-block">Enter Slide Title</span>
              </div> 
            </div>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="image">Slide Image</label>
              <div class="col-md-10">
                <input id="image" name="image" placeholder="Enter Slide Image" class="form-control input-md" type="file"  accept="image/*">
                <span class="help-block">Enter Slide Image</span>
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
  <?php
  /*
  Insert Query
  */
  if(isset($_POST['submit'])){
  $title = mysqli_real_escape_string ($db->connect,$_POST['title']); 

  $permited  = array('jpg', 'jpeg', 'png', 'gif');
  $image = $_FILES['image']['name'];
  $image_size = $_FILES['image']['size'];
  $image_temp = $_FILES['image']['tmp_name'];
  $div = explode('.', $image);
  $image_ext = strtolower(end($div));
  $unique_image = substr(md5(time()), 0, 10).'.'.$image_ext;
  $uploaded_image = "uploads/".$unique_image;
  $uploaded_image2 = "../uploads/".$unique_image;

  if($title == '' || $image == ''){
  echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
  }else{
  move_uploaded_file($image_temp, $uploaded_image);
  copy($uploaded_image, $uploaded_image2);
  $query = "INSERT INTO slider(title,image) VALUES('$title','$uploaded_image')";
  $inserted_rows = $db->insert($query);
  }
  }?>
</div>
<!-- /.content-wrapper -->
<?php include('inc/footer.php');?>