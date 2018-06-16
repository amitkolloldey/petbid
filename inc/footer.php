<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2>See On Map</h2>
                    <?php $query = "SELECT map FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){echo $row['map'];}}?>
                </div>
                <div class="col-lg-2">
                    <div class="pet-address">
                        <h2>Find Us</h2>
                        <ul class="list-unstyle">
                            <li>Address : <?php $query = "SELECT site_address FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){echo $row['site_address'];}}?></li>
                            <li>Contact No : <?php $query = "SELECT site_contactno FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){echo $row['site_contactno'];}}?> </li>
                            <li>Contact No : <?php $query = "SELECT site_adminemail FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){echo $row['site_adminemail'];}}?> </li>
                        </ul>
                    </div>
                    <div class="pet-social">
                        <ul class="list-unstyle list-inline">
                            <?php $query = "SELECT facebook FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){?>
                            <li><i class="fa fa-facebook"></i> <a href="<?php echo $row['facebook']; ?>">Facebook</a></li><?php }} ?> 
                        
                            <?php $query = "SELECT twitter FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){?>
                            <li><i class="fa fa-twitter"></i> <a href="<?php echo $row['twitter']; ?>">Twitter</a></li><?php }} ?> 
                        
                            <?php $query = "SELECT googleplus FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){?>
                            <li><i class="fa fa-google-plus"></i> <a href="<?php echo $row['googleplus']; ?>">Facebook</a></li><?php }} ?> 
                        
                            <?php $query = "SELECT youtube FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){?>
                            <li><i class="fa fa-youtube"></i> <a href="<?php echo $row['youtube']; ?>">Youtube</a></li><?php }} ?> 
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="pet-footer-menu">
                        <h2>Information</h2>
                        <ul class="list-unstyle">
                            <li><a href="about.php">About</a></li> 
                            <li><a href="contact.php">Contact Us</a></li> 
                            <li><a href="help.php">Help</a></li> 
                            <li><a href="terms.php">Terms and Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h2>Contact Us</h2>
                    <form action="" method="post"> 
                        <div class="contact-form">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" placeholder="Name" aria-describedby="basic-addon2">
                            </div>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon2">
                            </div>
                            <div class="input-group subject_in">
                                <input type="text" name="subject" class="form-control input-md " placeholder="Subject" aria-describedby="basic-addon2">
                            </div>
                            <textarea placeholder="Message" name="message" id="message" class="form-control" maxlength="300" value="Message Should Be Less Than 300 letter"></textarea>
                            <small class="alert-danger" id="limit"></small>
                            <input type="submit" class="btn pet-bid-btn" value="Send" name="send">
                        </div>    
                    </form>
                    <?php  
                    if(isset($_POST['send'])){
                    $name = mysqli_real_escape_string ($db->connect,$_POST['name']); 
                    $email = mysqli_real_escape_string ($db->connect,$_POST['email']); 
                    $subject = mysqli_real_escape_string ($db->connect,$_POST['subject']); 
                    $message = mysqli_real_escape_string ($db->connect,$_POST['message']); 
                    if($name == '' || $email == '' || $subject == '' || $message == ''){
                    echo "<p class='alert alert-danger'>All Fields Must Be Filled!</p>";
                    }else{ 
                    $query = "INSERT INTO message(subject,sender_name,sernder_email,message) VALUES('$subject','$name','$email','$message')";
                    $inserted_rows = $db->insertmessage($query); 
                    } }
                    ?>                
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                   <?php $query = "SELECT copyright FROM site_settings WHERE id='1'"; $select = $db->select($query); if($select){while($row = $select->fetch_assoc()){echo $row['copyright'];}}?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<!--Jquery Datatables JS-->  
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#allposts').DataTable({
    "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
       "order": [],
    "pageLength": 5
    });
    $( "#date" ).datepicker( {
    dateFormat: 'yy-mm-dd'
} );    
} );
</script> 
<script type="text/javascript">
$(function () {
    $(document).on("keyup", "#message", function (e) {
        if ($(e.target).val().length >= 300) {
            $("#limit").text($(e.target).attr("value")).fadeOut(0).fadeIn(1000).fadeOut(1000);
        };
    });
    $(document).on("keyup", "#cmessage", function (e) {
        if ($(e.target).val().length >= 300) {
            $("#climit").text($(e.target).attr("value")).fadeOut(0).fadeIn(1000).fadeOut(1000);
        };
    });

})    
</script>
<?php if (Session::get('ulogin') == true): ?>
<!-- Modal bidbox-->
<div id="bidbox" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal_form">
                    <div class="login-logo text-center">
                        <a href=""><b>Bid On This Pet</b> </a>
                    </div>
                    <!-- /.login-logo -->
                    <div class="login-box-body ">
                        
                        <form class="form-horizontal" action="" method="post" id="bidform">
                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="title" name="title" placeholder="Bid Title" class="form-control input-md" type="text">
                                    </div>
                                </div>
                                <!-- Textarea -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <!-- Textarea -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        $querybid = "SELECT my_bid FROM pet_bids WHERE pet='$id' GROUP BY id ORDER BY MAX(my_bid) DESC ";
                                        $selectbid = $db->select($querybid);
                                        $rowbid = $selectbid->fetch_assoc() ;
                                        $queryinc = "SELECT incremental_amount FROM pets WHERE id='$id'";
                                        $selectinc = $db->select($queryinc);
                                        while ($rowinc = $selectinc->fetch_assoc()) {
                                        $min_bid = $rowinc['incremental_amount'] + $rowbid['my_bid'];
                                        ?>
                                        <input class="form-control input-md" type="number" name="my_bid" step="<?php echo $rowinc['incremental_amount']; ?>" min="<?php echo $min_bid; ?>" value="<?php echo $min_bid; ?>">
                                        <span>Minimum Bid Amount For This Pet: <strong><?php echo $min_bid; ?></strong></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- Textarea -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block btn-flat" value="Bid" name="bid">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <?php
                        /*
                        Insert Query
                        */
                        if( isset($_POST['bid']) ){
                        $author = Session::get('id');
                        $petid = $_GET['id'];
                        $title = mysqli_real_escape_string ($db->connect,$_POST['title']);
                        $description = mysqli_real_escape_string ($db->connect,$_POST['description']);
                        $my_bid = mysqli_real_escape_string ($db->connect,$_POST['my_bid']);
                        if($title == '' || $description == '' || $my_bid == '' || $petid == '' ||$author == '' ){
                        echo "<p class='alert alert-danger'>All Fields Must Be Filled!!</p>";
                        ?>
                        <script type="text/javascript">
                        $( "#bidbox" ).addClass( "in" );
                        $( "#bidbox.in" ).css( "display","block" );
                        $( "body" ).addClass( "modal-open" );
                        $( ".close" ).click(function(){
                        $( "#bidbox" ).removeClass( "in" );
                        $( "body" ).removeClass( "modal-open" );
                        $( "#bidbox" ).css( "display","none" );
                        });
                        </script>
                        <?php
                        }else{
                        $query = "INSERT INTO pet_bids(bid_author , pet , title , description , my_bid) VALUES('$author' , '$petid' , '$title' , '$description' , '$my_bid')";
                        $inserted_rows = $db->insert($query);
                        } }
                        ?>
                    </div>
                    <!-- /.login-box-body -->
                </div>
                <!-- /.login-box -->
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (Session::get('ulogin') == false): ?>
<!-- Modal loginbox-->
<div id="loginbox" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal_form">
                    <div class="login-logo text-center">
                        <a href=" "><b>User Login</b> </a>
                    </div>
                    <!-- /.login-logo -->
                    <div class="login-box-body ">
                        <form action="" method="post">
                            <div class="form-group has-feedback">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-xs-12">
                                    <input type="submit" class="btn btn-primary btn-block btn-flat" value="Login" name="login">
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                        <?php if(isset($_POST['login'])){
                        $email = $fd->validation($_POST['email']);
                        $password = $fd->validation(md5($_POST['password']));
                        $email = mysqli_real_escape_string($db->connect,$email);
                        $password = mysqli_real_escape_string($db->connect,$password);
                        $query = "SELECT * FROM users WHERE email='$email' AND password='$password' AND status='1'";
                        $select = $db->select($query);
                        if($select != false){
                        $value = mysqli_fetch_array($select);
                        $row = mysqli_num_rows($select);
                        if($row > 0){
                        Session::set('ulogin',true);
                        Session::set('name',$value['name']);
                        Session::set('email',$value['email']);
                        Session::set('id',$value['id']);
                        Session::set('image',$value['image']);
                        Session::set('password',$value['password']);
                        echo "<script>window.location.assign('".$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']."')</script>";
                        }else{
                        echo "<p class='alert alert-danger'>Login Failed!</p>";
                        ?>
                        <script type="text/javascript">
                        $( "#loginbox" ).addClass( "in" );
                        $( "#loginbox.in" ).css( "display","block" );
                        $( "body" ).addClass( "modal-open" );
                        $( ".close" ).click(function(){
                        $( "#loginbox" ).removeClass( "in" );
                        $( "body" ).removeClass( "modal-open" );
                        $( "#loginbox" ).css( "display","none" );
                        $( "#loginmsg" ).css( "display","none" );
                        });
                        </script>
                        <?php
                        }
                        }else{
                        echo "<p class='alert alert-danger'>Email or password is incorrect!</p>";
                        ?>
                        <script type="text/javascript">
                        $( "#loginbox" ).addClass( "in" );
                        $( "#loginbox.in" ).css( "display","block" );
                        $( "body" ).addClass( "modal-open" );
                        $( ".close" ).click(function(){
                        $( "#loginbox" ).removeClass( "in" );
                        $( "body" ).removeClass( "modal-open" );
                        $( "#loginbox" ).css( "display","none" );
                        $( "#loginmsg" ).css( "display","none" );
                        });
                        </script>
                        <?php
                        }
                        }?>
                        <!-- /.social-auth-links -->
                    </div>
                    <!-- /.login-box-body -->
                </div>
                <!-- /.login-box -->
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<!-- Modal registerbox-->
<?php if (Session::get('ulogin') == false): ?>
<div id="registerbox" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal_form ">
                    <div class="login-logo text-center">
                        <a href=" "><b>Register</b> </a>
                    </div>
                    <!-- /.login-logo -->
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <fieldset>
                            <div id="msg"></div>
                            <!-- Text input-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="name" name="rname" placeholder="Name" class="form-control input-md" required="" type="text">
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="email" name="remail" placeholder="Email" class="form-control input-md" required="" type="text">
                                </div>
                            </div>
                            <!-- Pass input-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="password" name="rpassword" placeholder="Password" class="form-control input-md" required="" type="password">
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="cell" name="rcell" placeholder="Cell Phone" class="form-control input-md" required="" type="text">
                                </div>
                            </div>
                            <!-- File Button -->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="image" name="rimage" class="form-control input-md" type="file" accept="image/*">
                                    <span>Upload Your Image</span>
                                </div>
                            </div>
                            <!-- Textarea -->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="address" name="raddress" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary btn-block btn-flat" value="Register" name="register">
                                </div>
                            </div>
                        </fieldset>
                        <?php
                        /*
                        Insert Query
                        */
                        if( isset($_POST['register']) ){
                        $rname = mysqli_real_escape_string ($db->connect,$_POST['rname']);
                        $remail = mysqli_real_escape_string ($db->connect,$_POST['remail']);
                        $rpassword = mysqli_real_escape_string ($db->connect,$_POST['rpassword']);
                        $rcell = mysqli_real_escape_string ($db->connect,$_POST['rcell']);
                        $raddress = mysqli_real_escape_string ($db->connect,$_POST['raddress']);
                        $rpassword = md5($rpassword);
                        $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $author_image = $_FILES['rimage']['name'];
                        $author_image_size = $_FILES['rimage']['size'];
                        $author_image_temp = $_FILES['rimage']['tmp_name'];
                        $div = explode('.', $author_image);
                        $author_image_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$author_image_ext;
                        $uploaded_image = "uploads/".$unique_image;
                        $uploaded_image2 = "admin/uploads/".$unique_image;
                        if($rname == '' || $remail == '' || $rpassword == '' || $rcell == '' || $author_image == '' || $raddress == '' ){
                        echo "<p class='alert alert-danger'>All Fields Must Be Filled!!</p>";
                        ?>
                        <script type="text/javascript">
                        $( "#registerbox" ).addClass( "in" );
                        $( "#registerbox.in" ).css( "display","block" );
                        $( "body" ).addClass( "modal-open" );
                        $( ".close" ).click(function(){
                        $( "#registerbox" ).removeClass( "in" );
                        $( "body" ).removeClass( "modal-open" );
                        $( "#registerbox" ).css( "display","none" );
                        });
                        </script>
                        <?php
                        
                        }
                        $rquery = "SELECT * FROM users WHERE email='$remail'";
                        $rselect = $db->select($rquery);
                        
                        if($rselect != false){
                        $rvalue = mysqli_fetch_array($rselect);
                        $rrow = mysqli_num_rows($rselect);
                        if($rrow > 0){
                        echo "<p class='alert alert-danger'>The Email ".$remail." already Registerd!!</p>";
                        ?>
                        <script type="text/javascript">
                        $( "#registerbox" ).addClass( "in" );
                        $( "#registerbox.in" ).css( "display","block" );
                        $( "body" ).addClass( "modal-open" );
                        $( ".close" ).click(function(){
                        $( "#registerbox" ).removeClass( "in" );
                        $( "body" ).removeClass( "modal-open" );
                        $( "#registerbox" ).css( "display","none" );
                        });
                        </script>
                        <?php
                        }
                        }
                        elseif ($author_image_size >1048567) {
                        echo "<p class='alert alert-danger'>Image Size Should Be Less Than 1MB!!</p>";
                        ?>
                        <script type="text/javascript">
                        $( "#registerbox" ).addClass( "in" );
                        $( "#registerbox.in" ).css( "display","block" );
                        $( "body" ).addClass( "modal-open" );
                        $( ".close" ).click(function(){
                        $( "#registerbox" ).removeClass( "in" );
                        $( "body" ).removeClass( "modal-open" );
                        $( "#registerbox" ).css( "display","none" );
                        });
                        </script>
                        <?php
                        } elseif (in_array($author_image_ext, $permited) === false) {
                        echo "<p class='alert alert-danger'>You can upload only:-"
                        .implode(', ', $permited)."</span>";
                        ?>
                        <script type="text/javascript">
                        $( "#registerbox" ).addClass( "in" );
                        $( "#registerbox.in" ).css( "display","block" );
                        $( "body" ).addClass( "modal-open" );
                        $( ".close" ).click(function(){
                        $( "#registerbox" ).removeClass( "in" );
                        $( "body" ).removeClass( "modal-open" );
                        $( "#registerbox" ).css( "display","none" );
                        });
                        </script>
                        <?php
                        }
                        else{
                        move_uploaded_file($author_image_temp, $uploaded_image);
                        copy($uploaded_image, $uploaded_image2);
                        $rrquery = "INSERT INTO users(name,email,password,cell,address,image,status)
                        VALUES('$rname' , '$remail' , '$rpassword' ,'$rcell' ,'$raddress' ,'$uploaded_image' ,'1')";
                        $rinserted_rows = $db->insertuser($rrquery);
                        } }
                        ?>
                    </form>
                </div>
                <!-- /.login-box -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endif ;?>



</body>
</html>