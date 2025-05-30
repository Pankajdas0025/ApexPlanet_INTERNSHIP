<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSs link -->
   <link rel="stylesheet" href="style.css" type="text/css">
  <!-- cdn animation  -->
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <!-- cdn JQUARY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
</head>
<body>
<div class="header animate__animated animate__backInRight"></div>
  <main>
    <div class="box animate__animated animate__fadeInDownBig">
      <div class="sh">
        Sign Up
      </div>
      <form autocomplete="off">
      <input type="text" id="uName" placeholder="Enter your name " required>
      <input type="email" id="uEmail" placeholder="Enter your email" required>
      <input type="password" id="uPass" placeholder="Password" required>
      <a href="#"><P id="ppass">Forgot Password?</P></a>
      <input type="submit" name="Sbtn" value="Confirm" id="Sbtn">
  
      <p>Allready have an account ?<a href="#" id="lbtn">Login</a></p>
      </form>
      <div class="box2 animate__animated animate__fadeInDownBig">
 <div class="sh">
        Login
      </div>
      <form action="login.php" method="post" autocomplete="off">
      <input type="text" name="uEmail" placeholder="Enter your email" required>
      <input type="password" name="uPass" placeholder="Password" required>
      <input type="submit" name="Sbtn" value="Confirm" id="Sbtn">
  
      <p>New user?<a href="#" id="Sibtn">Sign Up</a></p>
      </form>
    </div>
    </div>

    <script>
  $(document).ready(function () {
    $("#Sbtn").click(function (e) {
      e.preventDefault(); // Prevent default form submission
      
      // Correct variable assignments
      var username = $("#uName").val().trim();
      var email = $("#uEmail").val().trim();
      var pass = $("#uPass").val().trim();

      $.ajax({
        type: "POST",
        url: "signup.php",
        data: {
          UName: username,
          Email: email,
          Password: pass
        },
        success: function (response) {
          $(".header").html(response).show();

          // Hide after 4 seconds
          setTimeout(function () {
            $(".header").hide();
          }, 40000);
        }
      });
    });
  });
</script>




    
  </main>
  <script src="script.js"></script>
</body>
</html>