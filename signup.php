<!doctype html>
<html lang="en">

<head>
  <title>Sign up to United Limited</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="display-1">Sign up</h1>
          <h2 class="display-3"> to connect</h2>
          <h3 class=" display-4">with us.</h3>
        </div>
          
        <div class="col-md-6">
          <form action="" method="post"
            style="margin-top 50px; background-color:lightblue;  padding:20px; border-radius: 10px;">
            <div class="form-group">
              <label for="fname">First Name:</label>
              <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
              <label for="lname">Last Name:</label>
              <input type="text" name="lname" id="lname" class="form-control" placeholder=" Last Name">

            </div>
            <div class="form-group">
              <label for="username">User Name:</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="User Name">

            </div>

            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="password">Confirm Password:</label>
              <input type="password" class="form-control" name="cpassword" id="cpassword"
                placeholder="Confirm Password">
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-lg">Sign up</button>
            <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
            <a href="index.php" class="btn btn-primary btn-lg">Log in</a>

          </form>
          <?php
                   include'../connection.php';
                   if(isset($_POST['submit']))
                   {
                    $a=$_POST['fname'];
                    $b=$_POST['lname'];
                    $c=$_POST['username'];
                    $d=md5($_POST['password']);
                    $e=md5($_POST['cpassword']);
                    
                    if($a==""  || $b=="" || $c=="" || $d=="" || $e=="" )
                    {
                      echo "<div class='alert alert-warning'> Some fields are empty! </div> ";
                      //echo"<script> window.alert('Some  fields are empty!')</script>";
                    }
                    else if ($d!=$e) {
                      echo "<div class='alert alert-warning'> Password is not matched </div>";
                    }
                   
                    else
                    {
                      //query start
                     $query="insert into users1(first_name,last_name,username,password) values('$a','$b','$c','$d')";
                     $run=mysqli_query($conn,$query);
                     if($run) 
                     {
                      echo "<div class='alert alert-success'> Create account successfully! </div> ";
                     }
                     else
                     {
                      echo "<div class='alert alert-success'> Error found! </div>";
                      }
                    //end
                    }
                   }
                   ?>
        </div>
      </div>
    </div>
  </div>

</body>

</html>