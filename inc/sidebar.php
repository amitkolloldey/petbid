<div class="sidemenu_wrapper">
<div class="umenu">
    <ul>
        <?php $activePage = basename($_SERVER['PHP_SELF'], ".php");?>

        <li><a href="myaccount.php" class='<?php if($activePage == 'myaccount'):?>active_umenu<?php endif;?>'><i class="fa fa-cog"></i>My Account <i class="fa fa-angle-right pull-right "></i></a> </li>  

        <li><a href="mypets.php" class='<?php if($activePage == 'mypets'):?>active_umenu<?php endif;?>'><i class="fa fa-paw"></i>My Pets <i class="fa fa-angle-right pull-right "></i></a> </li> 

        <li><a href="mybids.php" class='<?php if($activePage == 'mybids'):?>active_umenu<?php endif;?>'><i class="fa fa-gavel"></i>My Bids <i class="fa fa-angle-right pull-right "></i></a> </li>  

        <li><a href="myarticles.php" class='<?php if($activePage == 'myarticles'):?>active_umenu<?php endif;?>'><i class="fa fa-book"></i>My Articles <i class="fa fa-angle-right pull-right "></i></a> </li>   
 
    </ul>
</div>
<hr>
<div class="umenu">
    <ul>
        <?php $activePage = basename($_SERVER['PHP_SELF'], ".php");?>

        <li><a href="addmypet.php" class='<?php if($activePage == 'addmypet'):?>active_umenu<?php endif;?>'><i class="fa fa-plus"></i><i class="fa fa-paw"></i>Add New Pet <i class="fa fa-angle-right pull-right "></i></a> </li>    

        <li><a href="addmyarticle.php" class='<?php if($activePage == 'addmyarticle'):?>active_umenu<?php endif;?>'><i class="fa fa-plus"></i><i class="fa fa-book"></i>Add New Article <i class="fa fa-angle-right pull-right "></i></a> </li>    
 
    </ul>
</div>	
<hr>
<div class="umenu">
    <ul> 

        <li><a href="contact.php" target="_blank"><i class="fa fa-envelope"></i>Support </a> </li>    
        <li><a href="terms.php" target="_blank"><i class="fa fa-flag"></i>Terms And Condition </a> </li>    
    
    </ul>
</div>	
</div>
