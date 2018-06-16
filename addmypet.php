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

			           <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
			            <fieldset>
			              <!-- Text input-->
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="title">Name</label>
			                <div class="col-md-10">
			                  <input id="title" name="name" placeholder="Enter Pet Name" class="form-control input-md" type="text" >
			                  <span class="help-block">Enter Pet Name</span>
			                </div>
			              </div>
			              <!-- File Button -->
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="pet_image">Upload Pet Image</label>
			                <div class="col-md-10"> 
			                  <input type="file" name="pet_image" class="form-control input-md"  >
			                </div>
			              </div>
			              <!-- Textarea -->
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="body">Pet Description</label>
			                <div class="col-md-10">
			                  <textarea class="form-control ckeditor" id="description" name="description" > </textarea>
			                </div>
			              </div>
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="basic_amount">Basic Amount</label>
			                <div class="col-md-10">
			                  <input type="number" name="basic_amount" min="100" step="100" >
			                </div>
			              </div>
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="incremental_amount">Incremental Amount</label>
			                <div class="col-md-10">
			                  <input type="number" name="incremental_amount" min="100" step="100" >
			                </div>
			              </div>
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="deadline">Deadline Date</label>
			                <div class="col-md-10">
			                  <input id="date" name="deadline" placeholder="yy-mm-dd" class="form-control input-md" type="text" >
			                  <span class="help-block">Bid Deadline</span>
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
			                <label class="col-md-2 control-label" for="submit"></label>
			                <div class="col-md-10">
			                  <input id="submit" name="addpet" class="btn btn-primary" type="submit" value="Add My Pet">
			                </div>
			              </div>
			            </fieldset>
			          </form>
			          
			          <?php
			          /*
			          Insert Query
			          */
			          if(isset($_POST['addpet'])){
			              $pet_author = Session::get('id');
				          $category = mysqli_real_escape_string ($db->connect,$_POST['category']);
				          $location = mysqli_real_escape_string ($db->connect,$_POST['location']); 
				          $name = mysqli_real_escape_string ($db->connect,$_POST['name']);
				          $permited  = array('jpg', 'jpeg', 'png', 'gif');
				          $pet_image = $_FILES['pet_image']['name'];
				          $pet_image_size = $_FILES['pet_image']['size'];
				          $pet_image_temp = $_FILES['pet_image']['tmp_name'];
				          $div = explode('.', $pet_image);
				          $pet_image_ext = strtolower(end($div));
				          $unique_image = substr(md5(time()), 0, 10).'.'.$pet_image_ext;
				          $uploaded_image = "uploads/".$unique_image;
				          $uploaded_image2 = "admin/uploads/".$unique_image;
				          $description = mysqli_real_escape_string ($db->connect,$_POST['description']);
				          $basic_amount = mysqli_real_escape_string ($db->connect,$_POST['basic_amount']);
				          $incremental_amount = mysqli_real_escape_string ($db->connect,$_POST['incremental_amount']);
				          $deadline = mysqli_real_escape_string ($db->connect,$_POST['deadline']); 
				          if($category == '' OR $location == '' OR $description == '' OR $basic_amount == '' OR $incremental_amount == '' OR $deadline == '' OR $pet_image == ''){
				          echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
				          }else{
                        	  move_uploaded_file($pet_image_temp, $uploaded_image);
                        	  copy($uploaded_image, $uploaded_image2);				          	
							  $query = "INSERT INTO pets(category , location , pet_author , name , image , description , basic_amount , incremental_amount , deadline) VALUES('$category' , '$location' , '$pet_author' , '$name' , '$uploaded_image' , '$description' , '$basic_amount' , '$incremental_amount' , '$deadline' )";
                       		  $inserted_rows = $db->insert($query);	
				          }
			          }
			          
			          ?> 
 
                </div>  
            </div>
        </div>
    </section>
</div><!-- /.container -->
<?php else: ?>
	<?php echo "<script>window.location.assign('index.php')</script>";  ?> 
<?php endif; ?>

    <?php include('inc/footer.php');?>