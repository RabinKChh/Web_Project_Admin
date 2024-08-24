<?php
include '../connection.php';
if(isset($_GET['submit']))
{
     $a=$_GET['id2'];
     $b=$_GET['fname2'];
     $c=$_GET['lname2'];
     $d=$_GET['address2'];
     $e=$_GET['city2'];
     $f=$_GET['country2'];
     $g=$_GET['phone2'];
     $h=$_GET['email2'];
     $i=($_GET['booking2']);
     $query="update reservation set first_name='$b',last_name='$c',address='$d',city='$e',country='$f',phone='$g',email='$h',booking='$i' where id='$a'";
     $run=mysqli_query($conn,$query);
     if($run)
     {
        header("location:reservation.php");
     }
     else
     {
        echo "Update not successful!";
     }  
}


?>