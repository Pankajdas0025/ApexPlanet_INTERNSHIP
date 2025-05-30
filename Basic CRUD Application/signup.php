
<?php
$dbcon=new mysqli("localhost","root","","blog");
if($dbcon->connect_error)
{
    echo " Not connect succesfully ! ";

}
else
{

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $Username=mysqli_real_escape_string($dbcon ,$_POST['UName']);
        $Email=mysqli_real_escape_string($dbcon,$_POST['Email']);
        $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);//for security 
       
       
        
        $check="SELECT EMAIL FROM USERS WHERE EMAIL='$Email'";
        $response=$dbcon->query($check);
    if($response->num_rows!=0)
        {
            echo "This email is already registred !";
        }
        else
    {
        $sql="INSERT INTO USERS
        values
        ('','$Username','$Email','$Password')";
        if($dbcon->query($sql))

        {
            
            echo "You have successfully signup Up go to Login Page !!";
        }
    }
    }

    else
    {
            echo "Something Wrong ! ";
    }  
}

?>
