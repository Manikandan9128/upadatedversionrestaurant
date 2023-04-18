<?php
// echo '<pre>';
// print_r($_POST);
// exit();
$conn =mysqli_connect("localhost","root","Manipriyan","ajax");

// if(isset($_GET["data"])){
   echo $search=$_POST["data"];
   exit;
    $sql="select * from user where username like '%$search'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($result){
        while($pull=mysqli_fetch_assoc($result)){
            $name=$pull["username"];
            echo "<h1>$name<h1>";
            
        }
    }
    
// }
?>
       <!-- -->