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
              <h1>Add new post</h1>
              <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Title">
              </div>    

              <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" name="content" id="content" class="form-control" placeholder="Your content" ></textarea>
               
              </div>
            
                <div class="form-group">
                  <label for="image">Select Image:</label>
                  <input type="file" class="form-control-file" name="image" id="image" placeholder="Image" >
                 
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                <button type="reset" class="btn btn-danger">Cancel</button>

            </form>
            <br>
            <?php
              include'../connection.php';
              if(isset($_POST['submit']))
              {
                $title=$_POST['title'];
                $content=$_POST['content'];
                $image_name=$_FILES['image']['name'];
                $image_type=$_FILES['image']['type'];
                $image_tmp=$_FILES['image']['tmp_name'];
                if($title=="" || $content=="" || $image_name=="" )
                {
                  echo"<div class='alert alert-danger'> Some fields are empty!</div>";
                }
                else
                {
                move_uploaded_file("$image_tmp","../asset/img/$image_name");
                $query="insert into posts(title,content ,image) values('$title','$content','$image_name')";
                $run=mysqli_query($conn,$query);

                if($run)
                {
                  echo"<div class='alert alert-success'>upload Successfully!</div>";
                }
                else
                {
                  echo"<div class='alert alert-danger'>Error Found</div>";
                }
              }
                }
              ?>
              
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