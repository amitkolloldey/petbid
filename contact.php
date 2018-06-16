<?php
include('inc/header.php');?>
<div class="container">
    <section>
	    <div class="row">
	            <div class="col-lg-12">
	                <h2>Contact Us</h2>
	                <form action="" method="post">
	                    <?php if (isset($_GET['contactmsg'])): ?>
	                        <p class="alert alert-success"><?php echo $_GET['contactmsg']; ?></p>
	                    <?php endif; ?> 
	                    <div class="ccontact-form row">
	                        <div class="input-group col-lg-6">
	                            <input type="text" name="cname" class="form-control" placeholder="Name" aria-describedby="basic-addon2">
	                        </div>
	                        <div class="input-group col-lg-6">
	                            <input type="email" name="cemail" class="form-control" placeholder="Email" aria-describedby="basic-addon2">
	                        </div>
	                        <div class="input-group subject_in col-lg-12">
	                            <input type="text" name="csubject" class="form-control input-md " placeholder="Subject" aria-describedby="basic-addon2">
	                        </div>
	                        <div class="input-group subject_in col-lg-12">
	                            <textarea placeholder="Message" name="cmessage" id="cmessage" class="form-control" maxlength="300" value="Message Should Be Less Than 300 letter"></textarea>
	                        </div>
	                        
	                        <small class="alert-danger" id="climit"></small>
	                        <input type="submit" class="btn pet-bid-btn" value="Send" name="csend">
	                    </div>    
	                </form>
	                <?php  
	                if(isset($_POST['csend'])){
	                $cname = mysqli_real_escape_string ($db->connect,$_POST['cname']); 
	                $cemail = mysqli_real_escape_string ($db->connect,$_POST['cemail']); 
	                $csubject = mysqli_real_escape_string ($db->connect,$_POST['csubject']); 
	                $cmessage = mysqli_real_escape_string ($db->connect,$_POST['cmessage']); 
	                if($cname == '' || $cemail == '' || $csubject == '' || $cmessage == ''){
	                echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
	                }else{ 
	                $query = "INSERT INTO message(subject,sender_name,sernder_email,message) VALUES('$csubject','$cname','$cemail','$cmessage')";
	                $inserted_rows = $db->insertmessage($query); 
	                } }
	                ?>                
	            </div>
        </div>
    </section>
    </div><!-- /.container -->
<?php include('inc/footer.php');?>                 