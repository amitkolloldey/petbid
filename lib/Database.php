<?php
include('config/config.php');
class Database{
    public $db_name = DB_NAME;
    public $db_user = DB_USER;
    public $db_pass = DB_PASS;
    public $db_host = DB_HOST;
    
    public $connect;
    public $error;
    
    
    public function __construct(){
        $this->Connection();
    }
    
    private function Connection(){ 
        $this->connect = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        if(!$this->connect){
            $this->error = "Error Establishing Database Connectiion!".$this->connect->connect_error;
            return false; 
        }
    }
    public function insert($query){
        $result = $this->connect->query($query) or die($this->connect->error.__LINE__);
        if($result){ 
            $activePage = basename($_SERVER['PHP_SELF'], ".php");
                 
            switch ($activePage) {
                case 'addmypet':
                    echo "<script>window.location.assign('mypets.php?message=".urlencode('You Have Added New Pet!')."')</script>";
                    break; 
                case 'addmyarticle':
                    echo "<script>window.location.assign('myarticles.php?message=".urlencode('You Have Added New Article!')."')</script>";
                    break;
                                   
                default:
                    echo "<script>window.location.assign('index.php')</script>";
                    break;
                }         
            }
        }    
    public function insertuser($query){
        $result = $this->connect->query($query) or die($this->connect->error.__LINE__);
        if($result){
         ?>
        <script type="text/javascript">
            $( "#registerbox" ).addClass( "in" ); 
            $( "#registerbox.in" ).css( "display","block" ); 
            $( "body" ).addClass( "modal-open" );
            $( "#msg" ).html( "<p class='alert alert-success' >Registration Successfull ! Please Login!!</p>" ); 
            $( ".close" ).click(function(){
                $( "#registerbox" ).removeClass( "in" ); 
                $( "body" ).removeClass( "modal-open" ); 
                $( "#registerbox" ).css( "display","none" );  
            });
        </script>
         <?php

        }
    }
    public function insertmessage($query){
        $result = $this->connect->query($query) or die($this->connect->error.__LINE__);
        if($result){
         ?>
        <script type="text/javascript"> 
            window.location.assign('/pet-bid/contact.php?contactmsg=<?php echo 'Message Sent!Thank You!'; ?>'); 
        </script>          
         <?php

        }
    }    
    public function select($query){
        $result = $this->connect->query($query) or die($this->connect->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }
    }

 
    
    public function update($query){
        $result = $this->connect->query($query) or die($this->connect->error.__LINE__); 
        if($result){
            $activePage = basename($_SERVER['PHP_SELF'], ".php");
                 
            switch ($activePage) {
                case 'myaccount':
                    echo "<script>window.location.assign('myaccount.php?message=".urlencode('Account Updated!')."')</script>";
                    break;
                                   
                default:
                    echo "<script>window.location.assign('index.php')</script>";
                    break;
            }
        }        
    } 
    
    public function delete($query){
        $result = $this->connect->query($query) or die($this->connect->error.__LINE__); 
        if($result){
            $activePage = basename($_SERVER['PHP_SELF'], ".php");
                 
            switch ($activePage) { 

                case 'deletePetBid':
                    echo "<script>window.location.assign('allPets.php?message=".urlencode('Bid Deleted!')."')</script>";
                    break;

                case 'deletemypet':
                    echo "<script>window.location.assign('mypets.php?message=".urlencode('Pet Deleted!')."')</script>";
                    break;
                case 'deletemybid':
                    echo "<script>window.location.assign('mybids.php?message=".urlencode('Bid Deleted!')."')</script>";
                    break;
                
                case 'deletemyarticle':
                    echo "<script>window.location.assign('myarticless.php?message=".urlencode('Article Deleted!')."')</script>";
                    break;
                
                default:
                    echo "<script>window.location.assign('index.php')</script>";
                    break;
            }
        }  
    }
     
}