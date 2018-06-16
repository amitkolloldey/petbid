<?php   
function queryfunction( $table,$column){ 
$query = "SELECT $column FROM $table"; 
return $query;
}