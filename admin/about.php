<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    About Page
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12">
          <?php
              $query = "SELECT title, content FROM pages WHERE id='1'";
              $select = $db->select($query);
              if(empty($select)){
          ?>
          <form class="form-horizontal" action="" method="POST" >
            <fieldset>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="title">Title</label>
                <div class="col-md-10">
                  <input id="title" name="title" placeholder="Enter Title" class="form-control input-md" type="text" >
                  <span class="help-block">Enter Title</span>
                </div>
              </div>  
              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="content">Page Content</label>
                <div class="col-md-10">
                  <textarea class="form-control ckeditor" id="content" name="content" placeholder="Page Content"> </textarea>
                </div>
              </div> 
              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="submit"></label>
                <div class="col-md-10">
                  <input id="submit" name="insertpage" class="btn btn-primary" type="submit" value="Add Page Content">
                </div>
              </div>
            </fieldset>
          </form>
          <?php if(isset($_POST['insertpage'])){
            $title = mysqli_real_escape_string ($db->connect,$_POST['title']); 
            $content = mysqli_real_escape_string ($db->connect,$_POST['content']); 
          if($title == '' || $content == '' ){
            echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
          }else{ 
          $query = "INSERT INTO pages(id , title , content) VALUES('1' , '$title' , '$content')";
          $inserted_rows = $db->insert($query);
          } ?>
          <?php }} else{ ?>
          <?php if(isset($_GET['message'])){
          echo "<p class='alert alert-success'>".$_GET['message']."</p>";
          }
                while ($row = $select->fetch_assoc()) {
          ?>
          <form class="form-horizontal" action="" method="POST" >
            <fieldset>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="utitle">Title</label>
                <div class="col-md-10">
                  <input id="utitle" name="utitle" placeholder="Enter Title" class="form-control input-md" type="text" value="<?php echo $row['title']; ?>">
                  <span class="help-block">Enter Title</span>
                </div>
              </div>  
              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="ucontent">Page Content</label>
                <div class="col-md-10">
                  <textarea class="form-control ckeditor" id="ucontent" name="ucontent" placeholder="Page Content"><?php echo $row['content']; ?></textarea>
                </div>
              </div> 
              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="submit"></label>
                <div class="col-md-10">
                  <input id="usubmit" name="updatepage" class="btn btn-primary" type="submit" value="Update Page Content">
                </div>
              </div>
            </fieldset>
          </form>
          <?php }} ?>
          <?php
          /*
          Update Query
          */
          if(isset($_POST['updatepage'])){
            $utitle = mysqli_real_escape_string ($db->connect,$_POST['utitle']); 
            $ucontent = mysqli_real_escape_string ($db->connect,$_POST['ucontent']); 
          if($utitle == '' || $ucontent == '' ){
            echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
          }else{ 
            $query = "UPDATE pages SET title='$utitle',content='$ucontent' WHERE id='1'";
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