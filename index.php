<?php session_start(); ?>
<?php include 'header.php'; ?>
<body class="hold-transition login-page" style="background-image: url('images/background.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; font-family: 'Poppins', sans-serif; margin: 0;">

<!-- Scrolling Text Animation outside the container -->
<div class="scrolling-text-container" style="width: 100%; overflow: hidden; position: absolute; top: 50px; z-index: 10;">
    <div class="scrolling-text" style="position: absolute; font-size: 80px; color: #FF5722; font-weight: bold; white-space: nowrap; animation: scroll-text 15s linear infinite;">
        Direk Fuels
    </div>
</div>

<!-- Display the time and date outside the container -->
<div id="time-container" style="text-align: center; margin-bottom: 30px; z-index: 20;">
   <p id="date" style="color: #ffffff; font-size: 36px; font-weight: 600; margin: 0;"></p>
   <p id="time" style="color: #ffeb3b; font-size: 60px; font-weight: bold; margin: 5px 0;"></p>
</div>

<!-- Login Box Container -->
<div class="login-box" style="background: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 8px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2); width: 90%; max-width: 400px;">
   <div class="login-logo" style="text-align: center; margin-bottom: 15px;">
      <h1 style="color: #333; font-size: 22px; font-weight: bold; margin: 0;">Employee Attendance</h1>
   </div>

   <div class="login-box-body">
      <h4 class="login-box-msg" style="color: #555; font-size: 16px; margin-bottom: 15px; text-align: center;">Enter Employee ID</h4>

      <form id="attendance">
          <div class="form-group">
            <select class="form-control" name="status" style="border: 1px solid #ddd; border-radius: 5px; padding: 8px; font-size: 14px;">
              <option value="in">Time In</option>
              <option value="out">Time Out</option>
            </select>
          </div>
         <div class="form-group has-feedback">
            <input type="text" class="form-control input-lg" id="employee" name="employee" required placeholder="Employee ID" style="border: 1px solid #ddd; border-radius: 5px; padding: 8px; font-size: 14px;">
         </div>
         <div class="row">
            <div class="col-xs-12">
               <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin" style="background: #007BFF; color: #fff; border: none; padding: 10px; font-size: 16px; border-radius: 5px; transition: background 0.3s;">
                  <i class="fa fa-sign-in"></i> Submit
               </button>
            </div>
         </div>
      </form>
   </div>

   <div class="alert alert-success alert-dismissible text-center" style="display:none; margin-top: 15px; background: #e7f9ee; border: 1px solid #c8e6c9; color: #388e3c; padding: 10px; border-radius: 5px;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: #388e3c;">&times;</button>
      <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>
   <div class="alert alert-danger alert-dismissible text-center" style="display:none; margin-top: 15px; background: #fdecea; border: 1px solid #f5c6cb; color: #c82333; padding: 10px; border-radius: 5px;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: #c82333;">&times;</button>
      <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
   </div>
</div>

<?php include 'scripts.php' ?>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });
});
</script>

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
}

#time-container {
    position: relative;
    max-width: 90%;
    z-index: 10;  /* Ensure the date/time are above other elements */
}

form .form-control {
    box-shadow: none;
}

form .form-control:focus {
    border-color: #007BFF;
    outline: none;
    box-shadow: 0 0 3px rgba(0, 123, 255, 0.5);
}

button:hover {
    background: #0056b3 !important;
}

/* Animation for Scrolling Text */
@keyframes scroll-text {
    0% {
        left: 100%;
    }
    100% {
        left: -100%;
    }
}

.scrolling-text-container {
    width: 100%;
    overflow: hidden;
    position: absolute;
    top: 50px;  /* Adjusted position */
    z-index: 5;
}

.scrolling-text {
    position: absolute;
    font-size: 80px; /* Large font */
    color: #FF5722;  /* Orange color */
    font-weight: bold;
    white-space: nowrap;
    animation: scroll-text 15s linear infinite; /* Slower animation for smoother effect */
}
</style>

</body>
</html>

