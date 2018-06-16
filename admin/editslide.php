<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
?>
<?php if (isset($_GET['id']) && $_GET['id'] != NULL){
$id = $_GET['id'];
}else{
echo "<script>window.location.assign('allslides.php')</script>";
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Edit Slide
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12">
          <?php
          $query = "SELECT * FROM slider WHERE id='$id'";
          $select = $db->select($query);
          while($row = $select->fetch_assoc()){
          ?>
          <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <fieldset>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="title">Slide Title</label>
                <div class="col-md-10">
                  <input id="title" name="title" placeholder="Enter Slide Title" class="form-control input-md" type="text" value="<?php echo $row['title']; ?>">
                  <span class="help-block">Enter Slide Title</span>
                </div>
              </div>   
              <!-- File Button -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="image">Upload/Change Image</label>
                <div class="col-md-10">
                  <img src="../<?php echo $row['image']; ?>">
                  <input type="file" name="image" class="form-control input-md" value="<?php echo $row['image']; ?>">
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
          <?php } ?>
          <?php
          /*
          Update Query
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
          
          if($title == '' ){
          echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
          }
          elseif(!empty($image)){
          if ($image_size >5048567) {
          echo "<span class='alert alert-danger'>Image Size should be less then 5MB!
          </span>";
          } elseif (in_array($image_ext, $permited) === false) {
          echo "<span class='alert alert-danger'>You can upload only:-"
          .implode(', ', $permited)."</span>";
          }
          else{
          move_uploaded_file($image_temp, $uploaded_image);
          copy($uploaded_image, $uploaded_image2);
          $query = "UPDATE slider SET title='$title',image='$uploaded_image' WHERE id='$id'";
          $update = $db->update($query);
          }
          }else{
          $query = "UPDATE slider SET title='$title' WHERE id='$id'";
          $update = $db->update($query);
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