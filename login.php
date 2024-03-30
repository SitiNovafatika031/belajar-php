<?php

$conn = mysqli_connect('localhost', 'root', '', 'user_form');

if (isset($_POST['submit-signin'])) {

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = md5($_POST['password']);

   $select = "SELECT * FROM user_form WHERE name = '$username'";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         if ($row['password'] === $password) {
            header('location: produk.php');
         } else {
            $error[] = 'Password anda salah!';
         }
      }
   } else {
      $error[] = 'Username anda salah!';
   }

};

if (isset($_POST['submit-signup'])) {
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = "SELECT * FROM user_form WHERE name = '$username' OR email = '$email'";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         if ($row['name'] === $username) {
            $error[] = 'Username sudah digunakan!';
         } else if ($row['email'] === $email) {
            $error[] = 'Email sudah digunakan!';
         }
      }
   } else {
      if ($pass !== $cpass) {
         $error[] = 'Password tidak sama!';
      } else {
         $insert = "INSERT INTO user_form (name, email, password) VALUES ('$username', '$email', '$pass')";
         mysqli_query($conn, $insert);
         $success[] = 'Akun anda berhasil dibuat!';
      };
   };
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>
<body background="image/baground.jpeg">
   <div class="wrapper">
      <div class="form-wrapper sign-in">
         <form action="" method="post">
            <h2>Sign In</h2>
            <?php
               if (isset($error)) {
                  foreach ($error as $message) {
                     echo '<span class="error-message">'.$message.'</span>';
                  }
               }
            ?>

            <div class="input-group">
               <input type="text" name="username" required>
               <label for="">Username</label>
            </div>
            <div class="input-group">
               <input type="password" name="password" required>
               <label for="">Password</label>
            </div>
            <div class="remember">
               <label for=""><input type="checkbox" name="remember">Ingat saya</label>
            </div>
            <input type="submit" name="submit-signin" class="btn" value="Sign In">
            <div class="signup-link">
               <p>Belum mempunyai akun? <a href="#" class="signup-btn-link">Sign Up</a></p>
            </div>
         </form>

      </div>

      <div class="form-wrapper sign-up">
         <form action="" method="post">
            <h2>Sign Up</h2>
            <?php
         
               if (isset($error)) {
                  foreach ($error as $message) {
                     echo '<span class="error-message">'.$message.'</span>';               
                  }
               }

               if (isset($success)) {
                  foreach($success as $message) {
                     echo '<span class="success-message">'.$message.'</span>';
                  }
               }
            
            ?>

            <div class="input-group">
               <input type="text" name="username" required>
               <label for="">Username</label>
            </div>
            <div class="input-group">
               <input type="email" name="email" required>
               <label for="">Email</label>
            </div>
            <div class="input-group">
               <input type="password" name="password" required>
               <label for="">Password</label>
            </div>
            <div class="input-group">
               <input type="password" name="cpassword" required>
               <label for="">Confirm Password</label>
            </div>

            <input type="submit" name="submit-signup" class="btn" value="Sign Up">
            <div class="signup-link">
               <p>Sudah mempunyai akun? <a href="#" class="signin-btn-link">Sign In</a></p>
            </div>
         </form>
      </div>
   </div>
   <script src="js/script.js"></script>
</body>
</html>