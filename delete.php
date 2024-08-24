<?php
include '../connection.php';
if(isset($_GET['Del']))
{
    $delid= $_GET['Del'];
    $query="delete from users1 where id ='$delid'";
    $run=mysqli_query($conn,$query);
    if($run)
    {
        header("location:users.php");
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