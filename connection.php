
<!-- PHP script to establish connection to the MySql Database -->
<!-- You can change the db_name to any database you create in localhost/phpMyAdmin .. Firstly download XAMPP Control Panel v3 -->
<!-- Change port to 3307 in case of conflict between XAMPP's mySql server and already present and running mySql server otherwise 3306 will work fine -->

<?php
// $servername = "localhost";    
// $username = "root"   ;              
// $password = "";                      
// $db_name ="finale";            

$servername = "sql104.infinityfree.com";      
$username = "if0_35666108";            
$password = "gHUF9w9iBHxRJn";                 
$db_name ="if0_35666108_dbtest";  

$conn = new mysqli($servername, $username, $password, $db_name, 3307);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
echo "";

?>