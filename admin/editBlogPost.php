<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
?>
<?php if (isset($_GET['id']) && $_GET['id'] != NULL){
$id = $_GET['id'];
}else{
echo "<script>window.location.assign('allBlogPosts.php')</script>";
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Modify Post
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
          $query = "SELECT * FROM blog_posts WHERE id='$id'";
          $select = $db->select($query);
          while($row = $select->fetch_assoc()){
          ?>
          <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <fieldset>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="title">Title</label>
                <div class="col-md-10">
                  <input id="title" name="title" placeholder="Enter Post Title" class="form-control input-md" type="text" value="<?php echo $row['title']; ?>">
                  <span class="help-block">Enter Post Title</span>
                </div>
              </div>
              <!-- File Button -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="post_image">Upload/Change Post Image</label>
                <div class="col-md-10">
                  <img src="<?php echo $row['image']; ?>">
                  <input type="file" name="post_image" value="<?php echo $row['image']; ?>">
                </div>
              </div>
              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="body">Post Description</label>
                <div class="col-md-10">
                  <textarea class="form-control ckeditor" id="description" name="description" value=""><?php echo $row['description']; ?></textarea>
                </div>
              </div>
              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="category">Choose Post Category</label>
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
                <label class="col-md-2 control-label" for="author">Created By</label>
                <div class="col-md-10">
                  <select id="author" name="author" class="form-control">
                    <?php
                    $aut_id = $row['author'];
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
          $title = mysqli_real_escape_string ($db->connect,$_POST['title']);
          $description = mysqli_real_escape_string ($db->connect,$_POST['description']);
          $status = mysqli_real_escape_string ($db->connect,$_POST['status']);
          $category = mysqli_real_escape_string ($db->connect,$_POST['category']);
          $author = mysqli_real_escape_string ($db->connect,$_POST['author']);
          $permited  = array('jpg', 'jpeg', 'png', 'gif');
          $post_image = $_FILES['post_image']['name'];
          $post_image_size = $_FILES['post_image']['size'];
          $post_image_temp = $_FILES['post_image']['tmp_name'];
          $div = explode('.', $post_image);
          $post_image_ext = strtolower(end($div));
          $unique_image = substr(md5(time()), 0, 10).'.'.$post_image_ext;
          $uploaded_image = "uploads/".$unique_image;
          $uploaded_image2 = "../uploads/".$unique_image;
          if($title == '' OR $category == '' OR $author == '' OR $description == '' OR $status == ''){
          echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
          }
          elseif(!empty($post_image)){
          if ($post_image_size > 5048567) {
          echo "<span class='alert alert-danger'>Image Size should be less then 5MB!
          </span>";
          } elseif (in_array($post_image_ext, $permited) === false) {
          echo "<span class='alert alert-danger'>You can upload only:-"
          .implode(', ', $permited)."</span>";
          }
          else{
          move_uploaded_file($post_image_temp, $uploaded_image);
          copy($uploaded_image, $uploaded_image2);
          $query = "update blog_posts set category='$category',author='$author',title='$title',description='$description',image='$uploaded_image',status='$status' where id='$id'";
          $update = $db->update($query);
          }
          }else{
          $query = "update blog_posts set category='$category',author='$author',title='$title',description='$description',status='$status' where id='$id'";
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