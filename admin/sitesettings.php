<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Site Settings
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12">
          <?php
              $query = "SELECT * FROM site_settings";
              $select = $db->select($query);
              if(empty($select)){
          ?>
          <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <fieldset>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="site_name">Site Name</label>
                <div class="col-md-10">
                  <input id="site_name" name="site_name" placeholder="Enter Site Name" class="form-control input-md" type="text" >
                  <span class="help-block">Enter Site Name</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="site_adminemail">Site Admin Email</label>
                <div class="col-md-10">
                  <input id="site_adminemail" name="site_adminemail" placeholder="Enter Site Admin Email" class="form-control input-md" type="email" >
                  <span class="help-block">Enter Site Admin Email</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="site_address">Site Address</label>
                <div class="col-md-10">
                  <input id="site_address" name="site_address" placeholder="Enter Site Address" class="form-control input-md" type="text" >
                  <span class="help-block">Enter Site Address</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="site_contactno">Site Contact No</label>
                <div class="col-md-10">
                  <input id="site_contactno" name="site_contactno" placeholder="Enter Site Contact No" class="form-control input-md" type="text" >
                  <span class="help-block">Enter Site Contact No</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="copyright">Copy Right Text</label>
                <div class="col-md-10">
                  <input id="copyright" name="copyright" placeholder="Enter Copyright Text" class="form-control input-md" type="text" >
                  <span class="help-block">Enter Copyright</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="map">Map Iframe Code</label>
                <div class="col-md-10">
                  <textarea class="form-control" id="map" name="map" placeholder="Map Iframe"></textarea>
                  <span class="help-block">Enter map Iframe Code</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-12 text-center h4" for="links">Social Links</label>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="facebook">Facebook link</label>
                <div class="col-md-10">
                  <input id="facebook" name="facebook" placeholder="Facebook Link" class="form-control input-md" type="text" >
                  <span class="help-block">Enter Facebook Link</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="youtube">Youtube link</label>
                <div class="col-md-10">
                  <input id="youtube" name="youtube" placeholder="Youtube Link" class="form-control input-md" type="text" >
                  <span class="help-block">Enter Youtube Link</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="twitter">Twitter link</label>
                <div class="col-md-10">
                  <input id="twitter" name="twitter" placeholder="Twitter Link" class="form-control input-md" type="text"  >
                  <span class="help-block">Enter Twitter Link</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="googleplus">Googleplus link</label>
                <div class="col-md-10">
                  <input id="googleplus" name="googleplus" placeholder="Googleplus Link" class="form-control input-md" type="text" >
                  <span class="help-block">Enter Googleplus Link</span>
                </div>
              </div>
              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="submit"></label>
                <div class="col-md-10">
                  <input id="submit" name="insertsitesettings" class="btn btn-primary" type="submit" value="Set">
                </div>
              </div>
            </fieldset>
          </form>
          <?php if(isset($_POST['insertsitesettings'])){
            $site_name = mysqli_real_escape_string ($db->connect,$_POST['site_name']);
            $site_adminemail = mysqli_real_escape_string ($db->connect,$_POST['site_adminemail']);
            $site_address = mysqli_real_escape_string ($db->connect,$_POST['site_address']);
            $site_contactno = mysqli_real_escape_string ($db->connect,$_POST['site_contactno']);
            $copyright = mysqli_real_escape_string ($db->connect,$_POST['copyright']);
            $map = mysqli_real_escape_string ($db->connect,$_POST['map']);
            $facebook = mysqli_real_escape_string ($db->connect,$_POST['facebook']);
            $twitter = mysqli_real_escape_string ($db->connect,$_POST['twitter']);
            $googleplus = mysqli_real_escape_string ($db->connect,$_POST['googleplus']);
          $youtube = mysqli_real_escape_string ($db->connect,$_POST['youtube']);
          if($site_name == '' || $site_adminemail == '' || $site_address == '' || $site_contactno == '' || $copyright == '' || $map == '' || $facebook == '' || $twitter == '' || $googleplus == '' || $youtube == ''){
            echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
          }else{ 
          $query = "INSERT INTO site_settings(id , site_name , site_adminemail , site_address , site_contactno , copyright , map , facebook , twitter , googleplus , youtube) VALUES('1' , '$site_name' , '$site_adminemail' ,'$site_address' ,'$site_contactno' , '$copyright' , '$map' , '$facebook' , '$twitter' , '$googleplus' , '$youtube')";
          $inserted_rows = $db->insert($query);
          } ?>
          <?php }} else{ ?>
          <?php if(isset($_GET['message'])){
          echo "<p class='alert alert-success'>".$_GET['message']."</p>";
          }
                while ($row = $select->fetch_assoc()) {
          ?>
          <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <fieldset>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="site_name">Site Name</label>
                <div class="col-md-10">
                  <input id="site_name" name="site_name" placeholder="Enter Site Name" class="form-control input-md" type="text" value="<?php echo $row['site_name']; ?>">
                  <span class="help-block">Enter Site Name</span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="site_adminemail">Site Admin Email</label>
                <div class="col-md-10">
                  <input id="site_adminemail" name="site_adminemail" placeholder="Enter Site Admin Email" class="form-control input-md" type="email" value="<?php echo $row['site_adminemail']; ?>">
                  <span class="help-block">Enter Site Admin Email</span>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label" for="site_address">Site Address</label>
                <div class="col-md-10">
                  <input id="site_address" name="site_address" placeholder="Enter Site Address" class="form-control input-md" type="text" value="<?php echo $row['site_address']; ?>">
                  <span class="help-block">Enter Site Address</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="site_contactno">Site Contact No</label>
                <div class="col-md-10">
                  <input id="site_contactno" name="site_contactno" placeholder="Enter Site Contact No" class="form-control input-md" type="text" value="<?php echo $row['site_contactno']; ?>">
                  <span class="help-block">Enter Site Contact No</span>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="copyright">Copy Right Text</label>
                <div class="col-md-10">
                  <input id="copyright" name="copyright" placeholder="Enter Copyright Text" class="form-control input-md" type="text" value="<?php echo $row['copyright']; ?>">
                  <span class="help-block">Enter Copyright</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="map">Map Iframe Code</label>
                <div class="col-md-10">
                  <textarea class="form-control" id="map" name="map" ><?php echo $row['map']; ?></textarea>
                  <span class="help-block">Enter map Iframe Code</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-12 text-center" for="links">Social Links</label>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="facebook">Facebook link</label>
                <div class="col-md-10">
                  <input id="facebook" name="facebook" placeholder="Facebook Link" class="form-control input-md" type="text" value="<?php echo $row['facebook']; ?>">
                  <span class="help-block">Enter Facebook Link</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="youtube">Youtube link</label>
                <div class="col-md-10">
                  <input id="youtube" name="youtube" placeholder="Youtube Link" class="form-control input-md" type="text" value="<?php echo $row['youtube']; ?>">
                  <span class="help-block">Enter Youtube Link</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="twitter">Twitter link</label>
                <div class="col-md-10">
                  <input id="twitter" name="twitter" placeholder="Twitter Link" class="form-control input-md" type="text" value="<?php echo $row['twitter']; ?>">
                  <span class="help-block">Enter Twitter Link</span>
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-2 control-label" for="googleplus">Googleplus link</label>
                <div class="col-md-10">
                  <input id="googleplus" name="googleplus" placeholder="Googleplus Link" class="form-control input-md" type="text" value="<?php echo $row['googleplus']; ?>">
                  <span class="help-block">Enter Googleplus Link</span>
                </div>
              </div>
              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="submit"></label>
                <div class="col-md-10">
                  <input id="submit" name="updatesitesettings" class="btn btn-primary" type="submit" value="Update Settings">
                </div>
              </div>
            </fieldset>
          </form>
          <?php }} ?>
          <?php
          /*
          Update Query
          */
          if(isset($_POST['updatesitesettings'])){
            $site_name = mysqli_real_escape_string ($db->connect,$_POST['site_name']);
            $site_adminemail = mysqli_real_escape_string ($db->connect,$_POST['site_adminemail']);
            $site_address = mysqli_real_escape_string ($db->connect,$_POST['site_address']);
            $site_contactno = mysqli_real_escape_string ($db->connect,$_POST['site_contactno']);
            $copyright = mysqli_real_escape_string ($db->connect,$_POST['copyright']);
            $map = mysqli_real_escape_string ($db->connect,$_POST['map']);
            $facebook = mysqli_real_escape_string ($db->connect,$_POST['facebook']);
            $twitter = mysqli_real_escape_string ($db->connect,$_POST['twitter']);
            $googleplus = mysqli_real_escape_string ($db->connect,$_POST['googleplus']);
          $youtube = mysqli_real_escape_string ($db->connect,$_POST['youtube']);
          if($site_name == '' || $site_adminemail == '' || $site_address == '' || $site_contactno == '' || $copyright == '' || $map == '' || $facebook == '' || $twitter == '' || $googleplus == '' || $youtube == ''){
            echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
          }else{
          $query = "UPDATE site_settings SET site_name='$site_name',site_adminemail='$site_adminemail',site_address='$site_address',site_contactno='$site_contactno',copyright='$copyright',map='$map',facebook='$facebook',twitter='$twitter',googleplus='$googleplus',youtube='$youtube' WHERE id='1'";
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