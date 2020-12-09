<?php 
// Include the database configuration file  
require_once 'dbConfig.php'; 
 
// Get image data from database 
$id=$_GET['id'];
$pageName=$_GET['pageName'];
if($pageName === 'image'){
    $result = $db->query("DELETE  FROM images where id=".$id); 
    if($result){
        echo "<script>window.location.replace('view.php')</script>";
    }
}
else if($pageName === 'file'){
    $result = $db->query("DELETE  FROM files where id=".$id); 
    if($result){
        echo "<script>window.location.replace('retrieve.php')</script>";
    }
}

?>