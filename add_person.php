
<?php
include "db_connection.php";

if (isset($_POST["submit"])) {
    $id = rand(1, 999);
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $email = $_POST['email'];
   $gender = $_POST['gender'];
   $profile_picture = '';

    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === 0) {
      $target_dir = "uploads/";
      
     
      if (!file_exists($target_dir)) {
         mkdir($target_dir, 0777, true);
      }
      
      $profile_picture = $target_dir . basename($_FILES["profile_picture"]["name"]);
      $imageFileType = strtolower(pathinfo($profile_picture, PATHINFO_EXTENSION));
      
 
      $valid_extensions = array("jpg", "jpeg", "png", "gif");
      if (in_array($imageFileType, $valid_extensions)) {
         if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_picture)) {
           
         } else {
            echo "Error uploading file.";
         }
      } else {
         echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
         $profile_picture = ''; 
      }
   }

   $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`, `profile_picture`) VALUES ('$id','$first_name','$last_name','$email','$gender', '$profile_picture')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

  
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

   <title>Person dB</title>
   <style>
    body {
        font-family: 'Raleway', sans-serif; 
    }
  </style>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
     Person dB
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New User</h3>
         <p class="text-muted">Complete the form below to add a new user</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" enctype="multipart/form-data"   style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">First Name:</label>
                  <input type="text" class="form-control" name="first_name" placeholder="Albert">
               </div>

               <div class="col">
                  <label class="form-label">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" placeholder="Einstein">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Email:</label>
               <input type="email" class="form-control" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
               <label class="form-label">Profile Picture:</label>
               <input type="file" class="form-control" name="profile_picture" accept="image/*">
            </div>
            <div class="form-group mb-3">
               <label>Gender:</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="gender" id="male" value="male">
               <label for="male" class="form-input-label">Male</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="gender" id="female" value="female">
               <label for="female" class="form-input-label">Female</label>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="./index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>