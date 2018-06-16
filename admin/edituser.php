<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
?>
<?php if (isset($_GET['id']) && $_GET['id'] != NULL){
$id = $_GET['id'];
}else{
echo "<script>window.location.assign('allusers.php')</script>";
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Edit User
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12">
          <?php
          $query = "SELECT * FROM users WHERE id='$id'";
          $select = $db->select($query);
          while($row = $select->fetch_assoc()){
          ?>
          <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <fieldset>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="title">Name</label>
                <div class="col-md-10">
                  <input id="title" name="name" placeholder="Enter Pet Name" class="form-control input-md" type="text" value="<?php echo $row['name']; ?>">
                  <span class="help-block">Enter Name</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="title">Your Email</label>
                <div class="col-md-10">
                  <p id="email" class="form-control input-md"><?php echo $row['email']; ?></p>
                  <p  class="alert alert-warning">Email can not be changed.</p>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="title">Cell</label>
                <div class="col-md-10">
                  <input id="cell" name="cell" placeholder="Enter Cell" class="form-control input-md" type="text" value="<?php echo $row['cell']; ?>">
                  <span class="help-block">Enter Cell Number</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="title">Address</label>
                <div class="col-md-10">
                  <input id="address" name="address" placeholder="Enter address" class="form-control input-md" type="text" value="<?php echo $row['address']; ?>">
                  <span class="help-block">Enter address</span>
                </div>
              </div>
              <!-- File Button -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="pet_image">Upload/Change User Image</label>
                <div class="col-md-10">
                  <img src="../<?php echo $row['image']; ?>">
                  <input type="file" name="pet_image" class="form-control input-md" value="<?php echo $row['image']; ?>">
                </div>
              </div>
              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="status">Status</label>
                <div class="col-md-10">
                  <select id="status" name="status" class="form-control">
                    <?php if ($row['status'] == 0): ?>
                    <option value="0">In Active</option>
                    <option value="1">Active</option>
                    <?php else:?>
                    <option value="1">Active</option>
                    <option value="0">In Active</option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
              <!-- Select Basic -->
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
          
          $name = mysqli_real_escape_string ($db->connect,$_POST['name']); 
          $cell = mysqli_real_escape_string ($db->connect,$_POST['cell']);
          $address = mysqli_real_escape_string ($db->connect,$_POST['address']);
          $status = mysqli_real_escape_string ($db->connect,$_POST['status']);
          $permited  = array('jpg', 'jpeg', 'png', 'gif');
          $pet_image = $_FILES['pet_image']['name'];
          $pet_image_size = $_FILES['pet_image']['size'];
          $pet_image_temp = $_FILES['pet_image']['tmp_name'];
          $div = explode('.', $pet_image);
          $pet_image_ext = strtolower(end($div));
          $unique_image = substr(md5(time()), 0, 10).'.'.$pet_image_ext;
          $uploaded_image = "uploads/".$unique_image;
          $uploaded_image2 = "../uploads/".$unique_image;
          
          if($name == '' OR $cell == '' OR $address == '' OR $status == '' ){
          echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
          }
          elseif(!empty($pet_image)){
          if ($pet_image_size >5048567) {
          echo "<span class='alert alert-danger'>Image Size should be less then 5MB!
          </span>";
          } elseif (in_array($pet_image_ext, $permited) === false) {
          echo "<span class='alert alert-danger'>You can upload only:-"
          .implode(', ', $permited)."</span>";
          }
          else{
          move_uploaded_file($pet_image_temp, $uploaded_image);
          copy($uploaded_image, $uploaded_image2);
          $query = "update users set name='$name', cell='$cell',address='$address',image='$uploaded_image',status='$status' where id='$id'";
          $update = $db->update($query);
          }
          }else{
          $query = "update users set name='$name', cell='$cell',address='$address',status='$status' where id='$id'";
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