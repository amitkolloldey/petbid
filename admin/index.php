<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Dashboard
    <small>Control panel</small>
    </h1> 
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">


      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>
                <?php
                $query = "SELECT id FROM pets WHERE status='1'";
                $select = $db->select($query);  
                echo $num_rows = mysqli_num_rows($select);   
                ?> 
             </h3>
            <h4>Pets</h4>
          </div>
          <div class="icon">
            <i class="fa fa-paw"></i>
          </div>
          <a href="allPets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>
                <?php
                $query = "SELECT id FROM blog_posts WHERE status='1'";
                $select = $db->select($query);  
                echo $num_rows = mysqli_num_rows($select);   
                ?> 
             </h3>
            <h4>Blog Posts</h4>
          </div>
          <div class="icon">
            <i class="fa fa-file-text"></i>
          </div>
          <a href="allBlogPosts.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>
                <?php
                $query = "SELECT id FROM users WHERE status='1'";
                $select = $db->select($query);  
                echo $num_rows = mysqli_num_rows($select);   
                ?> 
             </h3>
            <h4>Active Users</h4>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="allusers.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->


      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>
                <?php
                $query = "SELECT id FROM message WHERE archived='0'";
                $select = $db->select($query);  
                echo $num_rows = mysqli_num_rows($select);   
                ?> 
             </h3>
            <h4>Unread Messages</h4>
          </div>
          <div class="icon">
            <i class="fa fa-envelope"></i>
          </div>
          <a href="messages.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-12 col-xs-12">
        <!-- small box -->
        <section class="content-header">
          <h1>
          Live Visitors For
          <small><?php $query = "SELECT site_name FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){echo $row['site_name'];}}?></small>
          </h1> 
        </section>           
 
        <div class="visitor_map">
          <script type="text/javascript" id="clustrmaps" src="//cdn.clustrmaps.com/map_v2.js?cl=ffffff&w=761&t=tt&d=spfqrQzjnK6wUBMIBkiaYB4fCCCWiMXwptUZgNpWjWU&co=2d78ad&ct=ffffff&cmo=3acc3a&cmn=ff5353"></script>         
        </div>
      </div>
      <!-- ./col -->
 

    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('inc/footer.php');?>