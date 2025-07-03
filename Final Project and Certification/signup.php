
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files........................................................................................
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

include 'db.php'; 

    if($_SERVER['REQUEST_METHOD']==="POST")
    {
        $Username=trim(mysqli_real_escape_string($conn ,$_POST['Name']));
        $Email=trim(mysqli_real_escape_string($conn,$_POST['Email']));
        $Password =trim(mysqli_real_escape_string($conn,$_POST['Password']));
        // Generate a 6-digit verification code ............................................................................
        $vcode= rand(100000, 999999);
       
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) 
{
    echo "Invalid email format!";
    exit();
}

        $check = "SELECT * FROM users WHERE EMAIL IN ('$Email')";
        $response = $conn->query($check);



if($response && $response->num_rows >=1) {
    echo  $Email."<br> This Email is already registered!";
    exit(0);
}

    else
       {
       
        if(!empty($Username) && !empty($Email) && !empty($Password) && !empty($vcode))
{        
        //for password we use this security 
        $Password = trim(password_hash($_POST['Password'], PASSWORD_DEFAULT));
        $sql="INSERT INTO users
        values
        ('','$Username','$Email','$Password' ,'$vcode','')";

        if($conn->query($sql))

        {
                        
    $to = $Email;
    $name = $Username;
    $subject = "Email Verification";



    // HTML email body......................................................................................................
    $message = "
    <!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
</head>
<body style='margin: 0; padding:10px; background-color: #f4f4f4; font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
  <div style='max-width: 600px; width: 100%; margin: auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden;'>

    <!-- Header -->
    <div style='background: linear-gradient(to right, #4f46e5, #ec4899); padding: 25px; text-align: center; color: #fff;'>
      <h1 style='margin: 0; font-size: 1.8rem;'>👋 Hey <span style='color: #d1fae5;'>$name</span>,</h1>
      <p style='margin-top: 10px; font-size: 1rem;'>Welcome to <strong>BlogScrip</strong> – Your Space to Create!</p>
    </div>

    <!-- Body -->
    <div style='padding: 30px 20px; background-color: #f9fafb;'>
      <p style='font-size: 1rem; text-align: center;'><strong>You're almost there!</strong></p>

      <p style='font-size: 0.95rem; color: #444;'>
        Thank you for joining <strong>BlogScrip</strong>, where you can share your thoughts, tell your stories, and publish meaningful blogs. To get started with your personal admin panel and begin creating content, we just need to verify your email address.
      </p>

      <p style='font-size: 0.95rem; color: #444;'>
        Your admin panel allows you to:
        <ul style='padding-left: 20px; color: #444;'>
          <li>Create and edit blog posts</li>
          <li>Manage your profile and drafts</li>
          <li>Track your publishing activity</li>
          <li>Connect with readers</li>
        </ul>
      </p>

      <div style='text-align: center; margin: 30px 0;'>
        <a href='http://localhost/MYPHP/Blogscript/Verification.php?email=$to&vcode=$vcode' style='text-decoration: none;'>
          <button style='padding: 14px 30px; background-color: #10b981; color: white; border: none; border-radius: 25px; font-size: 1rem; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1);'>
            ✅ Verify My Email
          </button>
        </a>
      </div>

      <p style='font-size: 0.9rem; color: #555; text-align: center;'>
        This link is valid for a limited time. Make sure to verify now and unlock your dashboard.
      </p>

      <hr style='border: none; border-top: 1px solid #ddd; margin: 30px 0;'>

      <p style='font-size: 0.85rem; color: #777; text-align: center;'>
        Didn't sign up for BlogScrip? No worries — just ignore this email and your account will not be created.
      </p>
    </div>

    <!-- Footer -->
    <div style='background-color: #e5e7eb; padding: 15px; text-align: center; font-size: 0.8rem; color: #666;'>
      &copy;2025 BlogScrip. All rights reserved.<br>
     
    </div>
  </div>
</body>
</html>
";
// Send email using PHPMailer.......................................................................................................
    $mail = new PHPMailer(true);
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'pd5569121@gmail.com'; // Gmail ID
        $mail->Password   = 'carp uidg qexa uvyr';          // App password, not real password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email settings
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('pd5569121@gmail.com', 'Support BlogScript');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo "✅We send a varification code in your registred  email !";
    } 
    catch (Exception $e) {
        echo "❌ Email could not be sent. Error: {$mail->ErrorInfo}";
    }



        }
        else
        {
            echo "Data Not Inserted to Database!";
            exit(0);
        }
}    else
       {
       echo "<script>alert('All fields are Requierd for signup !')</script>";
       }

      }

}
else
{
echo "METHOD is not post !";
}



?>
