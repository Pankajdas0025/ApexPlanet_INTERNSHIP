
<?php
include 'db.php'; 
if($_SERVER['REQUEST_METHOD']=="POST")
{
  
    $Email=mysqli_real_escape_string($conn,strip_tags($_POST['uEmail']));// secure -> mysqli_real_escape_string
    $Pass=mysqli_real_escape_string($conn,$_POST['uPass']); // secure 
    $sqlcheck="SELECT *FROM users
    WHERE EMAIL='$Email' AND VERIFICATION_STATUS='Success'";
    $response=$conn->query($sqlcheck);
    if($response->num_rows==1)

    {   
      $row=$response->fetch_assoc();
      if (password_verify($Pass, $row['PASSWORD'])) 
      {
        

   
session_start();
$_SESSION['email'] =$Email;
header("Location: Admin.php");
exit();
    
         
  
      }
      else
      {
       echo "<script>alert('Invalid password.');
          window.location.href = 'Authetication.php';</script>";
      
      }
  
     }

    else
    {
        echo "<script>alert('User not registred!');
           window.location.href = 'Authetication.php';</script>";
    
    }
}


?>


