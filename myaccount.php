<?php include('inc/header.php');?>
 <?php if (Session::get('ulogin')): ?>
 	
<div class="container">
    <section>
        <div class="row"> 
            <div class="col-md-3 left_sidebar"> 
                <?php include('inc/sidebar.php'); ?>
            </div>
            <div class="col-md-9 right_content"> 
                <div class="ucontent">
                	  <h4>Welcome Back, "<?php echo Session::get('name'); ?>"</h4>  
		                <?php if(isset($_GET['message'])){
		                echo "<p class='alert alert-success'>".$_GET['message']."</p>";
		                }?>
			          <?php
			          $id = Session::get('id');
			          $query = "SELECT * FROM users WHERE id='$id'";
			          $select = $db->select($query);
			          while($row = $select->fetch_assoc()){
			          ?>

			          <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="">
			            <fieldset>
			              <!-- Text input-->
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="name">Name</label>
			                <div class="col-md-10">
			                  <input id="name" name="name" placeholder="Enter Name" class="form-control input-md" type="text" value="<?php echo $row['name']; ?>">
			                  <span class="help-block">Enter Name</span>
			                </div>
			              </div>
			              <!-- Text input-->
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="email">Your Email</label>
			                <div class="col-md-10">
			                  <p id="email" class="form-control input-md"><?php echo $row['email']; ?></p>
			                  <p  class="alert alert-warning">Email can not be changed.</p>
			                </div>
			              </div>
			              <!-- Text input-->
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="password">Password</label>
			                <div class="col-md-10">
			                  <input id="password" name="password" placeholder="Enter password" class="form-control input-md" type="password" value="<?php echo $row['password']; ?>">
			                  <span class="help-block">Enter password  <?php echo $row['password']; ?></span>
			                </div>
			              </div>
			              <!-- Text input--> 
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
			                  <img src="<?php echo $row['image']; ?>" width="100px">
			                  <input type="file" name="pet_image" class="form-control input-md" value="<?php echo $row['image']; ?>">
			                </div>
			              </div> 
			              <!-- Select Basic -->
			              <div class="form-group"> 
			                <div class="col-md-10">
			                  <input id="submit" name="updateuser" class="btn btn-primary" type="submit" value="Update Account">
			                </div>
			              </div>
			            </fieldset>
			          </form>
			          
			          <?php
			          /*
			          Update Query
			          */
			          if(isset($_POST['updateuser'])){
			          $id = Session::get('id');
			          $name = mysqli_real_escape_string ($db->connect,$_POST['name']); 
			          $password = mysqli_real_escape_string ($db->connect,$_POST['password']); 
			          $cell = mysqli_real_escape_string ($db->connect,$_POST['cell']);
			          $address = mysqli_real_escape_string ($db->connect,$_POST['address']); 
			          $permited  = array('jpg', 'jpeg', 'png', 'gif');
			          $pet_image = $_FILES['pet_image']['name'];
			          $pet_image_size = $_FILES['pet_image']['size'];
			          $pet_image_temp = $_FILES['pet_image']['tmp_name'];
			          $div = explode('.', $pet_image);
			          $pet_image_ext = strtolower(end($div));
			          $unique_image = substr(md5(time()), 0, 10).'.'.$pet_image_ext;
			          $uploaded_image = "uploads/".$unique_image;
			          $uploaded_image2 = "admin/uploads/".$unique_image; 


			          if($name == '' OR $cell == '' OR $address == '' ){
			          echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
			          }
			          elseif(!isset($pet_image)){
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
				          $password = md5($password);
				          $query = "UPDATE users SET name='$name' , password='$password' , cell='$cell', address='$address' , image='$uploaded_image' WHERE id='$id'";
				          $update = $db->update($query);

				          }
			          }elseif($password == $row['password']){
			          		$query = "UPDATE users SET name='$name' , cell='$cell' , address='$address' WHERE id='$id'";
			          		$update = $db->update($query); 
			          }else{  
			          		$password = md5($password);	
			          		$query = "UPDATE users SET name='$name' , password='$password' , cell='$cell' , address='$address' WHERE id='$id'";
			          		$update = $db->update($query); 
			          }
			          }
			          
			          ?> 

			          <?php } ?>
                </div>  
            </div>
        </div>
    </section>
</div><!-- /.container -->
<?php else: ?>
	<?php echo "<script>window.location.assign('index.php')</script>";  ?> 
<?php endif; ?>

    <?php include('inc/footer.php');?>