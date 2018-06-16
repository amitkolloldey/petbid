  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="./<?php echo Session::get('image'); ?>" class="img-circle" alt="<?php echo Session::get('name'); ?>">
        </div>
        <div class="pull-left info">
          <p><?php echo Session::get('name'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    <ul class="sidebar-menu"> 
          <!-- /.view site -->     
        <li class="treeview">
          <a href="../index.php">
            <i class="fa fa-eye"></i> <span>View Site</span> 
          </a> 
        </li>           
    </ul>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
       <?php $activePage = basename($_SERVER['PHP_SELF'], ".php");?>
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($activePage == 'index'):?>class="activepage"<?php endif;?>><a href="index.php"><i class="fa fa-circle-o"></i> Dashboard</a></li> 
          </ul>
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-diamond"></i>
            <span> Pet Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($activePage == 'allPetCategories'):?>class="activepage"<?php endif;?>><a href="allPetCategories.php"><i class="fa fa-circle-o"></i> View All</a></li>
            <li <?php if($activePage == 'addPetCategory'):?>class="activepage"<?php endif;?>><a href="addPetCategory.php"><i class="fa fa-circle-o"></i> Add New</a></li> 
          </ul> 
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-diamond"></i>
            <span> Pet Locations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($activePage == 'allPetLocations'):?>class="activepage"<?php endif;?>><a href="allPetLocations.php"><i class="fa fa-circle-o"></i> View All</a></li>
            <li <?php if($activePage == 'addPetLocation'):?>class="activepage"<?php endif;?>><a href="addPetLocation.php"><i class="fa fa-circle-o"></i> Add New</a></li> 
          </ul> 
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-diamond"></i>
            <span> Pets</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($activePage == 'allPets'):?>class="activepage"<?php endif;?>><a href="allPets.php"><i class="fa fa-circle-o"></i> View All</a></li> 
          </ul> 
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span> Blog Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($activePage == 'allBlogCategories'):?>class="activepage"<?php endif;?>><a href="allBlogCategories.php"><i class="fa fa-circle-o"></i> View All</a></li>
            <li <?php if($activePage == 'addBlogCategory'):?>class="activepage"<?php endif;?>><a href="addBlogCategory.php"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul> 
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span> Blog Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($activePage == 'allBlogPosts'):?>class="activepage"<?php endif;?>><a href="allBlogPosts.php"><i class="fa fa-circle-o"></i> View All</a></li>
          </ul> 
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span> Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($activePage == 'allusers'):?>class="activepage"<?php endif;?>><a href="allusers.php"><i class="fa fa-circle-o"></i> View All</a></li>
          </ul> 
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span> Site Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($activePage == 'sitesettings'):?>class="activepage"<?php endif;?>><a href="sitesettings.php"><i class="fa fa-circle-o"></i> Settings</a></li>
          </ul> 
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-photo"></i>
            <span> Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($activePage == 'allslides'):?>class="activepage"<?php endif;?>><a href="allslides.php"><i class="fa fa-circle-o"></i> View All</a></li>
            <li <?php if($activePage == 'addslide'):?>class="activepage"<?php endif;?>><a href="addslide.php"><i class="fa fa-circle-o"></i> Add Slide Image</a></li>
          </ul> 
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span> Messages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($activePage == 'messages'):?>class="activepage"<?php endif;?>><a href="messages.php"><i class="fa fa-circle-o"></i> View All</a></li>
          </ul> 
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-clipboard"></i>
            <span> Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($activePage == 'messages'):?>class="activepage"<?php endif;?>><a href="about.php"><i class="fa fa-circle-o"></i> About</a></li>
            <li <?php if($activePage == 'terms'):?>class="activepage"<?php endif;?>><a href="terms.php"><i class="fa fa-circle-o"></i> Terms and Conditions</a></li>
            <li <?php if($activePage == 'help'):?>class="activepage"<?php endif;?>><a href="help.php"><i class="fa fa-circle-o"></i> Help</a></li>
          </ul> 
        </li>          
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>