<?php
include('./config/config.php');
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
    
    public function select($query){
        $result = $this->connect->query($query) or die($this->connect->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }
    }
    
    public function insert($query){
        $result = $this->connect->query($query) or die($this->connect->error.__LINE__);
        if($result){
            $activePage = basename($_SERVER['PHP_SELF'], ".php");
                 
            switch ($activePage) {
                case 'addPetCategory':
                    echo "<script>window.location.assign('allPetCategories.php?message=".urlencode('New Category Added!')."')</script>";
                  
                case 'addPetLocation':
                    echo "<script>window.location.assign('allPetLocations.php?message=".urlencode('New Location Added!')."')</script>";
                    break;
                case 'addBlogCategories':
                    echo "<script>window.location.assign('allBlogCategories.php?message=".urlencode('New Location Added!')."')</script>";
                    break;
                
                case 'sitesettings':
                    echo "<script>window.location.assign('sitesettings.php?message=".urlencode('Settings Saved!')."')</script>";
                    break;
                
                case 'addslide':
                    echo "<script>window.location.assign('allslides.php?message=".urlencode('Slide Added!')."')</script>";
                    break;
                
                case 'about':
                    echo "<script>window.location.assign('about.php?message=".urlencode('About Page Content Added!')."')</script>";
                    break;
                
                case 'terms':
                    echo "<script>window.location.assign('terms.php?message=".urlencode('Terms and Conditions Page Content Added!')."')</script>";
                    break;
                
                case 'help':
                    echo "<script>window.location.assign('help.php?message=".urlencode('Help Page Content Added!')."')</script>";
                    break;
                
                default:
                    echo "<script>window.location.assign('index.php')</script>";
                    break;
            }
        }
    }
    
    public function update($query){
        $result = $this->connect->query($query) or die($this->connect->error.__LINE__); 
        if($result){
            $activePage = basename($_SERVER['PHP_SELF'], ".php");
                 
            switch ($activePage) {
                case 'editPetCategory':
                    echo "<script>window.location.assign('allPetCategories.php?message=".urlencode('Category Updated!')."')</script>";
                    break;
                
                case 'editPetLocation':
                    echo "<script>window.location.assign('allPetLocations.php?message=".urlencode('Location Updated!')."')</script>";
                    break;
                case 'editPet':
                    echo "<script>window.location.assign('allPets.php?message=".urlencode('Pet Updated!')."')</script>";
                    break;
                case 'editBlogPost':
                    echo "<script>window.location.assign('allBlogPosts.php?message=".urlencode('Post Updated!')."')</script>";
                    break;
                case 'edituser':
                    echo "<script>window.location.assign('allusers.php?message=".urlencode('User Updated!')."')</script>";
                    break;
                case 'sitesettings':
                    echo "<script>window.location.assign('sitesettings.php?message=".urlencode('Settings Updated!')."')</script>";
                    break; 
                case 'editslide':
                    echo "<script>window.location.assign('allslides.php?message=".urlencode('Slide Edited!')."')</script>";
                    break; 
                case 'messageaction':
                    echo "<script>window.location.assign('messages.php?message=".urlencode('Messages Updated!')."')</script>";
                    break;  
                case 'about':
                    echo "<script>window.location.assign('about.php?message=".urlencode('About Page Content Updated!')."')</script>";
                    break;
                
                case 'terms':
                    echo "<script>window.location.assign('terms.php?message=".urlencode('Terms and Conditions Page Content Updated!')."')</script>";
                    break;
                
                case 'help':
                    echo "<script>window.location.assign('help.php?message=".urlencode('Help Page Content Updated!')."')</script>";
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
                case 'deletePetCategory':
                    echo "<script>window.location.assign('allPetCategories.php?message=".urlencode('Category Deleted!')."')</script>";
                    break;
                
                case 'deletePetLocation':
                    echo "<script>window.location.assign('allPetLocations.php?message=".urlencode('Location Deleted!')."')</script>";
                    break;
                
                case 'deletePet':
                    echo "<script>window.location.assign('allPets.php?message=".urlencode('Pet Deleted!')."')</script>";
                    break;

                case 'deleteBlogPost':
                    echo "<script>window.location.assign('allBlogPosts.php?message=".urlencode('Post Deleted!')."')</script>";
                    break;
                

                case 'deletePetBid':
                    echo "<script>window.location.assign('allPets.php?message=".urlencode('Bid Deleted!')."')</script>";
                    break;

                case 'deletemessage':
                    echo "<script>window.location.assign('messages.php?message=".urlencode('Message Deleted!')."')</script>";
                    break;
                
                default:
                    echo "<script>window.location.assign('index.php')</script>";
                    break;
            }
        }  
    }
}