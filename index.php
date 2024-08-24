<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Log in to Gurus of Fitness</title>
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
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="display-4">Log in to</h2>
              <h1 class="display-2">Gurus of Fitness </h1>
              <p>Book proprerties online via online from us.</p>
              <img src="../asset/images/sauna.jpg" alt="" class="img-thumbnail">

            </div>
            <div class="col-md-6 " >
              <form action="?" method="post"style="background-color: lightblue; padding: 100px 50px; margin-top:50px; box-shadow:2px 2px gray; border-radius: 10px;">

                <div class="form-group" >
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Username">
                  
                </div>
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Password">
                  
                </div>
                <button type="submit" class="btn btn-danger bnt-md" name="submit">Log in </button>
                <button type="reset" class="btn btn-success btn-md">Cancel</button>

                <div class="form-group" style="margin: 1em 0px;">
                  <a href="signup.php" class="btn btn-primary btn-md btn-block">Create New Account</a>
                </div>


              </form>
              <?php
              //connecting database
              include '../connection.php';
              // clicking to submit button
              if(isset($_POST['submit']))
              {
                $a=$_POST['username'];
                $b=md5($_POST['password']);
                if($a=="" || $b=="")
                {
                  echo"<div class='alert alert-warning'> Some fields are empty!</div>";
                }
                else{
                  $query="select*from users1 where username='$a' and password='$b'";
                  $run=mysqli_query($conn,$query);
                  if(mysqli_num_rows($run)>0)
                  {
                    $_SESSION['username']=$a;
                    echo" <script>window.open('main.php','_self') </script>";
                  }
                  else
                  {
                    echo"<div class='alert alert-danger'> Invalid User!</div>";

                  }
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    
   
  </body>
</html>

