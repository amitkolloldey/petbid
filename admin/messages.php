<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');
$query = "SELECT * FROM message";
$select = $db->select($query);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        All Messages
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_GET['message'])){
                echo "<p class='alert alert-success'>".$_GET['message']."</p>";
                }?>
                <?php if($select){?>
                <table id="allposts" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Sending Date</th>
                            <th>Status</th>
                            <th>Acticon</th> 
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Sending Date</th>
                        <th>Status</th> 
                        <th>Acticon</th> 
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php while($row = $select->fetch_assoc()){
                        ?>
                        <tr>
                            <th><?php echo $row['id'];?></th>
                            <th><?php echo $row['sender_name'];?></th>
                            
                            <th><?php echo $row['sernder_email'];?></th>
                            <th><?php echo $row['subject'];?></th>
                            <th><?php echo $row['message'];?></th>  
                            <th><?php echo $row['created_date'];?></th>
                            <th>
                                <?php if ($row['archived'] == '0'): ?>
                                <a href="messageaction.php?read=<?php echo $row['id'];?>" class="btn btn-warning">Mark As Read</a>
                                <?php else: ?>
                                <a href="messageaction.php?unread=<?php echo $row['id'];?>" class="btn btn-success">Mark As UnRead</a>
                                <?php endif ?>
                            </th>
                            <th><a href="deletemessage.php?id=<?php echo urlencode($row['id']);?>">Delete</a>
                        </th>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{
            echo "<p class='alert alert-danger'>No User Found!</p>";
            } ?>
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('inc/footer.php');?>