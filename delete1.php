<?php
include '../connection.php';
if(isset($_GET['Del']))
{
    $delid= $_GET['Del'];
    $query="delete from reservation where id ='$delid'";
    $run=mysqli_query($conn,$query);
    if($run)
    {
        header("location:reservation.php");
    }
    else
    {
        echo"Users not deleted!";
    }
}
?>
<h2>
    <a href="index.php">Go to home &gt; &gt;</a>
</h2>