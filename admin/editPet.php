<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
?>
<?php if (isset($_GET['id']) && $_GET['id'] != NULL){
$id = $_GET['id'];
}else{
echo "<script>window.location.assign('allPets.php')</script>";
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Modify Pet
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
        <div class="col-md-12">
          <?php
          $query = "SELECT * FROM pets WHERE id='$id'";
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
                  <span class="help-block">Enter Pet Name</span>
                </div>
              </div>
              <!-- File Button -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="pet_image">Upload/Change Pet Image</label>
                <div class="col-md-10">
                  <img src="<?php echo $row['image']; ?>">
                  <input type="file" name="pet_image" class="form-control input-md" value="<?php echo $row['image']; ?>">
                </div>
              </div>
              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="body">Pet Description</label>
                <div class="col-md-10">
                  <textarea class="form-control ckeditor" id="description" name="description" value=""><?php echo $row['description']; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="basic_amount">Basic Amount</label>
                <div class="col-md-10">
                  <input type="number" name="basic_amount" step="<?php echo $row['incremental_amount']; ?>" min="0" value="<?php echo $row['basic_amount']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="incremental_amount">Incremental Amount</label>
                <div class="col-md-10">
                  <input type="number" name="incremental_amount" step="<?php echo $row['incremental_amount']; ?>" value="<?php echo $row['incremental_amount']; ?>" min="0" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="deadline">Deadline Date</label>
                <div class="col-md-10">
                  <input id="date" name="deadline" placeholder="<?php echo $row['deadline']; ?>" class="form-control input-md" type="text" value="<?php echo $row['deadline']; ?>">
                  <span class="help-block">Deadline</span>
                </div>
              </div>
              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="category">Choose Pet Category</label>
                <div class="col-md-10">
                  <select id="category" name="category" class="form-control">
                    
                    <?php
                    $querycat = "SELECT * FROM pet_categories";
                    $selectcat = $db->select($querycat);
                    while($rowcat = $selectcat->fetch_assoc()){
                    ?>
                    <option value="<?php echo $rowcat['id'];?>"><?php echo $rowcat['name'];?></option>
                    <?php }?>
                    ?>
                  </select>
                </div>
              </div>
              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="location">Choose Pet location</label>
                <div class="col-md-10">
                  <select id="category" name="location" class="form-control">
                    
                    <?php
                    $loc_id = $row['location'];
                    $queryloc = "SELECT * FROM pet_locations";
                    $selectloc = $db->select($queryloc);
                    while($rowloc = $selectloc->fetch_assoc()){
                    ?>
                    <option value="<?php echo $rowloc['id'];?>"><?php echo $rowloc['name'];?></option>
                    <?php }?>
                    ?>
                  </select>
                </div>
              </div>
              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="author">Created By</label>
                <div class="col-md-10">
                  <select id="author" name="pet_author" class="form-control">
                    <?php
                    $aut_id = $row['pet_author'];
                    $queryaut = "SELECT * FROM users WHERE id='$aut_id'";
                    $selectaut = $db->select($queryaut);
                    while($rowaut = $selectaut->fetch_assoc()){
                    ?>
                    <option value="<?php echo $rowaut['id'];?>"><?php echo $rowaut['name'];?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="status">Status</label>
                <div class="col-md-10">
                  <select id="status" name="status" class="form-control">
                    <?php if ($row['status'] == 0): ?>
                    <option value="0">Pending</option>
                    <option value="1">Approve</option>
                    <?php else:?>
                    <option value="1">Approve</option>
                    <option value="0">Pending</option>
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
          $category = mysqli_real_escape_string ($db->connect,$_POST['category']);
          $location = mysqli_real_escape_string ($db->connect,$_POST['location']);
          $pet_author = mysqli_real_escape_string ($db->connect,$_POST['pet_author']);
          $name = mysqli_real_escape_string ($db->connect,$_POST['name']);
          $permited  = array('jpg', 'jpeg', 'png', 'gif');
          $pet_image = $_FILES['pet_image']['name'];
          $pet_image_size = $_FILES['pet_image']['size'];
          $pet_image_temp = $_FILES['pet_image']['tmp_name'];
          $div = explode('.', $pet_image);
          $pet_image_ext = strtolower(end($div));
          $unique_image = substr(md5(time()), 0, 10).'.'.$pet_image_ext;
          $uploaded_image = "uploads/".$unique_image;
          $uploaded_image2 = "../uploads/".$unique_image;
          $description = mysqli_real_escape_string ($db->connect,$_POST['description']);
          $basic_amount = mysqli_real_escape_string ($db->connect,$_POST['basic_amount']);
          $incremental_amount = mysqli_real_escape_string ($db->connect,$_POST['incremental_amount']);
          $deadline = mysqli_real_escape_string ($db->connect,$_POST['deadline']);
          $status = mysqli_real_escape_string ($db->connect,$_POST['status']);
          if($category == '' OR $location == '' OR $pet_author == '' OR $description == '' OR $basic_amount == '' OR $incremental_amount == '' OR $deadline == '' OR $status == '' ){
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
          $query = "update pets set category='$category',location='$location',pet_author='$pet_author',name='$name',image='$uploaded_image',description='$description',basic_amount='$basic_amount',incremental_amount='$incremental_amount',deadline='$deadline',status='$status' where id='$id'";
          $update = $db->update($query);
          }
          }else{
          $query = "update pets set category='$category',location='$location',pet_author='$pet_author',name='$name',description='$description',basic_amount='$basic_amount',incremental_amount='$incremental_amount',deadline='$deadline',status='$status' where id='$id'";
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