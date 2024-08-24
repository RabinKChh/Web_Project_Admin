<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:index.php");
}
else
{
?>
<!--bootstrap start-->
<!doctype html>
<html lang="en">
  <head>
    <title>[Dashboard]</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
      <!--narbar start-->
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
          <a class="navbar-brand" href="main.php">Dashboard</a>
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation"></button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          </ul>
              <form class="form-inline my-2 my-lg-0">
              <strong style="color:white; text-transform:uppercase;"> Welcome!
               <?php echo $_SESSION['username']; ?>&nbsp; &nbsp;
               <a href="logout.php" class="btn btn-danger">Log out</a>
            </strong>
        </form> 
          </div>
      </nav>
      <!--narbar end-->
      <!-- dashboard area start-->
      <div class="container-fluid" style="margin-top: 35px;">
        <div class="row">
          <div class="col-md-3">
              <a href="users.php" class="btn btn-success btn-block">Users</a>
              <a href="reservation.php" class="btn btn-success btn-block">Reservations</a>
              <a href="upload-image.php" class="btn btn-success btn-block">Upload Image</a>
              <a href="add-post.php" class="btn btn-success btn-block">Add Posts</a>

            </div>
            <div class="col-md-9">
              <h1>Reservation Infromation</h1>
              <table class="table table-boardered table-info table-striped table-hover">
                <thead class="thead ">
                  <th>UserID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Country</th>
                  <th>phone</th>
                  <th>Email</th>
                  <th>No. of Rooms</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </thead>
                <?php
                include '../connection.php';
                $query="select * from reservation";
                $run=mysqli_query($conn,$query);
                while($row=mysqli_fetch_array($run))
                {
                  $a=$row['id'];
                  $b=$row['first_name'];
                  $c=$row['last_name'];
                  $d=$row['address'];
                  $e=$row['city'];
                  $f=$row['country'];
                  $g=$row['phone'];
                  $h=$row['email'];
                  $i=$row['booking'];
              
                ?>
                <tbody >
                  <td><?php echo $a;?></td>
                  <td><?php echo $b;?></td>
                  <td><?php echo $c;?></td>
                  <td><?php echo $d;?></td>
                  <td><?php echo $e;?></td>
                  <td><?php echo $f;?></td>
                  <td><?php echo $g;?></td>
                  <td><?php echo $h;?></td>
                  <td><?php echo $i;?></td>
                  <td> <a href="edit1.php?id=<?php echo $a; ?> &fname=<?php echo $b; ?> &lname=<?php echo $c;?> &address=<?php echo $d;?>&city=<?php echo $e;?> &country=<?php echo $f; ?> &phone=<?php echo $g;?> &email=<?php echo $h;?> &booking=<?php echo $i;?>" class="btn btn-primary">Edit</a></td>
                  <td><a href="delete1.php?Del=<?php echo $a; ?>" class="btn btn-danger">Delete</a></td>
                </tbody>
                
                <?php
                }
                ?>
              
              </table>
                
           </div>
        </div>
      
      </div>
      <!-- dashboard area end-->
    
  </body>
</html>
<!--bootstrap end-->

<?php
}
?>