<?php
session_start();
if(isset($_SESSION['admin'])){
    header('location:home.php');
}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page" style="background: linear-gradient(to right,rgba(131, 16, 6, 0.87),rgba(5, 3, 56, 0.88)); height: 100vh; font-family: 'Poppins', sans-serif; margin: 0; display: flex; justify-content: center; align-items: center;">

<!-- Login Box -->
<div class="login-box" style="background-color: rgba(150, 10, 10, 0.64); padding: 30px; border-radius: 10px; box-shadow: 0 15px 30px rgba(5, 17, 98, 0.84); width: 100%; max-width: 400px;">

   <!-- Logo and Heading -->
   <div class="login-logo" style="text-align: center; margin-bottom: 20px;">
      <h2 style="color:rgba(37, 120, 208, 0.94); font-weight: 700; font-size: 40px;">Admin Login</h2>
   </div>

   <!-- Login Form -->
   <div class="login-box-body">
      <p class="login-box-msg" style="text-align: center; color: rgba(231, 226, 226, 0.83); font-size: 16px; margin-bottom: 30px;">Sign in to start your session</p>

      <form action="login.php" method="POST">

         <!-- Username Field -->
         <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Enter Username" required autofocus style="border-radius: 5px; padding: 12px; font-size: 14px; border: 1px solid #ccc; transition: all 0.3s ease;">
            <span class="glyphicon glyphicon-user form-control-feedback" style="color: #007bff;"></span>
         </div>

         <!-- Password Field -->
         <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required style="border-radius: 5px; padding: 12px; font-size: 14px; border: 1px solid #ccc; transition: all 0.3s ease;">
            <span class="glyphicon glyphicon-lock form-control-feedback" style="color: #007bff;"></span>
         </div>

         <!-- Submit Button -->
         <div class="row">
            <div class="col-xs-12">
               <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" style="background-color: #007bff; color: white; padding: 12px; font-size: 16px; border-radius: 5px; transition: background-color 0.3s ease;">Sign In</button>
            </div>
         </div>
      </form>
   </div>

   <!-- Error Message Display -->
   <?php
   if(isset($_SESSION['error'])){
      echo "
      <div class='callout callout-danger text-center mt20' style='background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px;'>
         <p>".$_SESSION['error']."</p> 
      </div>";
      unset($_SESSION['error']);
   }
   ?>

</div>

<?php include 'includes/scripts.php' ?>

</body>
</html>

<style>
body {
   font-family: 'Poppins', sans-serif;
}

.login-box {
   background-color: rgba(255, 255, 255, 0.9);
   padding: 30px;
   border-radius: 10px;
   box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

.login-box-body {
   background-color: transparent;
}

form .form-control {
   border-radius: 5px;
   padding: 12px;
   font-size: 14px;
   border: 1px solid #ccc;
}

form .form-control:focus {
   border-color: #007bff;
   box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
   outline: none;
}

button {
   background-color: #007bff;
   color: white;
   padding: 12px;
   font-size: 16px;
   border-radius: 5px;
   transition: background-color 0.3s ease;
}

button:hover {
   background-color: #0056b3;
}

.callout-danger {
   background-color: #f8d7da;
   color: #721c24;
   padding: 10px;
   border-radius: 5px;
}

.login-logo h2 {
   color: #333;
   font-weight: 700;
   font-size: 26px;
}

.login-box-msg {
   text-align: center;
   color: #555;
   font-size: 16px;
   margin-bottom: 30px;
}
</style>