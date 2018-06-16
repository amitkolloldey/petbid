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
			                <label class="col-md-2 control-label" for="title">Title</label>
			                <div class="col-md-10">
			                  <input id="title" name="title" placeholder="Enter Article Title" class="form-control input-md" type="text" >
			                  <span class="help-block">Enter Article Title</span>
			                </div>
			              </div>
			              <!-- File Button -->
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="article_image">Upload Featured Image</label>
			                <div class="col-md-10"> 
			                  <input type="file" name="article_image" class="form-control input-md"  >
			                </div>
			              </div>
			              <!-- Textarea -->
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="body">Article Content</label>
			                <div class="col-md-10">
			                  <textarea class="form-control ckeditor" id="body" name="body" > </textarea>
			                </div>
			              </div>   
			              <!-- Select Basic -->
			              <div class="form-group">
			                <label class="col-md-2 control-label" for="category">Choose Article Category</label>
			                <div class="col-md-10">
			                  <select id="category" name="category" class="form-control">
			                    
			                    <?php
			                    $querycat = "SELECT * FROM blog_categories";
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
			                <label class="col-md-2 control-label" for="submit"></label>
			                <div class="col-md-10">
			                  <input id="submit" name="addarticle" class="btn btn-primary" type="submit" value="Add My Article">
			                </div>
			              </div>
			            </fieldset>
			          </form>
			          
			          <?php
			          /*
			          Insert Query
			          */
			          if(isset($_POST['addarticle'])){
			              $author = Session::get('id');
				          $category = mysqli_real_escape_string ($db->connect,$_POST['category']); 
				          $title = mysqli_real_escape_string ($db->connect,$_POST['title']);
				          $permited  = array('jpg', 'jpeg', 'png', 'gif');
				          $article_image = $_FILES['article_image']['name'];
				          $article_image_size = $_FILES['article_image']['size'];
				          $article_image_temp = $_FILES['article_image']['tmp_name'];
				          $div = explode('.', $article_image);
				          $article_image_ext = strtolower(end($div));
				          $unique_image = substr(md5(time()), 0, 10).'.'.$article_image_ext;
				          $uploaded_image = "uploads/".$unique_image;
				          $uploaded_image2 = "admin/uploads/".$unique_image;
				          $description = mysqli_real_escape_string ($db->connect,$_POST['body']);  
				          if($category == '' OR $description == '' OR $title == '' OR $article_image == '' ){
				          echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
				          }else{
                        	  move_uploaded_file($article_image_temp, $uploaded_image);
                        	  copy($uploaded_image, $uploaded_image2);				          	
							  $query = "INSERT INTO blog_posts(category , author , title , description , image ) VALUES('$category' , '$author' , '$title' , '$description' , '$uploaded_image' )";
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